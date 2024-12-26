<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Berita</title>
</head>

<body>

    <div class="container mt-5">
        <h2>Data Berita</h2>
        <div class="table-container">
            <table id="example" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Date Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'admin/koneksi.php';

                    // Query untuk mengambil data berita dan kategori
                    $sql = mysqli_query($db, "
                        SELECT berita.*, kategori.nama_kategori 
                        FROM berita 
                        JOIN kategori ON berita.kategori_id = kategori.id
                    ");

                    $no = 1;
                    while ($data_berita = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data_berita['judul'] ?></td>
                            <td><?= $data_berita['nama_kategori'] ?></td>
                            <td><?= $data_berita['data_created'] ?></td>
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