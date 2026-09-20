<?php
$host = "localhost"; 
$db = "simpus_mini"; 
$user = "postgres"; // Sesuaikan username PostgreSQL kamu (biasanya postgres)
$pass = "";         // Sesuaikan password PostgreSQL kamu

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>