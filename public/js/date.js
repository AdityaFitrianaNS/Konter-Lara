const date = new Date();

const formatDate = {
    year: 'numeric',
    month: 'long'
};

nowDate = date.toLocaleDateString("id-ID", formatDate);
document.getElementById("pendapatan").innerHTML = nowDate;
document.getElementById("pemasukan").innerHTML = nowDate;
document.getElementById("pengeluaran").innerHTML = nowDate;
