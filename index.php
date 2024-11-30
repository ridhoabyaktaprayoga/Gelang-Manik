<?php 
include 'header.php';
?>
<!-- IMAGE -->
<div class="container-fluid" style="margin: 0;padding: 0;">
    <div class="image" style="margin-top: -21px">
<!--ubah style background dibawah menjadi flexible di setiap ukuran -->
<img src="image/home/background-manik.png" style="width: 100vw; height: 100vh; object-fit: cover; display: block;">

    </div>
</div>
<br>
<br>

<!-- PRODUK TERBARU -->
<div class="container">

    <div class="row">
        <?php 
		$result = mysqli_query($conn, "SELECT * FROM produk");
		while ($row = mysqli_fetch_assoc($result)) {
			?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="image/produk/<?= $row['image']; ?>">
                <div class="caption">
                    <h3><?= $row['nama'];  ?></h3>
                    <h4>Rp.<?= number_format($row['harga']); ?></h4>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>"
                                class="btn btn-warning btn-block">Detail</a>
                        </div>
                        <?php if(isset($_SESSION['kd_cs'])){ ?>
                        <div class="col-md-6">
                            <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1"
                                class="btn btn-success btn-block" role="button"><i
                                    class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                        </div>
                        <?php 
							}
							else{
								?>
                        <div class="col-md-6">
                            <a href="keranjang.php" class="btn btn-success btn-block" role="button"><i
                                    class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                        </div>

                        <?php 
							}
							?>

                    </div>

                </div>
            </div>
        </div>
        <?php 
		}
		?>
    </div>

</div>
<br>
<br>
<br>
<br>

