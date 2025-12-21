<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru - PPDB Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top right, #34d399, #10b981, #065f46);
            min-height: 100vh;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .step-circle {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e5e7eb;
            color: #6b7280;
            transition: all 0.4s ease;
            position: relative;
            z-index: 10;
        }

        .step-circle.active {
            background: #10b981;
            color: white;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2);
        }

        .step-circle.completed {
            background: #059669;
            color: white;
        }

        .page-animation {
            animation: fadeIn 0.4s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-field {
            border-color: #ef4444 !important;
            background-color: #fef2f2;
        }
    </style>
</head>

<body class="flex items-center justify-center p-4 py-12">
    <div class="glass-card w-full max-w-3xl rounded-3xl overflow-hidden">
        <div class="h-2 bg-gradient-to-r from-emerald-400 to-green-600"></div>
        <div class="p-8">
            <header class="text-center mb-10">
                <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Formulir PPDB Online</h1>
                <p class="text-gray-500 mt-2 text-sm">Pastikan semua data diisi dengan benar sebelum dikirim.</p>
            </header>

            <div class="relative flex justify-between items-center mb-12 max-w-xl mx-auto">
                <div class="absolute h-0.5 bg-gray-200 w-full top-1/2 -translate-y-1/2 left-0 z-0"></div>
                <div id="progress-bar" class="absolute h-0.5 bg-emerald-500 w-0 top-1/2 -translate-y-1/2 left-0 z-0 transition-all duration-500"></div>
                <div class="text-center relative">
                    <div id="step1" class="step-circle active"><i class="fas fa-user text-xs"></i></div><span class="text-[9px] font-bold mt-2 block text-gray-400 uppercase tracking-widest absolute -bottom-6 left-1/2 -translate-x-1/2 w-20">Pribadi</span>
                </div>
                <div class="text-center relative">
                    <div id="step2" class="step-circle"><i class="fas fa-star text-xs"></i></div><span class="text-[9px] font-bold mt-2 block text-gray-400 uppercase tracking-widest absolute -bottom-6 left-1/2 -translate-x-1/2 w-20">Bakat</span>
                </div>
                <div class="text-center relative">
                    <div id="step3" class="step-circle"><i class="fas fa-users text-xs"></i></div><span class="text-[9px] font-bold mt-2 block text-gray-400 uppercase tracking-widest absolute -bottom-6 left-1/2 -translate-x-1/2 w-20">Wali</span>
                </div>
                <div class="text-center relative">
                    <div id="step4" class="step-circle"><i class="fas fa-cloud-upload-alt text-xs"></i></div><span class="text-[9px] font-bold mt-2 block text-gray-400 uppercase tracking-widest absolute -bottom-6 left-1/2 -translate-x-1/2 w-20">Berkas</span>
                </div>
            </div>

            <form id="ppdbForm" action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 pt-4">
                @csrf

                <div id="page1" class="page page-animation">
                    <div class="flex items-center mb-6 text-emerald-700 border-l-4 border-emerald-500 pl-3">
                        <h2 class="text-lg font-bold uppercase">1. Data Pribadi</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase">NIK (16 Digit)</label>
                            <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase">NISN (10 Digit)</label>
                            <input type="text" name="nisn" value="{{ old('nisn') }}" maxlength="10" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase">Jenis Kelamin</label>
                            <select name="jk" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl bg-white" required>
                                <option value="">Pilih</option>
                                <option value="Laki-laki" {{ old('jk') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jk') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase">Agama</label>
                            <select name="agama" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl bg-white" required>
                                <option value="">Pilih</option>
                                @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agm)
                                <option value="{{ $agm }}" {{ old('agama') == $agm ? 'selected' : '' }}>{{ $agm }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div><label class="block text-xs font-bold text-gray-500 uppercase">Tgl Lahir</label><input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required></div>
                        <div><label class="block text-xs font-bold text-gray-500 uppercase">No. HP (WA)</label><input type="tel" name="no_hp" value="{{ old('no_hp') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required></div>
                        <div class="md:col-span-2"><label class="block text-xs font-bold text-gray-500 uppercase">Asal Sekolah</label><input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required></div>
                        <div class="md:col-span-2"><label class="block text-xs font-bold text-gray-500 uppercase">Alamat Lengkap</label><textarea name="alamat" rows="2" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required>{{ old('alamat') }}</textarea></div>
                    </div>
                </div>

                <div id="page2" class="page hidden page-animation">
                    <div class="flex items-center mb-6 text-emerald-700 border-l-4 border-emerald-500 pl-3">
                        <h2 class="text-lg font-bold uppercase">2. Bakat & Minat</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><label class="block text-xs font-bold text-gray-500 uppercase">Hobi</label><input type="text" name="hobi" value="{{ old('hobi') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required></div>
                        <div><label class="block text-xs font-bold text-gray-500 uppercase">Olahraga</label><input type="text" name="olahraga" value="{{ old('olahraga') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required></div>
                        <div class="md:col-span-2"><label class="block text-xs font-bold text-gray-500 uppercase">Bidang Studi Favorit</label><input type="text" name="bidang_studi" value="{{ old('bidang_studi') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required></div>
                        <div class="md:col-span-2"><label class="block text-xs font-bold text-gray-500 uppercase">Cita-cita</label><input type="text" name="cita_cita" value="{{ old('cita_cita') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required></div>
                    </div>
                </div>

                <div id="page3" class="page hidden page-animation">
                    <div class="flex items-center mb-6 text-emerald-700 border-l-4 border-emerald-500 pl-3">
                        <h2 class="text-lg font-bold uppercase">3. Orang Tua / Wali</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 grid md:grid-cols-2 gap-3">
                            <h3 class="md:col-span-2 text-[10px] font-black text-emerald-700">DATA AYAH</h3>
                            <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" placeholder="Nama Ayah" class="px-4 py-2 border rounded-lg" required>
                            <select name="keterangan_ayah" class="px-4 py-2 border rounded-lg bg-white" required>
                                <option value="Hidup">Masih Hidup</option>
                                <option value="Meninggal">Meninggal</option>
                            </select>
                            <input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" placeholder="Pekerjaan" class="px-4 py-2 border rounded-lg" required>
                            <input type="text" name="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}" placeholder="Penghasilan" class="px-4 py-2 border rounded-lg" required>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 grid md:grid-cols-2 gap-3">
                            <h3 class="md:col-span-2 text-[10px] font-black text-emerald-700">DATA IBU</h3>
                            <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" placeholder="Nama Ibu" class="px-4 py-2 border rounded-lg" required>
                            <select name="keterangan_ibu" class="px-4 py-2 border rounded-lg bg-white" required>
                                <option value="Hidup">Masih Hidup</option>
                                <option value="Meninggal">Meninggal</option>
                            </select>
                            <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" placeholder="Pekerjaan" class="px-4 py-2 border rounded-lg" required>
                            <input type="text" name="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}" placeholder="Penghasilan" class="px-4 py-2 border rounded-lg" required>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 grid md:grid-cols-2 gap-3">
                            <h3 class="md:col-span-2  text-[10px] font-black text-emerald-700">DATA WALI</h3>
                            <input type="text" name="nama_wali" value="{{ old('nama_wali') }}" placeholder="Nama Wali" class="md:col-span-2  w-full px-4 py-2.5 border border-gray-200 rounded-x1" required>
                            <input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}" placeholder="Pekerjaan Wali" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required>
                            <input type="text" name="penghasilan_wali" value="{{ old('penghasilan_wali') }}" placeholder="Penghasilan Wali" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl" required>
                            <textarea name="alamat_wali" placeholder="Alamat Wali" rows="2" class="md:col-span-2 w-full px-4 py-2.5 border border-gray-200 rounded-xl" required>{{ old('alamat_wali') }}</textarea>
                        </div>

                    </div>
                </div>

                <div id="page4" class="page hidden page-animation">
                    <div class="flex items-center mb-6 text-emerald-700 border-l-4 border-emerald-500 pl-3">
                        <h2 class="text-lg font-bold uppercase">4. Upload Berkas</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="p-4 border-2 border-dashed rounded-2xl text-center bg-gray-50">
                            <label class="block text-xs font-bold mb-2">Surat keterangan Lulus (JPG/PNG)(Jika ada)</label>
                            <input type="file" name="skl" accept="image/*" class="text-xs">
                        </div>
                        <div class="p-4 border-2 border-dashed rounded-2xl text-center bg-gray-50">
                            <label class="block text-xs font-bold mb-2">Kartu Keluarga (PDF/JPG)</label>
                            <input type="file" name="kk" accept="image/*,application/pdf" class="text-xs" required>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center pt-8 border-t">
                    <button type="button" id="prevBtn" class="px-6 py-2.5 rounded-xl font-bold text-gray-400 hover:bg-gray-100 hidden uppercase text-xs transition-all">Kembali</button>
                    <div class="flex-1"></div>
                    <button type="button" id="nextBtn" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg uppercase text-xs transition-all">Selanjutnya</button>
                    <button type="submit" id="submitBtn" class="bg-gradient-to-r from-emerald-600 to-green-600 text-white px-10 py-3 rounded-xl font-bold hidden uppercase text-xs transition-all">Kirim Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const pages = ['page1', 'page2', 'page3', 'page4'];
        const steps = ['step1', 'step2', 'step3', 'step4'];
        let currentPage = 0;

        function showPage(index) {
            pages.forEach((p, i) => document.getElementById(p).classList.toggle('hidden', i !== index));
            steps.forEach((s, i) => {
                const el = document.getElementById(s);
                el.classList.remove('active', 'completed');
                if (i === index) el.classList.add('active');
                else if (i < index) {
                    el.classList.add('completed');
                    el.innerHTML = '<i class="fas fa-check"></i>';
                }
            });
            document.getElementById('prevBtn').classList.toggle('hidden', index === 0);
            document.getElementById('nextBtn').classList.toggle('hidden', index === pages.length - 1);
            document.getElementById('submitBtn').classList.toggle('hidden', index !== pages.length - 1);
            document.getElementById('progress-bar').style.width = `${(index / (pages.length - 1)) * 100}%`;
        }

        document.getElementById('nextBtn').addEventListener('click', () => {
            const currentTab = document.getElementById(pages[currentPage]);
            const inputs = currentTab.querySelectorAll('[required]');
            let valid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                    input.classList.add('error-field');
                } else {
                    input.classList.remove('error-field');
                }
            });

            if (valid) {
                currentPage++;
                showPage(currentPage);
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            } else {
                alert("Mohon isi semua field yang wajib diisi!");
            }
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            currentPage--;
            showPage(currentPage);
        });

        document.getElementById('ppdbForm').addEventListener('submit', function() {
            document.getElementById('submitBtn').innerHTML = 'MEMPROSES...';
            document.getElementById('submitBtn').disabled = true;
        });
    </script>
</body>

</html>