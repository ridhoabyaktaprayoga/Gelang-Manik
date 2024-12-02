<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Mengizinkan akses dari semua domain
header("Access-Control-Allow-Methods: GET, POST");

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "rdh-manik");


// Cek koneksi
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Koneksi gagal: " . $conn->connect_error]));
}

// Contoh: Mengambil data
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Output JSON
echo json_encode(["status" => "success", "data" => $data]);

$conn->close();
?>
