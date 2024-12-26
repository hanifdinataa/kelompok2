<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Input</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="result-container mt-4">
        <?php
        if (isset($_POST['proses'])) {
            $nim=$_POST['nim'];
            echo "Nama =" . $nim . "<br>";
            echo "NIM =" . $_POST['nim'] . "<br>";
            echo "Email =" . $_POST['email'] . "<br>";
            echo "Tanggal Lahir =" . $_POST['tgllahir'] . "-" . $_POST['bulan'] ."-" . $_POST['tahun'] . "<br>";
            echo "Jenis Kelamin =" . $_POST['jenis'] . "<br>";  
            echo "No Handphone =" . $_POST['nohp'] . "<br>";
            echo "Alamat =" . $_POST['alamat'] . "<br>";  
            $hobies=implode(",",$_POST['hobi']);
            echo "Hobi =" . $hobies . "<br>";   
            
        }
    ?>
        </div>
    </div>
</body>

</html>