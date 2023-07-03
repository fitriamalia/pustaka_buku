<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diupdate
    $kode_kategori = $_POST["kode_kategori"];
    $kategori = $_POST["kategori"];

    // Query UPDATE
    $stmt =$conn->prepare("UPDATE kategori SET kategori = :kategori WHERE kode_kategori = :kode_kategori");

    // Mengikat parameter dengan nilai
    $stmt->bindParam(':kode_kategori', $kode_kategori);
    $stmt->bindParam(':kategori', $kategori);

    // Menjalankan query
    $stmt->execute();

    echo "Kategori Buku Berhasil Diupdate";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>