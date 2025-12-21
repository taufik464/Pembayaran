<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - PPDB Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top right, #34d399, #10b981, #065f46);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .success-check {
            animation: scaleIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="p-4">

    <div class="glass-card w-full max-w-lg rounded-3xl overflow-hidden text-center p-8 md:p-12">
        <div class="success-check mb-6 inline-flex items-center justify-center w-24 h-24 bg-emerald-100 text-emerald-600 rounded-full">
            <i class="fas fa-check-circle text-6xl"></i>
        </div>

        <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Pendaftaran Berhasil!</h1>
        <p class="text-gray-500 mb-8">Data pendaftaran Anda telah berhasil disimpan di sistem kami. Mohon simpan informasi di bawah ini.</p>

        <div class="bg-gray-50 rounded-2xl p-6 mb-8 text-left border border-gray-100">
            <div class="flex justify-between mb-3">
                <span class="text-sm text-gray-400 font-medium uppercase tracking-wider">Nama Pendaftar</span>
                <span class="text-sm text-gray-800 font-bold uppercase">{{ $data->nama }}</span>
            </div>
            <div class="flex justify-between mb-3">
                <span class="text-sm text-gray-400 font-medium uppercase tracking-wider">Nomor NISN</span>
                <span class="text-sm text-gray-800 font-bold">{{ $data->nisn }}</span>
            </div>
            <div class="flex justify-between mb-3">
                <span class="text-sm text-gray-400 font-medium uppercase tracking-wider">Waktu Daftar</span>
                <span class="text-sm text-gray-800 font-bold">{{ $data->created_at->format('d M Y, H:i') }} WIB</span>
            </div>
            <hr class="my-4 border-dashed">
            <div class="flex items-center text-emerald-700 bg-emerald-50 p-3 rounded-xl border border-emerald-100">
                <i class="fas fa-info-circle mr-3"></i>
                <p class="text-xs font-semibold leading-relaxed">
                    Pengumuman hasil seleksi akan diinformasikan melalui nomor WhatsApp yang Anda daftarkan.
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-3">
            <a href="/" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-emerald-200 transition-all active:scale-95 flex items-center justify-center">
                <i class="fas fa-home mr-2"></i> KEMBALI KE BERANDA
            </a>
           
        </div>

        <p class="text-xs text-gray-400 mt-8 italic">
            ID Pendaftaran: #PPDB-{{ $data->id }}-{{ date('Y') }}
        </p>
    </div>

</body>

</html>