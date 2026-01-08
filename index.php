<?php
//menyertakan code dari file koneksi
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Website untuk mempelajSari perkembangan teknologi, revolusi digital, dan masa depan inovasi."
    />


    <meta
      name="keywords"
      content="teknologi, digital, inovasi, komputer, sejarah teknologi"
    />
    <meta name="author" content="Desriel Frizky Andharta" />
    <title>Perkembangan Teknologi</title>
    <link rel="icon" href="image/logo.png" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <style>
      body {
        background-color: white;
        color: black;
      }

      .navbar {
        background-color: #f8f9fa;
      }

      .accordion-button:not(.collapsed) {
        background-color: red;
        color: white;
      }
      .text-light {
        color: #b5b5b5;
      }

      /* Dark Mode */
      body.dark-mode {
        background-color: #121212;
        color: white;
      }

      .navbar.dark-mode {
        background-color: #333;
      }

      .btn-dark-mode {
        background-color: #333;
        color: white;
      }

      /* Optional: Customize other elements for Dark Mode */
      .card-body {
        background-color: #2c2c2c;
        color: white;
      }

      .text-dark {
        color: #b5b5b5;
      }
    </style>
  </head>
  <body>
    <!-- Navbar Begin -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">Perkembangan Teknologi</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
              <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#article">Article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#schedule">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About Me</a>
            </li>
            <li class="nav-item">
              <button id="darkModeToggle" class="btn btn-dark-mode">🌙</button>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php" target="_blank">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->

    <header>
      <!-- Hero Section -->
      <section id="hero" class="text-center p-5 text-sm-start">
        <div class="container">
          <div class="d-sm-flex flex-sm-row-reverse align-items-center">
            <img
              src="image/banner.png"
              class="img-fluid"
              width="300"
              alt="Banner Teknologi"
            />
            <div class="fw-bold display-4">
              <h1>
                Artikel tentang perkembangan teknologi, revolusi digital, dan
                masa depan inovasi
              </h1>
              <h4 class="lead-display 6">
                Perkembangan Teknologi pada era digital
              </h4>
              <span id="tanggal"></span>
              <span id="jam"></span>
            </div>
          </div>
        </div>
      </section>
    </header>

    <main>
      <!-- Article Section -->
      <section id="article" class="text-center">
        <div class="container">
          <h1 class="fw-bold display-4 pb">Artikel</h1>
