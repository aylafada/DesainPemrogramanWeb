# LAPORAN JOBSHEET 8 Desain Pemorograman Web

### Nama  : Aylafada Syakira
### Kelas : TI-2D
### NIM   : 254107020116

## 1. Perubahan di Basis Data & Koneksi (PostgreSQL) 
Pada praktikum jobsheet 8 penyimpanan data yang sebelumnya menggunakan sesi sementara (`$_SESSION`) diubah total menjadi permanen menggunakan basis data PostgreSQL. Hal utama yang diubah meliputi:
- Perancangan ERD & Database: Membuat database baru bernama `simpus_mini` serta membangun tabel `buku` dan tabel `anggota` dengan tipe data yang sesuai seperti `SERIAL` untuk ID, serta kolom atribut buku dan anggota.
- Pembuatan Koneksi PDO: Membuat file koneksi baru menggunakan objek `PDO` (`PDO_PGSQL`) untuk menghubungkan PHP dengan PostgreSQL secara aman.

```php
<?php
$host = "localhost"; 
$db = "simpus_mini"; 
$user = "postgres"; 
$pass = "";
try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>

```

## 2. Notes
Dari praktikum penghubungan database ini terdapat beberapa poin penting:
- Data Menjadi Persisten: Data yang diinputkan tidak lagi hilang saat browser ditutup (seperti saat menggunakan `$_SESSION`), melainkan tersimpan secara permanen di database PostgreSQL.
- Penerapan Prepared Statement: Proses penyimpanan data (`INSERT`) menggunakan parameter terikat (`prepare()` dan `execute()`) agar terhindar dari celah keamanan SQL Injection.
- Pengambilan Data dengan Fetching: Menampilkan data ke tabel web menggunakan fungsi `query()` yang dikombinasikan dengan `fetchAll(PDO::FETCH_ASSOC)`.
- Implementasi Tugas Mandiri: Menerapkan pola koneksi dan query database yang sama persis pada modul pengelolaan Anggota (tabel anggota, list anggota, dan proses tambah anggota).

## 3. Modifikasi 
Modifikasi script PHP dari Jobsheet 7 ke Jobsheet 8 adalah:
- Modifikasi `buku/proses_tambah.php` & `anggota/proses_tambah.php`: Mengganti baris penyimpanan session array (`$_SESSION[...] = ...`) menjadi perintah SQL `INSERT INTO ... VALUES (...)` menggunakan metode `PDO prepare()`.
- Modifikasi `buku/list.php` & `anggota/list.php`: Mengganti perulangan data `foreach` yang tadinya membaca array `$_SESSION` menjadi hasil eksekusi query `SELECT * FROM ... ORDER BY id DESC`.

## 4. Kesimpulan 
Kesimpulan dari praktikum Jobsheet 8 ini adalah aplikasi SIMPUS-Mini kini telah sukses terhubung dengan basis data relasional PostgreSQL. Seluruh struktur form dan validasi server-side tetap berjalan optimal, namun dengan sumber data yang permanen, aman menggunakan prepared statement, serta siap dikembangkan lebih lanjut untuk fitur relasi peminjaman pada jobsheet berikutnya.