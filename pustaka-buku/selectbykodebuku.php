<?php
include 'connection.php';

$conn = getConnection();

$kode_buku = $_GET["kode_buku"];

try {
    $statement = $conn->prepare("SELECT * FROM buku WHERE kode_buku = :kode_buku;");
    $statement->bindParam(':kode_buku', $kode_buku);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_OBJ);
    $result = $statement->fetch();
    
    if($result){
        echo json_encode($result, JSON_PRETTY_PRINT);
    } else {
        http_response_code(404);
        $response["message"] = "Buku tidak ditemukan.";
        echo json_encode($response,JSON_PRETTY_PRINT);
    }

} catch (PDOException $e) {
    echo $e;
}
?>