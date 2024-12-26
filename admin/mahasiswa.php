<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
    <i class="nav-icon fas fa-user-graduate"></i> Mahasiswa
    </h1>
</div>

<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>
        <div class="row">
           
            <div class="col-10">
                <a href="index.php?p=mhs&aksi=input" class="btn btn-primary mb-3"><i class="bi bi-person-add"></i> Tambah Mahasiswa</a>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Email</th>
                    <th>No Telpon</th>
                    <th>Hobi</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include 'koneksi.php';
                $ambil = mysqli_query($db, "SELECT * FROM mahasiswa");
                $no = 1;
                while ($data = mysqli_fetch_array($ambil)) {
                ?>

                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['nohp'] ?></td>
                        <td><?= $data['hobi']?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td><?= $data['jenis'] ?></td>
                        <td>
                            <a href="index.php?p=mhs&aksi=edit&nim=<?= $data['nim'] ?>" class="btn btn-success"><i class="bi bi-pen-fill"></i> Edit</a>
                            <a href="proses_mahasiswa.php?proses=delete&nim=<?= $data['nim'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</a>
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
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <form action="proses_mahasiswa.php?proses=insert" method="POST">
                            <div class="row mb-3">
                                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nim" id="nim" class="form-control" required autofocus>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-4">
                                            <select name="tgllahir" class="form-control">
                                                <option value="">--TGL--</option>
                                                <?php
                                                    for ($i = 1; $i <= 31; $i++) {
                                                        echo "<option value='$i'>$i</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select name="bulan" class="form-control">
                                                <option value="">--MM--</option>
                                                <?php
                                                    $bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                                    foreach ($bulan as $key => $namaBulan) {
                                                        echo "<option value='$key'>$namaBulan</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select name="tahun" class="form-control">
                                                <option value="">--YY--</option>
                                                <?php
                                                    for ($i = date('Y'); $i >= 1900; $i--) {
                                                        echo "<option value='$i'>$i</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <input type="radio" name="jenis" value="L" checked class="form-check-input"> Laki-Laki
                                    <input type="radio" name="jenis" value="P" class="form-check-input"> Perempuan
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Hobi</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" name="hobi[]" value="Basket"> Basket
                                    <input type="checkbox" name="hobi[]" value="Game"> Game
                                    <input type="checkbox" name="hobi[]" value="Musik"> Musik
                                    <input type="checkbox" name="hobi[]" value="Traveling"> Traveling
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="nohp" class="col-sm-2 col-form-label">No. Telepon</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="nohp" name="nohp" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                                </div>
                            </div>
                            
                            <button type="submit" name="Proses" value="Proses" class="btn btn-primary">Proses</button>
                        </form>
                    </div>
                </div>
            </div>
            
        
    <?php
        break;

    case 'edit':
        include 'koneksi.php';
        $ambil = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
        $data_mhs = mysqli_fetch_array($ambil);
        $tgl = explode("-", $data_mhs['tgllahir']);
        $hobies = explode(",", $data_mhs['hobi']);

    ?>
        
        <form action="proses_mahasiswa.php?proses=update" method="POST">

            <div class="row">
                <div class="col-6">
                    <form>
                        <div class="row mb-3">
                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" name="nim" id="nim" class="form-control" value="<?= $data_mhs['nim'] ?>" readonly required autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $data_mhs['nama'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <div class="row">

                                    <div class="col-4">
                                        <select name="tgllahir" class="form-control">
                                            <option value="">--TGL--</option>
                                            <?php
                                            //counted, uncounted
                                            for ($i = 0; $i <= 31; $i++) {
                                                $selected = ($tgl[2] == $i) ? 'selected' : ''; //ternary
                                                echo "<option value=" . $i . " $selected>" . $i . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="bulan" class="form-control">
                                            <option value="">--MM--</option>
                                            <?php
                                            $bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            foreach ($bulan as $key => $namaBulan) {
                                                $selected = ($tgl[1] == $key) ? 'selected' : ''; //ternary
                                                echo "<option value=" . ($key) . " $selected>" . $namaBulan . "</option>";
                                                $i++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="tahun" class="form-control">
                                            <option value="">--YY--</option>
                                            <?php
                                            for ($i = date('Y'); $i >= 1900; $i -= 1) {
                                                $selected = ($tgl[0] == $i) ? 'selected' : ''; //ternary
                                                echo "<option value=" . ($i) . " $selected>" . $i . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <input type="radio" name="jekel" value="L" class="form-check-input" <?= ($data_mhs['jenis'] == 'L') ? 'checked' : '' ?>>Laki-Laki
                                <input type="radio" name="jekel" value="P" class="form-check-input" <?= ($data_mhs['jenis'] == 'P') ? 'checked' : '' ?>>Perempuan
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" id="email" name="email" id="email" class="form-control" value="<?= $data_mhs['email'] ?>" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nohp" class="col-sm-2 col-form-label">No. Telepon</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="nohp" name="nohp" value="<?= $data_mhs['nohp'] ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Hobi</label>
                            <div class="col-sm-10">
                                <input type="checkbox" name="hobi[]" value="Basket" <?php if (in_array('Basket', $hobies)) echo 'checked' ?>> Basket
                                <input type="checkbox" name="hobi[]" value="Game" <?php if (in_array('Game', $hobies)) echo 'checked' ?>> Game
                                <input type="checkbox" name="hobi[]" value="Musik" <?php if (in_array('Musik', $hobies)) echo 'checked' ?>> Musik
                                <input type="checkbox" name="hobi[]" value="Traveling" <?php if (in_array('Traveling', $hobies)) echo 'checked' ?>> Traveling
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required> <?= $data_mhs['alamat'] ?> </textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="Proses" value="Proses" class="btn btn-primary">update</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
            </div>

        </form>
<?php
        break;
}
?>
