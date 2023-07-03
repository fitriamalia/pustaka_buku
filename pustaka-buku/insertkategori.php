<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diinsert
    $kode_kategori = $_POST["kode_kategori"];
    $kategori = $_POST["kategori"];

    // Query INSERT
    $stmt = $conn->prepare("INSERT INTO `kategori`(`kode_kategori`, `kategori`) VALUES (:kode_kategori,:kategori)");

    // Mengikat parameter dengan nilai
    $stmt->bindParam(':kode_kategori', $kode_kategori);
    $stmt->bindParam(':kategori', $kategori);


    // Menjalankan query
    $stmt->execute();

    echo "Kategori Buku Berhasil Ditambahkan";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>