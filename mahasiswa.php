<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Mahasiswa</h2>
        <div class="table-container">
            <table id="example" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama Mahasiswa</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <th>Hobi</th>
                        <th>Alamat</th>
                        <th>jenis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include 'admin/koneksi.php';
                        $sql = mysqli_query($db, "SELECT * FROM mahasiswa");
                        $no = 1;
                        while ($data_mhs = mysqli_fetch_array($sql)) {  
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data_mhs['nim'] ?></td>
                            <td><?= $data_mhs['nama'] ?></td>
                            <td><?= $data_mhs['email'] ?></td>
                            <td><?= $data_mhs['nohp'] ?></td>
                            <td><?= $data_mhs['hobi'] ?></td>
                            <td><?= $data_mhs['alamat'] ?></td>
                            <td><?= $data_mhs['jenis'] ?></td>
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
