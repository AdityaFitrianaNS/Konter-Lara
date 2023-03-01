const date = new Date();

const formatDate = {
    year: 'numeric',
    month: 'long'
};

const formatDate2 = {
    day: 'numeric',
    year: 'numeric',
    month: 'long'
};

nowDate = date.toLocaleDateString("id-ID", formatDate);
document.getElementById("pendapatan").innerHTML = nowDate;
document.getElementById("pemasukan").innerHTML = nowDate;

nowDate = date.toLocaleDateString("id-ID", formatDate2);
document.getElementById("pengeluaran").innerHTML = nowDate;
