<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>Data Kategori</h2>
        <div class="table-container">
            <table id="example" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'admin/koneksi.php'; // Menghubungkan ke database

                    $sql = mysqli_query($db, "SELECT * FROM kategori"); // Query untuk mengambil data dari tabel kategori
                    $no = 1; // Nomor urut untuk ditampilkan pada tabel
                    while ($data_kategori = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td><?= $no ?></td> <!-- Menampilkan nomor urut -->
                            <td><?= $data_kategori['nama_kategori'] ?></td> <!-- Menampilkan nama kategori -->
                            <td><?= $data_kategori['keterangan'] ?></td> <!-- Menampilkan keterangan kategori -->
                        </tr>
                    <?php
                        $no++; // Menaikkan nomor urut untuk baris berikutnya
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
