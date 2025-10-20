<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Program Studi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 90%; margin: 20px auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn-tambah { padding: 10px 15px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; }
        .status-aktif { color: green; font-weight: bold; }
        .status-nonaktif { color: red; }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Program Studi</h2>
    <a href="input.php" class="btn-tambah">Tambah Data Prodi</a>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Prodi/Jurusan</th>
                <th>Kode Prodi</th>
                <th>Status</th>
                <th>Jenjang</th>
                <th>Kaprodi</th>
                <th>Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM program_studi ORDER BY fakultas, prodi_jurusan";
            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) > 0) {
                while($data = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($data['prodi_jurusan']); ?></td>
                    <td><?php echo htmlspecialchars($data['kode_prodi']); ?></td>
                    <td>
                        <span class="<?php echo ($data['status'] == 'aktif') ? 'status-aktif' : 'status-nonaktif'; ?>">
                            <?php echo htmlspecialchars(ucfirst($data['status'])); ?>
                        </span>
                    </td>
                    <td><?php echo htmlspecialchars($data['jenjang']); ?></td>
                    <td><?php echo htmlspecialchars($data['kaprodi']); ?></td>
                    <td><?php echo htmlspecialchars($data['fakultas']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> | 
                        <a href="delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='8' style='text-align:center;'>Belum ada data program studi.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>