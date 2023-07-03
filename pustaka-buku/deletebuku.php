<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diupdate
    if (isset($_GET["kode_buku"])) {
        $kode_buku = $_GET["kode_buku"];

        $statement = $conn->prepare("SELECT * FROM buku WHERE kode_buku = :kode_buku;");
        $statement->bindParam(':kode_buku', $kode_buku);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_OBJ);
        $result = $statement->fetch();

        if ($result) {
            $statement = $conn->prepare("DELETE FROM buku WHERE kode_buku = :kode_buku");
            $statement->bindParam("kode_buku", $kode_buku);
            $statement->execute();

            $response['message'] = "Delete Data Buku Berhasil";
        } else {
            http_response_code(404);
            $response['message'] = "informasi data buku tidak ditemukan";
        }

    } else {
        $response['message'] = "Delete Data Buku Gagal";
    }
} catch (PDOException $e) {
    echo $e;
}

$json = json_encode($response, JSON_PRETTY_PRINT);
echo $json;
?>