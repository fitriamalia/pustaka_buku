<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diupdate
    $nomor = $_POST["nomor"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];

    // Query UPDATE
    $stmt =$conn->prepare("UPDATE anggota SET nama = :nama, jenis_kelamin = :jenis_kelamin, alamat = :alamat, no_hp = :no_hp WHERE nomor = :nomor");

     // Mengikat parameter dengan nilai
     $stmt->bindParam(':nomor', $nomor);
     $stmt->bindParam(':nama', $nama);
     $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
     $stmt->bindParam(':alamat', $alamat);
     $stmt->bindParam(':no_hp', $no_hp);

    // Menjalankan query
    $stmt->execute();

    echo "Anggota berhasil diupdate.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>