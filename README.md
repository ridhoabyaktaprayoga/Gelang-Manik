# Toko Online Gelang Manik

Proyek **Toko Online Gelang Manik** adalah aplikasi web berbasis PHP untuk menjual gelang manik, lengkap dengan fitur e-commerce dan proses manufaktur. Proyek ini dirancang untuk memberikan pengalaman yang menyenangkan bagi pengguna dalam memilih, membeli, dan memproses pesanan gelang manik.

---

## 📜 Fitur
1. **Halaman Utama:**
   - Tampilan produk menarik.
   - Deskripsi dan harga produk.
   - Keranjang belanja interaktif.

2. **Proses Checkout:**
   - Sistem pemesanan sederhana.
   - Konfirmasi pesanan otomatis.

3. **Admin Dashboard:**
   - Tambah, edit, dan hapus produk.
   - Kelola pesanan.
   - Statistik penjualan.

   > **Akses Admin:** Tambahkan `/admin` di akhir URL.

4. **Proses Manufaktur:**
   - Status pembuatan produk.
   - Timeline pengerjaan.

5. **Keamanan:**
   - Autentikasi pengguna.
   - Validasi data form.

---

## 🛠️ Teknologi yang Digunakan
- **Bahasa Pemrograman:** PHP
- **Frontend:** HTML, CSS, JavaScript
- **Database:** MySQL
- **Framework/Library (Opsional):**
  - Bootstrap (untuk styling responsif)
  

---

## 🚀 Instalasi
Ikuti langkah-langkah berikut untuk menjalankan proyek di lokal:

1. Clone repository ini:

   git clone https://github.com/ridhoabyaktaprayoga/Gelang-Manik.git

2. Masuk ke folder proyek:

cd Gelang-Manik

3. Pindahkan file proyek ke folder web server Anda (contoh: htdocs jika menggunakan XAMPP).

4. Buat database di MySQL:

 - Masuk ke phpMyAdmin atau gunakan CLI MySQL.
 - Buat database baru bernama gelang_manik.
 - Import file database (gelang_manik.sql) yang disertakan di folder db.

5.Konfigurasi koneksi database:

- Edit file konfigurasi di config.php atau folder yang relevan.
- Pastikan username, password, dan nama database sesuai dengan setup lokal Anda.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gelang_manik";

6.Jalankan proyek di browser:

Buka URL: http://localhost/Gelang-Manik.

📖 Panduan Penggunaan

Untuk Pengguna
 1. Kunjungi halaman utama untuk melihat katalog produk.
 2. Tambahkan produk ke keranjang belanja.
 3. Lanjutkan ke checkout dan isi detail pengiriman.
Untuk Admin
 1. Akses admin panel dengan menambahkan /admin di URL.
 2. Login menggunakan kredensial admin.
 3. Kelola produk, pesanan, dan manufaktur melalui dashboard.
 

💡 Pengembangan
Jika Anda ingin berkontribusi:

1.Fork repository ini.
2.Buat branch baru:

git checkout -b fitur-baru

3.Lakukan perubahan dan commit:

git commit -m "Menambahkan fitur baru"

4.Push ke branch Anda:

git push origin fitur-baru

5.Ajukan pull request.

Terima kasih telah menggunakan Toko Online Gelang Manik! 😊