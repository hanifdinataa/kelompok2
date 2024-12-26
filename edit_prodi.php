

    <?php
    include 'koneksi.php';
    // Mengambil data prodi berdasarkan ID yang dikirimkan melalui URL
    $id = $_GET['id']; // Mengambil ID dari URL
    $ambil = mysqli_query($db, "SELECT * FROM prodi WHERE id = '$id'");
    $data_prodi = mysqli_fetch_array($ambil);
    ?>

    <div class="container">
        <h1 class="mt-4 mb-4">Edit Data Program Studi</h1>
        <a href="list_prodi.php" class="teks">Klik <button class="btn btn-warning mb-2">Disini</button> Untuk Kembali ke daftar program studi</a>
        <form action="" method="POST">

           <!-- Nama Prodi -->
           <div class="row mb-3">
                <label for="nama_prodi" class="col-sm-2 col-form-label">Nama Prodi</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="<?= htmlspecialchars($data_prodi['nama_prodi']); ?>" required autofocus>
                </div>
            </div>

            <!-- Jenjang Studi -->
            <div class="row mb-3">
                <label for="jenjang_studi" class="col-sm-2 col-form-label">Jenjang Studi</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input type="radio" name="jenjang_studi" value="D-2" class="form-check-input" <?= ($data_prodi['jenjang_studi'] == 'D-2') ? 'checked' : ''; ?>>D-2 <br>
                        <input type="radio" name="jenjang_studi" value="D-3" class="form-check-input" <?= ($data_prodi['jenjang_studi'] == 'D-3') ? 'checked' : ''; ?>>D-3 <br>
                        <input type="radio" name="jenjang_studi" value="D-4" class="form-check-input" <?= ($data_prodi['jenjang_studi'] == 'D-4') ? 'checked' : ''; ?>>D-4 <br>
                        <input type="radio" name="jenjang_studi" value="S1" class="form-check-input" <?= ($data_prodi['jenjang_studi'] == 'S1') ? 'checked' : ''; ?>>S1 <br>
                    </div>
                </div>
            </div>

            <button type="submit" name="Proses" value="Proses" class="btn btn-primary">Proses</button>

        </form>
    </div>
    
    <?php
    // Memproses update data jika tombol 'Proses' di-submit
    if (isset($_POST['Proses'])) {
        // Mengambil data dari form
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang_studi = $_POST['jenjang_studi'];

        // Query untuk mengupdate data prodi berdasarkan ID
        $sql = mysqli_query($db, "UPDATE prodi SET 
            nama_prodi = '$nama_prodi',
            jenjang_studi = '$jenjang_studi'
            WHERE id = '$id'");

        // Jika berhasil update, redirect ke halaman list_prodi.php
        if ($sql) {
            echo "<script>window.location='list_prodi.php'</script>";
        } else {
            echo "Gagal memperbarui data!";
        }
    }
    ?>

