function initsekolah() {
    console.log("pendidikan.js loaded");
  const $modal = $("#tambah_sekolah");
  const $form = $("#form_sekolah");

  // buka modal
  $(document).off("click", "#tambah_btn").on("click", "#tambah_btn", () => {
    $modal.removeClass("hidden").addClass("block");
  });

  // tutup modal
  $(document).off("click", "#closeModal").on("click", "#closeModal", () => {
    $modal.addClass("hidden").removeClass("block");
  });



  // submit form
  $(document).off("submit", "#form_sekolah").on("submit", "#form_sekolah", async (e) => {
    e.preventDefault();

    let formData = new FormData($form[0]);
    let res = await fetch("router.php?page=tambah_sekolah", {
      method: "POST",
      body: formData
    });
    let data = await res.json();

    if (data.success) {
      alert("Berhasil ditambahkan!");
      $modal.addClass("hidden").removeClass("block");
      loadPage("pendidikan", initsekolah);
    } else {
      alert("Gagal tambah data!");
    }
  });
}
initsekolah(); // inisialisasi jika langsung load sekolah.js