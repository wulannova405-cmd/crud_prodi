<?php
// FILE: delete.php
include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM program_studi WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id); 
        
        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?success=deleted");
            exit();
        } else {
            echo "Gagal menghapus data. Error: " . mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt);
    } else {
        die("Gagal mempersiapkan statement: " . mysqli_error($koneksi));
    }
} else {
    header("Location: index.php?error=invalid_id");
    exit();
}
mysqli_close($koneksi);
?>