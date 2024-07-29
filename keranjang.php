<?php 
include 'header.php'; // Menyertakan file header.php yang berisi elemen HTML umum

// Memproses pembaruan kuantitas item di keranjang
if(isset($_POST['submit1'])){ // Mengecek apakah formulir dengan nama 'submit1' telah dikirim
    $id_keranjang = $_POST['id']; // Mengambil ID item dari formulir
    $qty = $_POST['qty']; // Mengambil kuantitas dari formulir

    // Menjalankan query SQL untuk memperbarui kuantitas item di database
    $edit = mysqli_query($conn, "UPDATE keranjang SET qty = '$qty' where id_keranjang = '$id_keranjang'");
    if($edit){ // Jika pembaruan berhasil
        echo "
        <script>
        alert('KERANJANG BERHASIL DIPERBARUI'); // Menampilkan pesan konfirmasi
        window.location = 'keranjang.php'; // Mengarahkan pengguna kembali ke halaman keranjang
        </script>
        ";
    }
}
// Memproses penghapusan item dari keranjang
else if(isset($_GET['del'])){ // Mengecek apakah parameter 'del' ada di URL
    $id_keranjang = $_GET['id']; // Mengambil ID item dari URL
    // Menjalankan query SQL untuk menghapus item dari database
    $del = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");
    if($del){ // Jika penghapusan berhasil
        echo "
        <script>
        alert('1 PRODUK DIHAPUS'); // Menampilkan pesan konfirmasi
        window.location = 'keranjang.php'; // Mengarahkan pengguna kembali ke halaman keranjang
        </script>
        ";
    }
}
?>

<div class="container" style="padding-bottom: 300px;">
    <h2 style=" width: 100%;"><b>Keranjang</b></h2> <!-- Judul halaman keranjang -->
    <table class="table table-striped"> <!-- Memulai tabel untuk menampilkan item keranjang -->
        <?php 
        if(isset($_SESSION['user'])){ // Mengecek apakah pengguna telah login
            $kode_cs = $_SESSION['kd_cs']; // Mengambil kode pelanggan dari sesi
            // Menjalankan query SQL untuk menghitung jumlah item di keranjang
            $cek = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kode_cs'");
            $jml = mysqli_num_rows($cek); // Menghitung jumlah baris hasil query

            if($jml > 0){ // Jika ada item di keranjang
                ?>  
                <thead>
                    <tr>
                        <th scope="col">No</th> <!-- Kolom nomor -->
                        <th scope="col">Image</th> <!-- Kolom gambar -->
                        <th scope="col">Nama</th> <!-- Kolom nama produk -->
                        <th scope="col">Harga</th> <!-- Kolom harga produk -->
                        <th scope="col">Qty</th> <!-- Kolom kuantitas -->
                        <th scope="col">SubTotal</th> <!-- Kolom subtotal -->
                        <th scope="col">Action</th> <!-- Kolom tindakan -->
                    </tr>
                </thead>
                <?php 
                if(isset($_SESSION['kd_cs'])){ // Mengecek apakah kode pelanggan ada di sesi
                    $kode_cs = $_SESSION['kd_cs']; // Mengambil kode pelanggan dari sesi

                    // Menjalankan query SQL untuk mendapatkan detail produk dan keranjang
                    $result = mysqli_query($conn, "SELECT k.id_keranjang as keranjang, k.kode_produk as kd, k.nama_produk as nama, k.qty as jml, p.image as gambar, p.harga as hrg FROM keranjang k join produk p on k.kode_produk=p.kode_produk WHERE kode_customer = '$kode_cs'");
                    $no = 1; // Inisialisasi nomor urut
                    $hasil = 0; // Inisialisasi total harga
                    while($row = mysqli_fetch_assoc($result)){ // Mengambil data dari hasil query
                ?>
                <tbody>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> <!-- Formulir untuk memperbarui kuantitas -->
                    <input type="hidden" name="id" value="<?php echo $row['keranjang']; ?>"> <!-- Menyimpan ID item dalam input tersembunyi -->
                    <tr>
                        <th scope="row"><?= $no;  ?></th> <!-- Menampilkan nomor urut -->
                        <td><img src="image/produk/<?= $row['gambar']; ?>" width="100"></td> <!-- Menampilkan gambar produk -->
                        <td><?= $row['nama']; ?></td> <!-- Menampilkan nama produk -->
                        <td>Rp.<?= number_format($row['hrg']);  ?></td> <!-- Menampilkan harga produk -->
                        <td><input type="number" name="qty" class="form-control" style="text-align: center;" value="<?= $row['jml']; ?>"></td> <!-- Input untuk kuantitas -->
                        <td>Rp.<?= number_format($row['hrg'] * $row['jml']);  ?></td> <!-- Menampilkan subtotal -->
                        <td><button type="submit" name="submit1" class="btn btn-warning">Update</button> <!-- Tombol untuk memperbarui kuantitas -->
                        | <a href="keranjang.php?del=1&id=<?= $row['keranjang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus ?')">Delete</a></td> <!-- Tombol untuk menghapus item -->
                    </tr>
                    </form>
                <?php 
                    $sub = $row['hrg'] * $row['jml']; // Menghitung subtotal
                    $hasil += $sub; // Menambahkan subtotal ke total
                    $no++; // Menaikkan nomor urut
                }
                }
                ?>
                
                <tr>
                    <td colspan="7" style="text-align: right; font-weight: bold;">Grand Total = Rp.<?= number_format($hasil); ?></td> <!-- Menampilkan total belanja -->
                </tr>
                <tr>
                    <td colspan="7" style="text-align: right; font-weight: bold;"><a href="index.php" class="btn btn-success">Lanjutkan Belanja</a> <a href="checkout.php?kode_cs=<?= $kode_cs; ?>" class="btn btn-primary">Checkout</a></td> <!-- Tombol untuk melanjutkan belanja atau checkout -->
                </tr>
                <?php 
            }else{ // Jika tidak ada item di keranjang
                echo "
                <tr>
                <th scope='col'>No</th>
                <th scope='col'>Image</th>
                <th scope='col'>Nama</th>
                <th scope='col'>Harga</th>
                <th scope='col'>Qty</th>
                <th scope='col'>SubTotal</th>
                <th scope='col'>Action</th>
                </tr>
                <tr>
                <td colspan='7' class='text-center bg-warning'><h5><b>KERANJANG BELANJA ANDA KOSONG </b></h5></td> <!-- Pesan jika keranjang kosong -->
                </tr>
                ";
            }

        }else{ // Jika pengguna belum login
            echo "<tr>
            <td colspan='7' class='text-center bg-danger'><h5><b>SILAHKAN LOGIN TERLEBIH DAHULU SEBELUM BERBELANJA</b></h5></td> <!-- Pesan jika pengguna belum login -->
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
