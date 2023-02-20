const date = new Date();

const formatDate = {
    day: 'numeric',
    year: 'numeric',
    month: 'long'
};

const formatDate2 = {
    year: 'numeric',
    month: 'long'
};

nowDate = date.toLocaleDateString("id-ID", formatDate);

document.getElementById("pemasukan").innerHTML = nowDate;
document.getElementById("pengeluaran").innerHTML = nowDate;

nowDate = date.toLocaleDateString("id-ID", formatDate2);
document.getElementById("pendapatan").innerHTML = nowDate;
