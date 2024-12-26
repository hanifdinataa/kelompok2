<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>Data Program Studi</h2>
        <div class="table-container">
            <table id="example" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Prodi</th>
                        <th>Jenjang Studi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'admin/koneksi.php';
                   
                    $sql = mysqli_query($db, "SELECT * FROM prodi");
                    $no = 1;
                    while ($data_prodi = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data_prodi['nama_prodi'] ?></td>
                            <td><?= $data_prodi['jenjang_studi'] ?></td>
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
