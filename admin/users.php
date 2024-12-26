<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="nav-icon fas fa-user"></i>
        Users
    </h1>
</div>

<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>
        <div class="row ">
            <div class="col-30">
                <a href="index.php?p=users&aksi=input" class="btn btn-primary mb-3"><i class="bi bi-person-add"></i> Tambah User</a>
            </div>
            <table class="table table-bordered col-30">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Nama Lengkap</th>
                    <th>No Telp</th>
                    <th>Photo</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include 'koneksi.php';
                // Modifikasi query untuk JOIN dengan tabel level
                $ambil = mysqli_query($db, "SELECT user.*, level.nama_level 
                               FROM user 
                               LEFT JOIN level ON user.level = level.id");
                $no = 1;
                while ($data = mysqli_fetch_array($ambil)) {
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?= $data['username'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['nama_level'] ?></td>
                        <td><?= $data['nama_lengkap'] ?></td>
                        <td><?= $data['notelp'] ?></td>
                        <td>
                            <?php if ($data['photo'] && file_exists("uploads/" . $data['photo'])): ?>
                                <img src="uploads/<?= $data['photo'] ?>" alt="Photo" style="max-width: 100px;">
                            <?php else: ?>
                                <img src="assets/img/no-image.png" alt="No Photo" style="max-width: 100px;">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="index.php?p=users&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success"><i class="bi bi-pen-fill"></i> Edit</a>
                            <a href="proses_users.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</a>
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
                    <form action="proses_users.php?proses=insert" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" id="username" class="form-control" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="level_id" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <select name="level_id" id="level_id" class="form-select" required>
                                    <option value="">--Pilih Level--</option>
                                    <?php
                                    include 'koneksi.php';
                                    $sql = mysqli_query($db, "SELECT * FROM level");
                                    while ($data_level = mysqli_fetch_array($sql)) {
                                        echo "<option value='" . $data_level['id'] . "'>" . $data_level['nama_level'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="notelp" class="col-sm-2 col-form-label">No. Telepon</label>
                            <div class="col-sm-10">
                                <input type="tel" name="notelp" id="notelp" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
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
        $ambil = mysqli_query($db, "SELECT * FROM user WHERE id='$_GET[id]'");
        $data = mysqli_fetch_array($ambil);
    ?>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <form action="proses_users.php?proses=update" method="POST" enctype="multipart/form-data"> <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" class="form-control" value="<?= $data['email'] ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Biarkan kosong jika tidak ingin mengubah password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="level_id" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <select name="level_id" id="level_id" class="form-select" required>
                                    <option value="">--Pilih Level--</option>
                                    <?php
                                    $sql = mysqli_query($db, "SELECT * FROM level");
                                    while ($data_level = mysqli_fetch_array($sql)) {
                                        $selected = ($data_level['id'] == $data['level']) ? 'selected' : '';
                                        echo "<option value='" . $data_level['id'] . "' " . $selected . ">" . $data_level['nama_level'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Tambahkan preview foto saat ini jika ada -->
                        <div class="row mb-3">
                            <label for="current_photo" class="col-sm-2 col-form-label">Foto Saat Ini</label>
                            <div class="col-sm-10">
                                <?php if ($data['photo'] && file_exists("uploads/" . $data['photo'])): ?>
                                    <img src="uploads/<?= $data['photo'] ?>" alt="Current Photo" style="max-width: 200px; margin-bottom: 10px;">
                                <?php else: ?>
                                    <p>Tidak ada foto</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap'] ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="notelp" class="col-sm-2 col-form-label">No. Telepon</label>
                            <div class="col-sm-10">
                                <input type="tel" name="notelp" id="notelp" class="form-control" value="<?= $data['notelp'] ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" name="photo" id="photo" class="form-control">
                                <?php if ($data['photo']): ?>
                                    <small class="form-text text-muted">Photo saat ini: <?= $data['photo'] ?></small>
                                <?php endif; ?>
                            </div>
                        </div>

                        <button type="submit" name="Proses" value="Proses" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
<?php
        break;
}
?>