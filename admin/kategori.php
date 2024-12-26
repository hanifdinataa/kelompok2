<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
    <i class="nav-icon fas fa-tags"></i>
    Kategori
    </h1>
</div>


<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
    case 'list':
?>

        <div class="row">
        <div class="col-6">

            
                <a href="index.php?p=kategori&aksi=input" class="btn btn-primary mb-3"><i class="bi bi-file-plus"></i> Tambah Kategori</a>
            </div>

            <table class="table table-border">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>

                <?php
                include 'koneksi.php';
                $ambil = mysqli_query($db, "SELECT * FROM kategori");
                $no = 1;
                while ($data = mysqli_fetch_array($ambil)) {
                ?>

                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?= $data['nama_kategori'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td>
                            <a href="index.php?p=kategori&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success"><i class="bi bi-pen-fill"></i> Edit</a>
                            <a href="proses_kategori.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-warning" onclick="return confirm('Yakin akan menghapus data?')"><i class="bi bi-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
        </div>

    <?php
        break;

    case 'input':
    ?>
        <div class="row">
            <div class="col-6">
                
                <div class="col-20">
                    <h3>Klik <a href="index.php?p=kategori" class="btn btn-primary mb-3">Disini</a>Untuk Melihat Data Kategori</h3>
                </div>
                <table>
                   <form action="proses_kategori.php?proses=insert" method="POST">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_kategori">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="keterangan">
                            </div>
                        </div>

                        <button type="submit" name="Proses" class="btn btn-danger">Proses</button> &nbsp
                        <button type="reset" class="btn btn-primary"> Reset</button>
                    </form>
                </table>
            </div>
        </div>
    <?php

        break;

    case 'edit':
        include('koneksi.php');

        // Ambil data kategori berdasarkan id
        $ambil = mysqli_query($db, "SELECT * FROM kategori WHERE id='$_GET[id]'");
        $data_kategori = mysqli_fetch_array($ambil);
    ?>

        <div class="row">
            <div class="col-6">
                <h2>Edit Data Kategori</h2>
                <div class="col-2">
                    <a href="index.php?p=kategori" class="btn btn-primary mb-3">Data Kategori</a>
                </div>
                <table>
                    <form action="proses_kategori.php?proses=update" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_kategori" value="<?= $data_kategori['nama_kategori'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="keterangan" value="<?= $data_kategori['keterangan'] ?>">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $data_kategori['id'] ?>">
                        
                        <button type="submit" name="Proses" class="btn btn-danger">Update</button> &nbsp
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </form>
                </table>
            </div>
        </div>
<?php
       
    }