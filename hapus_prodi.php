<?php
include('koneksi.php');


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM prodi WHERE id='$id'";
    $sql = mysqli_query($db, $query);

    
    if($sql){
        header("Location:list_prodi.php");
    } else {
        echo "Gagal menghapus data!";
    }
} 
?>
