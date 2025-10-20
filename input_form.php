<!DOCTYPE html>
<html>
<head>
    <title>Input Prodi Baru</title>
</head>
<body>
    <h2>INPUT DATA PROGRAM STUDI BARU</h2>
    <br/>
    <a href="tampil_data.php">KEMBALI</a>
    <br/><br/>

    <form method="post" action="proses_input.php">
        <table>
            <tr>
                <td>Prodi/Jurusan</td>
                <td><input type="text" name="prodi_jurusan" required></td>
            </tr>
            <tr>
                <td>Kode Prodi</td>
                <td><input type="text" name="kode_prodi" required></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jenjang</td>
                <td><input type="text" name="jenjang" required></td>
            </tr>
            <tr>
                <td>Kaprodi</td>
                <td><input type="text" name="kaprodi" required></td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td><input type="text" name="fakultas" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SIMPAN"></td>
            </tr>
        </table>
    </form>
</body>
</html>