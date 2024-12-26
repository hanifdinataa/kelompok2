<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
    <i class="nav-icon fas fa-door-open"></i>    Ruangan
    </h1>
</div>



<?php
include 'koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
    case 'list':
?>

        <div class="row">
            
            <div class="col-2">
                <a href="index.php?p=ruangan&aksi=input" class="btn btn-primary mb-3"><i class="bi bi-file-plus"></i> Tambah Ruangan</a>
            </div>

            <table class="table table-border">
                <tr>
                    <th>No</th>
                    <th>Kode Ruangan</th>
                    <th>Nama Ruangan</th>
                    <th>Gedung</th>
                    <th>Lantai</th>
                    <th>Jenis Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>

                <?php
                
                $ambil = mysqli_query($db, "SELECT * FROM ruangan");
                $no = 1;
                while ($data = mysqli_fetch_array($ambil)) {
                ?>

                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?= $data['kode_ruangan'] ?></td>
                        <td><?= $data['nama_ruangan'] ?></td>
                        <td><?= $data['gedung'] ?></td>
                        <td><?= $data['lantai'] ?></td>
                        <td><?= $data['jenis_ruangan'] ?></td>
                        <td><?= $data['kapasitas'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td>
                            <a href="index.php?p=ruangan&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success"><i class="bi bi-pen-fill"></i> Edit</a>
                            <a href="proses_ruangan.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-warning" onclick="return confirm('Yakin akan menghapus data?')"><i class="bi bi-trash"></i> Hapus</a>
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
                
                <div class="col-19">
                  <p>Klik <a href="index.php?p=ruangan" class="btn btn-primary mb-3"> Disini</a>Untuk melihat Data Ruangan
                  </p>  

                </div>
                <table>
                    <form action="proses_ruangan.php?proses=insert" method="POST">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kode Ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode_ruangan">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_ruangan">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">gedung</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="gedung">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Lantai</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lantai">
                            </div>
                        </div>





                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jenis_ruangan">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kapasitas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kapasitas">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="keterangan" cols="50" rows="4"></textarea>
                            </div>
                        </div>

                        <button type="submit" name="Proses" class="btn btn-danger">Proses</button> &nbsp
                        <button type="submit" name="proses" class="btn btn-primary"> Reset</button>
                    </form>
                </table>
            </div>
        </div>
    <?php

        break;
    case 'edit':
        

        // Ambil data ruangan berdasarkan id
        $ambil = mysqli_query($db, "SELECT * FROM ruangan WHERE id='$_GET[id]'");
        $data_ruangan = mysqli_fetch_array($ambil);
    ?>

        <div class="row">
            <div class="col-6">
                <h2>Edit Data ruangan</h2>
                <div class="col-2">
                    <a href="index.php?p=ruangan" class="btn btn-primary mb-3">Data ruangan</a>
                </div>
                <table>
                    <form action="proses_ruangan.php?proses=update" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">kode_ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode_ruangan" value="<?= $data_ruangan['kode_ruangan'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_ruangan" value="<?= $data_ruangan['nama_ruangan'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">gedung</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="gedung" value="<?= $data_ruangan['gedung'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Lantai</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lantai" value="<?= $data_ruangan['lantai'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jenis_ruangan" value="<?= $data_ruangan['jenis_ruangan'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kapasitas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kapasitas" value="<?= $data_ruangan['kapasitas'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="keterangan" cols="50" rows="4" class="form-control"><?= $data_ruangan['keterangan'] ?></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $data_ruangan['id'] ?>">
                        
                        <button type="submit" name="Proses" class="btn btn-danger">Update</button> &nbsp
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </form>
                </table>
            </div>
        </div>
<?php
        break;
}
?>