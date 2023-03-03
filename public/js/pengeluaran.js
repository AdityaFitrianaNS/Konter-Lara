$("#jumlah").keyup(function () {
    let harga = parseInt($("#harga").val());
    let jumlah = parseInt($("#jumlah").val());
    let total = harga * jumlah;

    $("#total").val(total);
});

$("#harga").keyup(function () {
    let harga = parseInt($("#harga").val());
    let jumlah = parseInt($("#jumlah").val());
    let total = harga * jumlah;

    $("#total").val(total);
});
