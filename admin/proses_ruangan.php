<?php
include('koneksi.php');

if ($_GET['proses'] == 'insert') {
    if (isset($_POST['Proses'])) {

       
        $sql = mysqli_query($db, "INSERT INTO ruangan(kode_ruangan, nama_ruangan, gedung, lantai, jenis_ruangan, kapasitas, keterangan) 
                            VALUES ('$_POST[kode_ruangan]', '$_POST[nama_ruangan]', '$_POST[gedung]', '$_POST[lantai]', '$_POST[jenis_ruangan]', '$_POST[kapasitas]', '$_POST[keterangan]')");

        
        if ($sql) {
            echo "<script>window.location='index.php?p=ruangan'</script>";
        } else {
      
            echo "Error: " . mysqli_error($db);
        }
    }
}




if ($_GET['proses'] == 'update') {
    if (isset($_POST['Proses'])) {
        $id = $_POST['id'];
        $kode_ruangan = $_POST['kode_ruangan'];
        $nama_ruangan = $_POST['nama_ruangan'];
        $gedung = $_POST['gedung'];
        $lantai = $_POST['lantai'];
        $jenis_ruangan = $_POST['jenis_ruangan'];
        $kapasitas = $_POST['kapasitas'];
        $keterangan = $_POST['keterangan'];

      
        $sql = mysqli_query($db, "UPDATE ruangan SET 
            kode_ruangan = '$kode_ruangan', 
            nama_ruangan = '$nama_ruangan', 
            gedung = '$gedung', 
            lantai = '$lantai', 
            jenis_ruangan = '$jenis_ruangan', 
            kapasitas = '$kapasitas',
            keterangan = '$keterangan'
            WHERE id = '$id'");


        if ($sql) {
            echo "<script>window.location='index.php?p=ruangan'</script>";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
}



if ($_GET['proses'] == 'delete') {
    if (isset($_GET['id'])) {

      
        $sql = mysqli_query($db, "DELETE FROM ruangan WHERE id = '$_GET[id]'");

      
        if ($sql) {
            echo "<script>window.location='index.php?p=ruangan'</script>";
        } else {
           
            echo "Error: " . mysqli_error($db);
        }
    }
}
?>