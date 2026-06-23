<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - SanitaCHECK</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start; /* Menggeser card ke kiri */
            background: url('{{ asset('assets/image/background-1.png') }}') no-repeat center center fixed;
            background-size: cover;
            padding-left: 8%; /* Jarak dari sisi kiri layar */
            position: relative;
        }
        
        /* Header Instansi di pojok kanan atas */
        .top-header-brand {
            position: absolute;
            top: 30px;
            right: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 10;
        }
        .top-header-brand p {
            margin: 0;
            color: #ffffff; /* Mengubah warna menjadi putih bersih */
            font-weight: 700; /* Membuat tulisan lebih tebal */
            font-size: 15px;
            letter-spacing: 0.5px;
            /* Memberikan bayangan hitam tipis agar teks terpisah dari background langit */
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6), -1px -1px 4px rgba(0, 0, 0, 0.6); 
        }
        .top-header-brand img {
            height: 55px;
            object-fit: contain;
        }

        /* Desain Card Login Putih Melayang */
        .login-card {
            position: relative;
            z-index: 2;
            background: #ffffff;
            border-radius: 24px; /* Sudut melengkung halus */
            padding: 24px 35px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: none;
        }
        
        .logo-sanitacheck {
            height: 80px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .welcome-title {
            color: #2d6a4f; /* Hijau Tua */
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 6px;
        }

        .welcome-desc {
            color: #777777;
            font-size: 13.5px;
            line-height: 1.5;
            margin-bottom: 25px;
        }

        /* Desain Kolom Input Abu-abu Bulat */
        .form-control {
            padding: 14px 20px;
            border-radius: 14px;
            border: none;
            background-color: #e9ecef; /* Background abu-abu */
            color: #333;
            font-size: 14.5px;
        }
        .form-control::placeholder {
            color: #999999;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.15);
            border-color: transparent;
            background-color: #e2e5e9;
        }

        /* Desain Tombol Hijau */
        .btn-login {
            padding: 13px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 16px;
            background-color: #2d6a4f; /* Warna Hijau SanitaCheck */
            border: none;
            color: white;
            transition: background-color 0.2s ease-in-out;
            margin-top: 5px;
        }
        .btn-login:hover {
            background-color: #1b4332;
        }
    </style>
</head>
<body>

    <div class="top-header-brand">
        <p>ITSK RS dr. Soepraoen Kesdam V/BRW Malang</p>
        <img src="{{ asset('assets/image/logo-itsk.png') }}" alt="Logo ITSK">
    </div>

    <div class="login-card">
        <img src="{{ asset('assets/image/logo-sanitacheck.png') }}" alt="Logo SanitaCheck" class="logo-sanitacheck">
        
        <div>
            <h4 class="welcome-title">Selamat Datang</h4>
            <p class="welcome-desc">Silahkan masuk ke portal SanitaCheck ITSK RS dr.Soepraoen.</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-login">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>