<?php
require '../includes/db.php';

$stmt = $pdo->prepare("INSERT INTO transaksi (id_produk, user_id_game, kontak) VALUES (?, ?, ?)");
$stmt->execute([
    $_POST['id_produk'], $_POST['user_id_game'], $_POST['kontak']
]);

echo "Pesanan berhasil dikirim!";
?>
