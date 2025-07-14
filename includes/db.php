<?php
$host = 'db.<your-id>.supabase.co'; // ganti
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = 'arsza110308.';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    exit;
}
?>
