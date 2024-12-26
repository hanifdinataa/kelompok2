<?php
include('koneksi.php');

if ($_GET['proses'] == 'insert') {
    if (isset($_POST['proses'])) {

       
        $sql = mysqli_query($db, "INSERT INTO dosenn(nip, nama_dosen, email, prodi_id, notelp, alamat) 
        VALUES ('$_POST[nip]', '$_POST[nama_dosen]', '$_POST[email]', '$_POST[prodi_id]', '$_POST[notelp]', '$_POST[alamat]')");

        
        if ($sql) {
            echo "<script>window.location='index.php?p=dosen'</script>";
        } else {
      
            echo "Error: " . mysqli_error($db);
        }
    }
}


include ('koneksi.php');

if ($_GET['proses'] == 'update') {
    if (isset($_POST['proses'])) {
        $id = $_POST['id'];
        $nip = $_POST['nip'];
        $nama_dosen = $_POST['nama_dosen'];
        $email = $_POST['email'];
        $prodi_id = $_POST['prodi_id'];
        $notelp = $_POST['notelp'];
        $alamat = $_POST['alamat'];

      
        $sql = mysqli_query($db, "UPDATE dosenn SET 
            nip = '$nip', 
            nama_dosen = '$nama_dosen', 
            email = '$email', 
            prodi_id = '$prodi_id', 
            notelp = '$notelp', 
            alamat = '$alamat' 
            WHERE id = '$id'");


        if ($sql) {
            echo "<script>window.location='index.php?p=dosen'</script>";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
}



if ($_GET['proses'] == 'delete') {
    if (isset($_GET['id'])) {

      
        $sql = mysqli_query($db, "DELETE FROM dosenn WHERE id = '$_GET[id]'");

      
        if ($sql) {
            echo "<script>window.location='index.php?p=dosen'</script>";
        } else {
           
            echo "Error: " . mysqli_error($db);
        }
    }
}
?>
