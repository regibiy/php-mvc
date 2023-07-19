// Mendapatkan referensi elemen HTML
const hapusLink = document.querySelectorAll(".del");

if (hapusLink) {
  hapusLink.forEach((item) => {
    // Menambahkan event listener untuk menangani peristiwa klik
    item.addEventListener("click", function (event) {
      event.preventDefault(); // Mencegah tindakan default dari link
      // Tampilkan SweetAlert
      Swal.fire({
        title: "Apakah Anda yakin ingin melanjutkan?",
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!",
      }).then((result) => {
        if (result.isConfirmed) {
          // Lakukan tindakan jika pengguna mengonfirmasi
          // Misalnya, lakukan penghapusan data atau tindakan lainnya
          window.location.href = item.href; // Lanjutkan ke halaman yang dituju setelah konfirmasi
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          // Lakukan tindakan jika pengguna membatalkan
          Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
    });
  });
}

$(function () {
  $(".tombolTambahData").on("click", function () {
    $("#forModalLabel").html("Tambah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Tambah Data");
  });

  $(".tampilModalUbah").on("click", function () {
    $("#forModalLabel").html("Ubah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-content form").attr("action", "http://localhost/php-mvc/public/mahasiswa/ubah");

    //this adalah tombol yang diklik
    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost/php-mvc/public/mahasiswa/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#npm").val(data.npm);
        $("#nama").val(data.nama);
        $("#prodi").val(data.prodi);
        $("#id").val(data.id);
      },
    });
  });
});
