<?php 
include 'koneksi.php';

// Proses Insert
if ($_GET['proses'] == 'insert') {
    if (isset($_POST['Proses'])) {
        
        $sql = mysqli_query($db, "INSERT INTO kategori (nama_kategori, keterangan) 
                                  VALUES ('$_POST[nama_kategori]', '$_POST[keterangan]')");

        if ($sql) {
            echo "<script>window.location='index.php?p=kategori'</script>";
        } else {
            echo "Gagal menambahkan data kategori! Error: " . mysqli_error($db);
        }
    }
}

// Proses Update
if ($_GET['proses'] == 'update') {
    if (isset($_POST['Proses'])) {
        $sql = mysqli_query($db, "UPDATE kategori SET
                                  nama_kategori = '$_POST[nama_kategori]', 
                                  keterangan = '$_POST[keterangan]' 
                                  WHERE id = '$_POST[id]'");

        if ($sql) {
            echo "<script>window.location='index.php?p=kategori'</script>";
        } else {
            echo "Gagal memperbarui data kategori!";
        }
    }
}

// Proses Delete
if ($_GET['proses'] == 'delete') {
    $hapus = mysqli_query($db, "DELETE FROM kategori WHERE id = '$_GET[id]'");

    if ($hapus) {
        echo "<script>window.location='index.php?p=kategori'</script>";
    } else {
        echo "Gagal menghapus data kategori!";
    }
}
?>
