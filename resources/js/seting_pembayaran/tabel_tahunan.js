document.addEventListener('DOMContentLoaded', () => {
    const kelasSelect = document.getElementById('kelasSelect');
    const container = document.getElementById('tabel-setting-container');

    kelasSelect.addEventListener('change', function () {
        const kelasId = this.value;

        fetch(`/setting-tahunan/get-data/${kelasId}`)
            .then(res => res.text())
            .then(html => {
                container.innerHTML = html;
            });
    });

    // checkbox 'select all'
    document.addEventListener('click', function (e) {
        if (e.target && e.target.id === 'checkAll') {
            const checkboxes = document.querySelectorAll('input[name="siswa[]"]');
            checkboxes.forEach(cb => cb.checked = e.target.checked);
        }
    });
});
