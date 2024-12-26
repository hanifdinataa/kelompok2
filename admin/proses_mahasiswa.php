<?php 
include 'koneksi.php';
if ($_GET['proses']=='insert') {
    if (isset($_POST['Proses'])){
        
        $tgllahir=$_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tgllahir'];
        $hobi=implode(",",$_POST['hobi']);
        $sql=mysqli_query($db,"INSERT INTO mahasiswa(nim,nama,tgllahir,jenis,email,nohp,hobi,alamat) VALUE ('$_POST[nim]','$_POST[nama]','$tgllahir','$_POST[jenis]','$_POST[email]','$_POST[nohp]','$hobi','$_POST[alamat]')");

        if ($sql){
            echo "<script>window.location='index.php?p=mhs'</script>";
           
        }
    }
}

if ($_GET['proses']=='update') {
    if (isset($_POST['Proses'])){
        $tgl_lahir=$_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tgllahir'];
        $hobi=implode(",",$_POST['hobi']);
        $sql=mysqli_query($db,"UPDATE mahasiswa SET
        nama = '$_POST[nama]',
        tgllahir = '$tgllahir',
        jenis = '$_POST[jenis]',
        email = '$_POST[email]',
        nohp = '$_POST[nohp]',
        hobi = '$hobies',
        alamat = '$_POST[alamat]' WHERE nim='$_POST[nim]'");

        if ($sql){
            echo "<script>window.location='index.php?p=mhs'</script>";
           
        }
    }
}

if ($_GET['proses']=='delete') {
    $hapus = mysqli_query($db,"DELETE FROM mahasiswa WHERE nim='$_GET[nim]'");

    if($hapus){
        header("Location: index.php?p=mhs");
    } else{
        echo "Gagal menghapus data!";
    }
}
?>