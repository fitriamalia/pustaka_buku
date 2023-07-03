<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diinsert
    $nomor = $_POST["nomor"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];

    // Query INSERT
    $stmt = $conn->prepare("INSERT INTO `anggota`(`nomor`, `nama`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES (:nomor,:nama,:jenis_kelamin,:alamat,:no_hp)");

    // Mengikat parameter dengan nilai
    $stmt->bindParam(':nomor', $nomor);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':no_hp', $no_hp);

    // Menjalankan query
    $stmt->execute();

    echo "Data anggota berhasil ditambahkan.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>