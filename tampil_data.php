<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Program Studi</title>
</head>
<body>
    <h2>Data Program Studi (Tugas Kelas)</h2>
    <a href="input_form.php"> + TAMBAH PRODI BARU</a>
    <br/><br/>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Prodi/Jurusan</th>
            <th>Kode Prodi</th>
            <th>Status</th>
            <th>Jenjang</th>
            <th>Kaprodi</th>
            <th>Fakultas</th>
            <th>Opsi</th>
        </tr>
        <?php 
        $query = "SELECT * FROM Tugas Kelas";
        $data = mysqli_query($koneksi, $query);
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $d['id']; ?></td>
            <td><?php echo $d['prodi_jurusan']; ?></td>
            <td><?php echo $d['kode_prodi']; ?></td>
            <td><?php echo $d['status']; ?></td>
            <td><?php echo $d['jenjang']; ?></td>
            <td><?php echo $d['kaprodi']; ?></td>
            <td><?php echo $d['fakultas']; ?></td>
            <td>
                <a href="edit_form.php?id=<?php echo $d['id']; ?>">EDIT</a> |
                <a href="hapus_data.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Yakin hapus data ini?')">HAPUS</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
</body>
</html>