<?php
// memulai session atau melanjutkan session yang sudah ada
session_start();
include "koneksi.php";

// Cek jika sudah login, langsung arahkan ke admin
if (isset($_SESSION['username'])) {
    header("location:admin.php");
    exit();
}

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
  </head>
  <body class="bg-danger">

    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-2 col-sm-8 col-md-6 m-auto">
          <div class="card border-0 shadow rounded-5">
            <div class="card-body">
              <div class="text-center mb-3">
                <i class="bi bi-person-circle h1 display-4"></i>
                <p>My Daily Journal</p>
                <hr />
              </div>
              <form action="" method="post" id="loginForm">
                <input
                  type="text"
                  name="user"
                  id="user"
                  class="form-control my-4 py-2 rounded-4"
                  placeholder="Username"
                />
                <input
                  type="password"
                  name="pass"
                  id="pass"
                  class="form-control my-4 py-2 rounded-4"
                  placeholder="Password"
                />
                <div class="text-center my-3 d-grid">
                  <button class="btn btn-danger rounded-4">Login</button>
                </div>
                <p id="errorMsg" class="text-danger"></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>

    <?php


      if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil input user
    $userInput =$_POST['user'];
    $passInput = $_POST['pass'];

    // Validasi input kosong
    if ($userInput == "") {
        echo "<p class='text-danger'>Username tidak boleh kosong!</p>";
    } elseif ($passInput == "") {
        echo "<p class='text-danger'>Password tidak boleh kosong!</p>";
    } else {
        // Enkripsi password
        $password = md5($passInput);

        // Query dengan prepared statement
        $stmt = $conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
        $stmt->bind_param("ss", $userInput, $password);
        $stmt->execute();
        $hasil = $stmt->get_result();
        $row = $hasil->fetch_array(MYSQLI_ASSOC);

        if ($row) {
            // Sukses login, simpan session
            $_SESSION['username'] = $userInput;
            header("location:admin.php");
            exit();
        } else {
            echo "<p class='text-danger'>Username atau password salah!</p>";
        }
    }
}

?>
  </body>
</html>
