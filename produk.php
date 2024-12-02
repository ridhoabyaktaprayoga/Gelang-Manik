<?php 
    include 'header.php';
?>

<!-- PRODUK TERBARU -->
<div class="container">
    <h2><b>Produk</b></h2>
    <div class="row">
        <?php 
        // Cek apakah ada input pencarian
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            $query = htmlspecialchars($_GET['query']);
            $sql = "SELECT * FROM produk WHERE nama LIKE '%$query%'";
        } else {
            $sql = "SELECT * FROM produk";
        }

        $result = mysqli_query($conn, $sql);

        // Tampilkan produk
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="image/produk/<?= $row['image']; ?>" alt="<?= $row['nama']; ?>">
                    <div class="caption">
                        <h3><?= $row['nama']; ?></h3>
                        <h4>Rp.<?= number_format($row['harga']); ?></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn btn-warning btn-block">Detail</a>
                            </div>
                            <?php if (isset($_SESSION['kd_cs'])) { ?>
                                <div class="col-md-6">
                                    <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1" class="btn btn-success btn-block">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Tambah
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-6">
                                    <a href="keranjang.php" class="btn btn-success btn-block">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Tambah
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
        }

        // Jika tidak ada hasil
        if (mysqli_num_rows($result) == 0) {
            echo "<p class='text-center'>Tidak ada produk yang sesuai dengan kata kunci <b>" . htmlspecialchars($_GET['query']) . "</b>.</p>";
        }
        ?>
    </div>
</div>
