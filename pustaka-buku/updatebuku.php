<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diupdate
    $kode_buku = $_POST["kode_buku"];
    $kode_kategori = $_POST["kode_kategori"];
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    $harga = $_POST["harga"];
    
    // Query UPDATE
    $stmt =$conn->prepare("UPDATE buku SET kode_kategori = :kode_kategori, judul = :judul, pengarang = :pengarang, penerbit = :penerbit, tahun = :tahun, harga = :harga WHERE kode_buku = :kode_buku");

    // Mengikat parameter dengan nilai
    $stmt->bindParam(':kode_buku', $kode_buku);
    $stmt->bindParam(':kode_kategori', $kode_kategori);
    $stmt->bindParam(':judul', $judul);
    $stmt->bindParam(':pengarang', $pengarang);
    $stmt->bindParam(':penerbit', $penerbit);
    $stmt->bindParam(':tahun', $tahun);
    $stmt->bindParam(':harga', $harga);

    // Menjalankan query
    $stmt->execute();

    echo "Data Buku Berhasil Diupdate";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>