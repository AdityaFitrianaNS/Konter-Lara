$(document).on("click", "#editModal", function () {
    let nama = $(this).data('nama');
    let slug = $(this).data('slug');
    let masa_aktif = $(this).data('masa_aktif');
    let harga_asli = $(this).data('harga_asli');
    let harga_jual = $(this).data('harga_jual');

    $(".modal-body #nama").val(nama);
    $(".modal-body #slug").val(slug);
    $(".modal-body #masa_aktif").val(masa_aktif);
    $(".modal-body #harga_asli").val(harga_asli);
    $(".modal-body #harga_jual").val(harga_jual);
});
