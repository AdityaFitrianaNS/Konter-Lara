function jumlahKeuntungan() {
    const kategori = document.getElementById("kategori").value;
    const keuntungan = document.getElementById("keuntungan");
    switch (kategori) {
        case "Aksesoris Handphone":
            keuntungan.value = 5000;
            break;
        case "Pulsa":
            keuntungan.value = 2000;
            break
        case "Paket Internet":
            keuntungan.value = 4000;
            break;
        case "Paket Telepon":
            keuntungan.value = 2000;
            break;
        default:
            keuntungan.value = 0;
    }
}
