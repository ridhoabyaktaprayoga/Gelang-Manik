<?php
include 'koneksi/koneksi.php';
if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']); // Mencegah XSS
    $hasil = mysqli_query($conn, "SELECT * FROM produk WHERE nama LIKE '%$query%'");
    echo "<h1>Hasil Pencarian untuk: $query</h1>";
    while ($row = mysqli_fetch_assoc($hasil)) {
        echo "<p>" . $row['nama'] . "</p>";
    }
} else {
    echo "<p>Masukkan kata kunci untuk mencari produk.</p>";
}
?>
