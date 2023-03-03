$("#harga").keyup(function () {
    let harga = parseInt($("#harga").val());
    let jumlah = parseInt($("#jumlah").val());
    let bayar = parseInt($("#bayar").val());
    let total = harga * jumlah;
    let kembalian = bayar - total;

    $("#total").val(total);
    $("#kembalian").val(kembalian);
});

$("#jumlah").keyup(function () {
    let harga = parseInt($("#harga").val());
    let jumlah = parseInt($("#jumlah").val());
    let bayar = parseInt($("#bayar").val());
    let total = harga * jumlah;
    let kembalian = bayar - total;

    $("#total").val(total);
    $("#kembalian").val(kembalian);
});


$("#bayar").keyup(function () {
    let harga = parseInt($("#harga").val());
    let jumlah = parseInt($("#jumlah").val());
    let bayar = parseInt($("#bayar").val());
    let total = harga * jumlah;
    let kembalian = bayar - total;

    $("#kembalian").val(kembalian);
});
