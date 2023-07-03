<?php
include 'connection.php';

$conn = getConnection();

$kode_kategori = $_GET["kode_kategori"];

try {
    $statement = $conn->prepare("SELECT * FROM kategori WHERE kode_kategori = :kode_kategori;");
    $statement->bindParam(':kode_kategori', $kode_kategori);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if($result){
        echo json_encode($result, JSON_PRETTY_PRINT);
    } else {
        http_response_code(404);
        $response["message"] = "Kategori Buku Tidak Ditemukan.";
        echo json_encode($response,JSON_PRETTY_PRINT);
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>