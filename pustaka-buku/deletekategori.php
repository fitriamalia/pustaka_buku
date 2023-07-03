<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diupdate
    if (isset($_GET["kode_kategori"])) {
        $kode_kategori = $_GET["kode_kategori"];

        $statement = $conn->prepare("SELECT * FROM kategori WHERE kode_kategori = :kode_kategori;");
        $statement->bindParam(':kode_kategori', $kode_kategori);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_OBJ);
        $result = $statement->fetch();

        if ($result) {
            $statement = $conn->prepare("DELETE FROM kategori WHERE kode_kategori = :kode_kategori");
            $statement->bindParam("kode_kategori", $kode_kategori);
            $statement->execute();

            $response['message'] = "Delete Kategori Buku Berhasil";
        } else {
            http_response_code(404);
            $response['message'] = "informasi kategori buku tidak ditemukan";
        }

    } else {
        $response['message'] = "Delete Kategori Buku Gagal";
    }
} catch (PDOException $e) {
    echo $e;
}

$json = json_encode($response, JSON_PRETTY_PRINT);
echo $json;
?>