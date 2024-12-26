<div class="row">

    <br><br>
    <h2>Welcome to IT DEPARTEMENT</h2>
    <a href="admin/index.php">klik</a>

    <?php
    include 'admin/koneksi.php';
    $mod = isset($_GET['mod']) ? $_GET['mod'] : '';
    switch ($mod) {
        default:

            $ambil = mysqli_query($db, "SELECT * FROM berita ORDER BY id DESC limit 6");
            while ($berita = mysqli_fetch_array($ambil)) {
    ?>

                <div class="col-4 mb-3">
                    <div class="card">
                        <img src="admin/uploads/<?= $berita['file_upload'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $berita['judul'] ?></h5>
                            <p class="card-text"><?= $berita['isi_berita'] ?></p>
                            <a href="?p=home&mod=detail&id=<?= $berita['id'] ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

            <?php
            }
            break;
        case 'detail':
            $ambil = mysqli_query($db, "SELECT * FROM berita WHERE id='$_GET[id]'");
            $berita = mysqli_fetch_array($ambil);


            ?>

            <div class="col-4 mb-3">
                <div class="card">
                    <img src="admin/uploads/<?= $berita['file_upload'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $berita['judul'] ?></h5>
                        <p class="card-text"><?= $berita['isi_berita'] ?></p>
                        <a href="#" onclick=history.back() class="btn btn-primary">Back</a>
                    </div> 
                </div>
            </div>


    <?php
            break;
    }
    ?>
</div>