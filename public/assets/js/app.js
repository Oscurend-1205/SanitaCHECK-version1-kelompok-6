// assets/js/app.js

document.addEventListener('DOMContentLoaded', function() {
    // Validasi form lapor
    const formLapor = document.getElementById('form-lapor');
    if (formLapor) {
        formLapor.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const fasilitas = document.getElementById('fasilitas').value;
            const catatan = document.getElementById('catatan').value;
            const persetujuan = document.getElementById('persetujuan').checked;
            
            let isValid = true;
            let errorMessage = '';

            if (!fasilitas) {
                isValid = false;
                errorMessage += '- Fasilitas wajib dipilih.\n';
            }

            if (catatan.trim().length < 10) {
                isValid = false;
                errorMessage += '- Catatan minimal 10 karakter.\n';
            }

            if (!persetujuan) {
                isValid = false;
                errorMessage += '- Anda harus mencentang kotak pernyataan.\n';
            }

            if (!isValid) {
                alert('Terdapat kesalahan pada form:\n' + errorMessage);
                return;
            }

            const btnSubmit = document.getElementById('btn-submit');
            const originalText = btnSubmit.innerHTML;
            btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengirim...';
            btnSubmit.disabled = true;

            fetch('/api/lapor', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    fasilitas_id: fasilitas,
                    nama_pelapor: document.getElementById('nama_pelapor').value,
                    catatan: catatan
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.status === 'success') {
                    const successAlert = document.getElementById('success-alert');
                    if(successAlert) {
                        successAlert.style.display = 'block';
                        formLapor.reset();
                    } else {
                        alert('Laporan berhasil dikirim. Terima kasih atas partisipasi Anda.');
                        formLapor.reset();
                    }
                } else {
                    alert('Gagal mengirim laporan. Silakan coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan jaringan.');
            })
            .finally(() => {
                btnSubmit.innerHTML = originalText;
                btnSubmit.disabled = false;
            });
        });
    }
});
