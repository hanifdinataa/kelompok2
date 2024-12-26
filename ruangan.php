<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Ruangan</h2>
        <div class="table-container">
            <table id="example" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Gedung</th>
                        <th>Lantai</th>
                        <th>Jenis Ruangan</th>
                        <th>Kapasitas</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include 'admin/koneksi.php';
                        $sql = mysqli_query($db, "SELECT * FROM ruangan");
                        $no = 1;
                        while ($data_ruangan = mysqli_fetch_array($sql)) {  
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data_ruangan['kode_ruangan'] ?></td>
                            <td><?= $data_ruangan['nama_ruangan'] ?></td>
                            <td><?= $data_ruangan['gedung'] ?></td>
                            <td><?= $data_ruangan['lantai'] ?></td>
                            <td><?= $data_ruangan['jenis_ruangan'] ?></td>
                            <td><?= $data_ruangan['kapasitas'] ?></td>
                            <td><?= $data_ruangan['keterangan'] ?></td>
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
