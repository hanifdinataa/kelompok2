
<div class="container">
        <h1 class="mt-4 mb-4">Program Studi</h1>
        <a href="list_prodi.php" class="teks" >Klik <button class="btn btn-warning mb-2" >Disini</button> Untuk melihat data yang telah terinput</a>
        <form action="" method="POST">
        <div class="row">
            <div class="col-6">
                <form>

                <!-- NAma Prodi -->
                    <div class="row mb-3">
                        <label for="nama_prodi" class="col-sm-2 col-form-label">Nama Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" required autofocus>
                        </div>
                    </div>

                    <!-- Jenjang Studi -->
                    <div class="row mb-3">
                        <label for="jenjang_studi" class="col-sm-2 col-form-label">Jenjang Studi</label>
                        <div class="col-sm-10">
                        <div class="row mb-3">
                        
                        <div class="col-sm-10">
                            <input type="radio" name="jenjang_studi" value="D-2" checked class="form-check-input">D-2 <br>
                            <input type="radio" name="jenjang_studi" value="D-3" class="form-check-input">D-3 <br>
                            <input type="radio" name="jenjang_studi" value="D-4" class="form-check-input">D-4 <br>
                            <input type="radio" name="jenjang_studi" value="S1" class="form-check-input">S1 <br>
                    </div>
                        
                    </div>


               
                  
                    <button type="submit" name="Proses" value="Proses" class="btn btn-primary">Proses</button>
                </form>

                
            </div>

        </div>
    </div>

    <?php 
    if (isset($_POST['Proses'])){
        include 'koneksi.php';
        
        
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang_studi = $_POST['jenjang_studi'];

        
        $sql = mysqli_query($db, "INSERT INTO prodi (nama_prodi, jenjang_studi) VALUES ('$nama_prodi', '$jenjang_studi')");

        
        if ($sql){
            echo "<script>window.location='list_prodi.php'</script>";
        } else {
            echo "Data gagal disimpan";
        }
    }
?>

</body>
</html>