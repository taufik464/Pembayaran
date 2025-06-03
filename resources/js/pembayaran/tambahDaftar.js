console.log("File tambahDaftar.js loaded!");
let daftarPembayaran = [];

function tambahPembayaran(id, nama, harga, jenis) {
    const sudahAda = daftarPembayaran.find(item => item.id === id && item.jenis === jenis);
    if (sudahAda) {
        alert("Sudah ditambahkan!");
        return;
    }

    daftarPembayaran.push({
        id,
        nama,
        harga: parseFloat(harga),
        jenis
    });
    updateDaftarPembayaran();
}

function hapusPembayaran(index) {
    daftarPembayaran.splice(index, 1);
    updateDaftarPembayaran();
}

function updateDaftarPembayaran() {
    const container = document.getElementById("listPembayaran");
    container.innerHTML = "";

    let total = 0;

    daftarPembayaran.forEach((item, index) => {
        total += item.harga;

        const card = document.createElement("div");
        card.className = "flex justify-between items-center bg-white shadow px-4 py-3 mb-2 rounded border";

        card.innerHTML = `
      <div>
        <p class="font-semibold">${item.nama}</p>
        <p class="text-gray-700">Rp${item.harga.toLocaleString()}</p>
      </div>
      <button onclick="hapusPembayaran(${index})" class="text-red-600 hover:text-red-800">
        🗑️
      </button>
    `;
        container.appendChild(card);
    });

    document.getElementById("totalHarga").innerText = "Total: Rp" + total.toLocaleString();
}