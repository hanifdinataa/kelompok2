<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Data Dosen</h2>
        <div class="table-container">
            <table id="example" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Dosen</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'admin/koneksi.php';
                    $sql = mysqli_query($db, "SELECT * FROM dosenn");
                    $no = 1;
                    while ($data_dosen = mysqli_fetch_array($sql)) {
                    ?>

                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data_dosen['nip'] ?></td>
                            <td><?= $data_dosen['nama_dosen'] ?></td>
                            <td><?= $data_dosen['email'] ?></td>
                            <td><?= $data_dosen['prodi_id'] ?></td>
                            <td><?= $data_dosen['notelp'] ?></td>
                            <td><?= $data_dosen['alamat'] ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>