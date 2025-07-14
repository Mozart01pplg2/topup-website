<?php
echo "<h2>Topup App berhasil jalan!</h2>";
echo "<a href='/app/customer/index.php'>Masuk Customer</a>";

require '../includes/db.php';
$produk = $pdo->query("SELECT * FROM produk WHERE aktif = TRUE")->fetchAll();
?>


<h1>Daftar Produk Top-Up</h1>
<ul>
<?php foreach ($produk as $p): ?>
    <li>
        <?= $p['nama_game'] ?> - <?= $p['nominal'] ?> - Rp<?= number_format($p['harga'] - ($p['harga'] * $p['diskon'] / 100), 0, ',', '.') ?>
        <a href="game.php?id=<?= $p['id'] ?>">Beli</a>
    </li>
<?php endforeach; ?>
</ul>
