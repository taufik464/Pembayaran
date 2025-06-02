document.addEventListener('DOMContentLoaded', () => {
    const kelasSelect = document.getElementById('kelasSelect');
    const container = document.getElementById('tabel-setting-container');
    const formPembayaran = document.getElementById('formPembayaran');

    // Load tabel saat halaman pertama kali dimuat
    loadTabel(kelasSelect.value);

    kelasSelect.addEventListener('change', function () {
        loadTabel(this.value);
    });

    function loadTabel(kelasId) {
        fetch(`/setting-tahunan/get-data/${kelasId}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(html => {
            container.innerHTML = html;
            // Setelah tabel dimuat, tambahkan event listener untuk checkbox
            setupCheckbox();
        })
        .catch(error => {
            console.error('Error:', error);
            container.innerHTML = '<p class="text-red-500">Gagal memuat data. Silakan coba lagi.</p>';
        });
    }

    function setupCheckbox() {
        // Checkbox 'select all'
        const checkAll = document.getElementById('checkAll');
        if (checkAll) {
            checkAll.addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('input[name="siswa[]"]');
                checkboxes.forEach(cb => cb.checked = this.checked);
            });
        }
    }

    // Submit form
    formPembayaran.addEventListener('submit', function(e) {
        // Validasi minimal satu siswa terpilih
        const checkedBoxes = document.querySelectorAll('input[name="siswa[]"]:checked');
        if (checkedBoxes.length === 0) {
            e.preventDefault();
            alert('Pilih minimal satu siswa/kelas');
        }
    });
});