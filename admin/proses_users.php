<?php
session_start();
include 'koneksi.php';

$target_dir = "uploads/";

if ($_GET['proses'] == 'insert') {
    // Cek apakah ada file yang diupload
    if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        // Proses upload file foto
        $nama_file = rand() . '-' . basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $nama_file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi file
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check === false) {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Maaf, file Anda tidak dapat diunggah.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $password_hashed = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $sql = mysqli_query($db, "INSERT INTO user (username, email, password, level, nama_lengkap, notelp, photo) 
                    VALUES ('$_POST[username]', '$_POST[email]', '$password_hashed', '$_POST[level_id]', '$_POST[nama_lengkap]', '$_POST[notelp]', '$nama_file')");
                
                if ($sql) {
                    echo "<script>window.location='index.php?p=users'</script>";
                } else {
                    echo "Gagal menyimpan data!";
                }
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file.";
            }
        }
    } else {
        // Jika tidak ada file yang diupload, simpan tanpa foto
        $password_hashed = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql = mysqli_query($db, "INSERT INTO user (username, email, password, level, nama_lengkap, notelp) 
            VALUES ('$_POST[username]', '$_POST[email]', '$password_hashed', '$_POST[level_id]', '$_POST[nama_lengkap]', '$_POST[notelp]')");
        
        if ($sql) {
            echo "<script>window.location='index.php?p=users'</script>";
        } else {
            echo "Gagal menyimpan data!";
        }
    }
}

if ($_GET['proses'] == 'update') {
    if (isset($_POST['Proses'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $level = $_POST['level_id']; // Changed from level_id to level
        $nama_lengkap = $_POST['nama_lengkap'];
        $notelp = $_POST['notelp'];

        // Mengupdate data termasuk password (jika diisi)
        $password_sql = "";
        if (!empty($_POST['password'])) {
            $password_hashed = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $password_sql = ", password='$password_hashed'";
        }

        // Cek apakah ada file baru yang diupload
        if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
            $nama_file = rand() . '-' . basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $nama_file;
            
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // Hapus file lama jika ada
                $result = mysqli_query($db, "SELECT photo FROM user WHERE id='$id'");
                $data = mysqli_fetch_assoc($result);
                if ($data['photo'] && file_exists($target_dir . $data['photo'])) {
                    unlink($target_dir . $data['photo']);
                }
                
                $sql = mysqli_query($db, "UPDATE user SET 
                    username = '$username', 
                    email = '$email', 
                    level = '$level', 
                    nama_lengkap = '$nama_lengkap', 
                    notelp = '$notelp', 
                    photo = '$nama_file' 
                    $password_sql
                    WHERE id = '$id'");
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file.";
                exit;
            }
        } else {
            // Update tanpa foto baru
            $sql = mysqli_query($db, "UPDATE user SET 
                username = '$username', 
                email = '$email', 
                level = '$level', 
                nama_lengkap = '$nama_lengkap', 
                notelp = '$notelp'
                $password_sql
                WHERE id = '$id'");
        }

        if ($sql) {
            echo "<script>window.location='index.php?p=users'</script>";
        } else {
            echo "Gagal memperbarui data!";
        }
    }
}

if ($_GET['proses'] == 'delete') {
    $id = $_GET['id'];
    $result = mysqli_query($db, "SELECT photo FROM user WHERE id='$id'");
    $data = mysqli_fetch_assoc($result);

    if ($data['photo'] && file_exists($target_dir . $data['photo'])) {
        unlink($target_dir . $data['photo']);
    }

    $hapus = mysqli_query($db, "DELETE FROM user WHERE id='$id'");
    if ($hapus) {
        echo "<script>window.location='index.php?p=users'</script>";
    } else {
        echo "Gagal menghapus data!";
    }
}
?>