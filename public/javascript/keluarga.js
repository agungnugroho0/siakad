function initkeluarga() {
    console.log("keluarga.js loaded");
  const $modal = $("#tambah_kk");
  const $form = $("#form_keluarga");

  // buka modal
  $(document).off("click", "#tambah_btn").on("click", "#tambah_btn", () => {
    $modal.removeClass("hidden").addClass("block");
  });

  // tutup modal
  $(document).off("click", "#closeModal").on("click", "#closeModal", () => {
    $modal.addClass("hidden").removeClass("block");
  });



  // submit form
  $(document).off("submit", "#form_keluarga").on("submit", "#form_keluarga", async (e) => {
    e.preventDefault();

    let formData = new FormData($form[0]);
    let res = await fetch("router.php?page=tambah_keluarga", {
      method: "POST",
      body: formData
    });
    let data = await res.json();

    if (data.success) {
      alert("Berhasil ditambahkan!");
      $modal.addClass("hidden").removeClass("block");
      loadPage("keluarga", initkeluarga);
    } else {
      alert("Gagal tambah data!");
    }
  });
}
initkeluarga(); // inisialisasi jika langsung load keluarga.js