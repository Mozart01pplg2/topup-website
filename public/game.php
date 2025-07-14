<?php
require '../includes/db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM produk WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch();

if (!$p) {
    die("Produk tidak ditemukan.");
}
?>

<h2>Beli <?= $p['nama_game'] ?> - <?= $p['nominal'] ?></h2>
<p>Harga: Rp<?= number_format($p['harga'] - ($p['harga'] * $p['diskon'] / 100), 0, ',', '.') ?></p>

<form method="POST" action="order.php">
    <input type="hidden" name="id_produk" value="<?= $p['id'] ?>">
    User ID Game: <input type="text" name="user_id_game" required><br>
    Kontak (WA/IG): <input type="text" name="kontak" required><br>
    <button type="submit">Beli Sekarang</button>
</form>
