<?php 
include 'koneksi.php';

if ($_GET['proses'] == 'insert') {
    if (isset($_POST['Proses'])) {
        $nama_level = $_POST['nama_level'];
        $keterangan = $_POST['keterangan'];

        $sql = mysqli_query($db, "INSERT INTO level (nama_level, keterangan) VALUES ('$nama_level', '$keterangan')");

        if ($sql) {
            echo "<script>window.location='index.php?p=level'</script>";
        } else {
            echo "Data gagal disimpan";
        }
    }
}

if ($_GET['proses'] == 'update') {
    if (isset($_POST['Proses'])) {
        $id = $_GET['id'];
        $nama_level = $_POST['nama_level'];
        $keterangan = $_POST['keterangan'];

        $sql = mysqli_query($db, "UPDATE level SET 
            nama_level = '$nama_level',
            keterangan = '$keterangan'
            WHERE id = '$id'");

        if ($sql) {
            echo "<script>window.location='index.php?p=level'</script>";
        } else {
            echo "Gagal memperbarui data!";
        }
    }
}

if ($_GET['proses'] == 'delete') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM level WHERE id='$id'";
        $sql = mysqli_query($db, $query);

        if ($sql) {
            header("Location:index.php?p=level");
        } else {
            echo "Gagal menghapus data!";
        }
    } 
}
?>
