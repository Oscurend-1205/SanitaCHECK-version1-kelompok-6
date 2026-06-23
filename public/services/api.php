<?php

// Mock Data untuk Native PHP App

function getDbConnection() {
    $host = '127.0.0.1';
    $db   = 'sanitacheck';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        return null;
    }
}

function getStatistik() {
    $pdo = getDbConnection();
    if (!$pdo) {
        return [
            'persentase_kebersihan' => 0,
            'inspeksi_hari_ini' => 0,
            'perlu_tindak_lanjut' => 0,
            'keluhan_diproses' => 0
        ];
    }

    $stmt1 = $pdo->query("SELECT COUNT(*) as total FROM inspeksis WHERE DATE(tanggal_inspeksi) = CURDATE()");
    $inspeksi_hari_ini = $stmt1 ? $stmt1->fetch()['total'] : 0;

    $stmt2 = $pdo->query("SELECT COUNT(*) as total FROM inspeksis WHERE status_tindak_lanjut != 'aman'");
    $perlu_tindak_lanjut = $stmt2 ? $stmt2->fetch()['total'] : 0;

    $stmt3 = $pdo->query("SELECT COUNT(*) as total FROM laporans WHERE status != 'Selesai'");
    $keluhan_diproses = $stmt3 ? $stmt3->fetch()['total'] : 0;

    return [
        'persentase_kebersihan' => 85, // Mocked for now since logic for % can be complex
        'inspeksi_hari_ini' => $inspeksi_hari_ini,
        'perlu_tindak_lanjut' => $perlu_tindak_lanjut,
        'keluhan_diproses' => $keluhan_diproses
    ];
}

function fetchApi($endpoint) {
    $pdo = getDbConnection();
    if (!$pdo) {
        return json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    }

    if ($endpoint == '/api/fasilitas' || strpos($endpoint, 'fasilitas') !== false) {
        $stmt = $pdo->query("SELECT id, nama_fasilitas as nama, lokasi, jenis_fasilitas as jenis, penanggung_jawab as petugas, 'Bersih' as status, '' as terakhir_inspeksi FROM fasilitas WHERE status_aktif = 1");
        $data = $stmt ? $stmt->fetchAll() : [];

        return json_encode([
            'status' => 'success',
            'data' => $data
        ]);
    }

    return json_encode(['status' => 'error', 'message' => 'Not found']);
}
