<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diinsert
    $kode_buku = $_POST["kode_buku"];
    $kode_kategori = $_POST["kode_kategori"];
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    $harga = $_POST["harga"];

    // Query INSERT
    $stmt = $conn->prepare("INSERT INTO `buku`(`kode_buku`, `kode_kategori`, `judul`, `pengarang`, `penerbit`, `tahun`, `harga`) VALUES (:kode_buku,:kode_kategori,:judul,:pengarang,:penerbit,:tahun,:harga)");

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

    echo "Data Buku Berhasil Ditambahkan";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>