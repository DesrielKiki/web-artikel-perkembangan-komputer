<?php
include "koneksi.php";
include "upload_photo.php";

// Ambil data user yang sedang login
$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username = '$username'";
$hasil = $conn->query($sql);
$data = $hasil->fetch_assoc();

// Jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    $usernameBaru = $_POST['username'];
    $passwordBaru = $_POST['password'];
    $foto_lama = $_POST['foto_lama'];
    $nama_foto = $_FILES['foto']['name'];
    
    // 1. Cek apakah ada upload foto baru
    if ($nama_foto != '') {
        $cek_upload = upload_photo($_FILES["foto"]);
        if ($cek_upload['status']) {
            $foto_baru = $cek_upload['message'];
            // Hapus foto lama
            if (file_exists("img/" . $foto_lama) && $foto_lama != '') {
                unlink("img/" . $foto_lama);
            }
        } else {
            echo "<script>alert('" . $cek_upload['message'] . "');</script>";
            die; // Hentikan proses jika upload gagal
        }
    } else {
        // Jika tidak upload foto, pakai foto lama
        $foto_baru = $foto_lama;
    }

    // 2. Cek apakah password diganti
    if (empty($passwordBaru)) {
        // Jika kosong, pakai password lama (tetap enkripsi lama)
        $password_final = $data['password'];
    } else {
        // Jika isi, enkripsi password baru
        $password_final = md5($passwordBaru);
    }

    // 3. Eksekusi Update (Username, Password, Foto sekaligus)
    // Penting: WHERE menggunakan $username (username lama dari session)
    $stmt = $conn->prepare("UPDATE user SET username = ?, password = ?, foto = ? WHERE username = ?");
    $stmt->bind_param("ssss", $usernameBaru, $password_final, $foto_baru, $username);

    if ($stmt->execute()) {
        // PENTING: Update Session dengan Username Baru
        $_SESSION['username'] = $usernameBaru;
        
        echo "<script>
                alert('Profil berhasil diperbarui!');
                document.location='admin.php?page=profile';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui profil!');
                document.location='admin.php?page=profile';
              </script>";
    }
    
    $stmt->close();
}
?>

<div class="container mt-4">
    <form method="post" action="" enctype="multipart/form-data">
        
        <input type="hidden" name="foto_lama" value="<?= $data['foto'] ?>">

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Ganti Password</label>
            <input type="password" class="form-control" name="password" placeholder="Tuliskan Password Baru Jika Ingin Mengganti Password Saja">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Ganti Foto Profil</label>
            <input type="file" class="form-control" name="foto">
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Profil Saat Ini</label>
            <br>
            <?php 
                if ($data['foto'] != '' && file_exists('img/' . $data['foto'])) {
                    echo '<img src="img/' . $data['foto'] . '" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">';
                } else {
                    echo '<img src="https://via.placeholder.com/150" class="img-thumbnail" alt="Default Profile">';
                }
            ?>
        </div>

        <div class="mb-3">
            <button type="submit" name="simpan" class="btn btn-primary">simpan</button>
        </div>

    </form>
</div>