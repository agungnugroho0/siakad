  async function loadPage(page) {
    let res = await fetch("router.php?page=" + page);
    let html = await res.text();
    document.getElementById("tab-content").innerHTML = html;
      // load modul JS khusus halaman
    console.log("/public/javascript/" + page + ".js");
    loadScript("/public/javascript/" + page + ".js");
  }

  function loadScript(src) {
  let oldScript = document.querySelector(`script[data-page="${src}"]`);
  if (oldScript) oldScript.remove(); // hapus biar fresh

  let script = document.createElement("script");
  script.src = src;
  script.dataset.page = src;
  document.body.appendChild(script);
  }

  document.querySelectorAll(".tab-link").forEach(link => {
    link.addEventListener("click", () => {
      let halaman = link.getAttribute("page");
      loadPage(halaman);

      // aktifkan styling
      document.querySelectorAll('.tab-link').forEach(l => {
        l.classList.remove('border-red-800','text-red-900');
        l.classList.add('text-gray-600');
      });
      link.classList.add('border-red-800','text-red-900');
      link.classList.remove('text-gray-600');
    });
  });

  // load default (biodata)
  console.log("user.js loaded");
  loadPage("biodata");