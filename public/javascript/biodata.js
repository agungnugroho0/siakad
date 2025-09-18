function initbiodata() {
    console.log("biodata.js loaded");
  const $modal = $("#edit_biodata");
  const $form = $("#form_editbiodata");

  // buka modal
  $(document).off("click", "#edit_btn").on("click", "#edit_btn", () => {
    $modal.removeClass("hidden").addClass("block");
  });

  // tutup modal
  $(document).off("click", "#closeEditModal").on("click", "#closeEditModal", () => {
    $modal.addClass("hidden").removeClass("block");
  });

// preview foto sebelum submit
$(document).off("change", "#foto").on("change", "#foto", (e) => {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (ev) => {
      $("#preview").attr("src", ev.target.result);
    };
    reader.readAsDataURL(file);
  }
});

  // submit form
  $(document).off("submit", "#form_editbiodata").on("submit", "#form_editbiodata", async (e) => {
    e.preventDefault();

    let formData = new FormData($form[0]);
    let res = await fetch("router.php?page=update_biodata", {
      method: "POST",
      body: formData
    });
    let data = await res.json();

    if (data.success) {
      alert("Data berhasil diperbarui!");
      $modal.addClass("hidden").removeClass("block");
      loadPage("biodata", initbiodata);
    } else {
      alert("data gagal diperbarui: " + data.message);
    }
  });
}
initbiodata(); // inisialisasi jika langsung load biodata.js