<div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
<?php
$sql = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil = $conn->query($sql);
while ($row = $hasil->fetch_assoc()){
?>
  <div class="col">
    <div class="card h-100">
      <img src="img/<?= htmlspecialchars($row["gambar"]) ?>" class="card-img-top" alt="gambar">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($row["judul"]) ?></h5>
        <p class="card-text"><?= htmlspecialchars($row["isi"]) ?></p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><?= $row["tanggal"] ?></small>
      </div>
    </div>
  </div>
<?php } ?>
</div>
      </section>

      <!-- Schedule Section -->
      <section id="schedule" class="pt-5 mt-5 p-4">
        <header class="bg-pink text-center py-4">
          <h1 class="fw-bold">Schedule</h1>
        </header>

        <div class="container my-5">
          <div
            class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 justify-content-around"
          >
            <!-- Membaca -->
            <div class="col col-lg-3">
              <div class="card h-100 text-center bg-white">
                <div
                  class="card-body d-flex flex-column align-items-center justify-content-center p-4 bg-white"
                >
                  <i
                    class="bi bi-book"
                    style="font-size: 2.5rem; color: #dc3545"
                  ></i>
                  <h5 class="card-title mt-3 mb-2 text-dark">Membaca</h5>
                  <p class="card-text text-muted">
                    Menambah wawasan setiap pagi sebelum beraktivitas.
                  </p>
                </div>
              </div>
            </div>

            <!-- Menulis -->
            <div class="col col-lg-3">
              <div class="card h-100 text-center bg-white">
                <div
                  class="card-body d-flex flex-column align-items-center justify-content-center p-4 bg-white"
                >
                  <i
                    class="bi bi-laptop"
                    style="font-size: 2.5rem; color: #dc3545"
                  ></i>
                  <h5 class="card-title text-dark">Menulis</h5>
                  <p class="card-text text-muted">
                    Mencatat setiap pengalaman harian di jurnal pribadi.
                  </p>
                </div>
              </div>
            </div>

            <!-- Diskusi -->
            <div class="col col-lg-3">
              <div class="card h-100 text-center bg-white">
                <div
                  class="card-body d-flex flex-column align-items-center justify-content-center p-4 bg-white"
                >
                  <i
                    class="bi bi-people"
                    style="font-size: 2.5rem; color: #dc3545"
                  ></i>
                  <h5 class="card-title mt-3 mb-2 text-dark">Diskusi</h5>
                  <p class="card-text text-muted">
                    Bertukar ide dengan teman dalam kelompok belajar.
                  </p>
                </div>
              </div>
            </div>

            <!-- Olahraga -->
            <div class="col col-lg-3">
              <div class="card h-100 text-center bg-white">
                <div
                  class="card-body d-flex flex-column align-items-center justify-content-center p-4 bg-white"
                >
                  <i
                    class="bi bi-bicycle"
                    style="font-size: 2.5rem; color: #dc3545"
                  ></i>
                  <h5 class="card-title mt-3 mb-2 text-dark">Olahraga</h5>
                  <p class="card-text text-muted">
                    Menjaga kesehatan dengan bersepeda sore hari.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="row row-cols-1 row-cols-sm-2 justify-content-around mt-3">
            <!-- Movie -->
            <div class="col col-lg-3">
              <div class="card h-100 text-center bg-white">
                <div
                  class="card-body d-flex flex-column align-items-center justify-content-center p-4 bg-white"
                >
                  <i
                    class="bi bi-film"
                    style="font-size: 2.5rem; color: #dc3545"
                  ></i>
                  <h5 class="card-title mt-3 mb-2 text-dark">Movie</h5>
                  <p class="card-text text-muted">
                    Menonton film yang bagus di bioskop.
                  </p>
                </div>
              </div>
            </div>

            <!-- Belanja -->
            <div class="col col-lg-3 mt-3">
              <div class="card h-100 text-center bg-white">
                <div
                  class="card-body d-flex flex-column align-items-center justify-content-center p-4 bg-white"
                >
                  <i
                    class="bi bi-cart"
                    style="font-size: 2.5rem; color: #dc3545"
                  ></i>
                  <h5 class="card-title mt-3 mb-2 text-dark">Belanja</h5>
                  <p class="card-text text-muted">
                    Membeli kebutuhan bulanan di supermarket.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="about" class="pt-5 mt-1">
        <div style="background-color: pink" class="pb-2">
          <header class="bg-pink text-center py-4">
            <h1 class="fw-bold">About Me</h1>
          </header>

          <div class="container mb-5">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                  >
                    Universitas Dian Nuswantoro Semarang (2024 - Now)
                  </button>
                </h2>
                <div
                  id="collapseOne"
                  class="accordion-collapse collapse show"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <strong>This is the first item’s accordion body.</strong> It
                    is shown by default, until the collapse plugin adds the
                    appropriate classes that we use to style each element. These
                    classes control the overall appearance, as well as the
                    showing and hiding via CSS transitions. You can modify any
                    of this with custom CSS or overriding our default variables.
                    It’s also worth noting that just about any HTML can go
                    within the <code>.accordion-body</code>, though the
                    transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo"
                  >
                    SMK Negeri 8 Semarang jurusan RPL (2021-2024)
                  </button>
                </h2>
                <div
                  id="collapseTwo"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <strong>This is the second item’s accordion body.</strong>
                    It is hidden by default, until the collapse plugin adds the
                    appropriate classes that we use to style each element. These
                    classes control the overall appearance, as well as the
                    showing and hiding via CSS transitions. You can modify any
                    of this with custom CSS or overriding our default variables.
                    It’s also worth noting that just about any HTML can go
                    within the <code>.accordion-body</code>, though the
                    transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                  >
                    SMP Negeri 2 Demak (2018-2021)
                  </button>
                </h2>
                <div
                  id="collapseThree"
                  class="accordion-collapse collapse"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It
                    is hidden by default, until the collapse plugin adds the
                    appropriate classes that we use to style each element. These
                    classes control the overall appearance, as well as the
                    showing and hiding via CSS transitions. You can modify any
                    of this with custom CSS or overriding our default variables.
                    It's also worth noting that just about any HTML can go
                    within the <code>.accordion-body</code>, though the
                    transition does limit overflow.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="gallery" class="text-center p-5 bg-info">
        <div class="container">
          <h1 class="fw-bold display-4 pb">Gallery</h1>
          <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
              <!-- Generate buttons dynamically based on the number of items -->
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="1"
                aria-label="Slide 2"
              ></button>
              <!-- Add more buttons as necessary -->
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                  src="image/komputer1977.png"
                  class="d-block w-50 mx-auto"
                  alt="Komputer tahun 1977"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="image/komputer1980.png"
                  class="d-block w-50 mx-auto"
                  alt="Komputer tahun 1980"
                />
              </div>
              <!-- Add more carousel items as necessary -->
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer Section -->
    <footer class="text-center p-5 bg-info">
      <div>
        <a href="https://wa.me/6282136036738" target="_blank">
          <i class="bi bi-whatsapp h2 p-2 text-dark"></i>
        </a>
        <a href="https://www.instagram.com/desriel.kiki" target="_blank">
          <i class="bi bi-instagram h2 p-2 text-dark"></i>
        </a>
        <a href="https://www.tiktok.com/@desriel.kiki" target="_blank">
          <i class="bi bi-tiktok h2 p-2 text-dark"></i>
        </a>
      </div>
      <div>Desriel Frizky Andharta &copy; 2024</div>
    </footer>
    <!-- Tombol Back to Top -->
    <button
      id="backToTop"
      class="btn btn-danger rounded-circle position-fixed bottom-0 end-0 m-3 d-none"
    >
      <i class="bi bi-arrow-up" title="Back to Top"></i>
    </button>
    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>

    <script type="text/javascript">
      function tampilwaktu() {
        const waktu = new Date();

        const tanggal = waktu.getDate();
        const bulan = waktu.getMonth();
        const tahun = waktu.getFullYear();
        const jam = waktu.getHours();
        const menit = waktu.getMinutes();
        const detik = waktu.getSeconds();

        const arrBulan = [
          "1",
          "2",
          "3",
          "4",
          "5",
          "6",
          "7",
          "8",
          "9",
          "10",
          "11",
          "12",
        ];

        const tanggal_full = tanggal + "/" + arrBulan[bulan] + "/" + tahun;
        const jam_full = jam + ":" + menit + ":" + detik;

        document.getElementById("tanggal").innerHTML = tanggal_full;
        document.getElementById("jam").innerHTML = jam_full;
      }

      setInterval(tampilwaktu, 1000);

      const backToTop = document.getElementById("backToTop");

      window.addEventListener("scroll", function () {
        if (window.scrollY > 300) {
          backToTop.classList.remove("d-none");
          backToTop.classList.add("d-block");
        } else {
          backToTop.classList.remove("d-block");
          backToTop.classList.add("d-none");
        }
      });

      backToTop.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });

      const body = document.body;
      const darkModeButton = document.getElementById("darkModeToggle");

      // Check if dark mode is stored in localStorage
      if (localStorage.getItem("darkMode") === "enabled") {
        body.classList.add("dark-mode");
      }

      // Toggle dark/light mode
      darkModeButton.addEventListener("click", () => {
        if (body.classList.contains("dark-mode")) {
          body.classList.remove("dark-mode");
          localStorage.setItem("darkMode", "disabled");
          darkModeButton.textContent = "🌙";
        } else {
          body.classList.add("dark-mode");
          localStorage.setItem("darkMode", "enabled");
          darkModeButton.textContent = "☀️";
        }
      });
    </script>
  </body>
</html>
