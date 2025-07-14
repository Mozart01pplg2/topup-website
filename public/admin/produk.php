<?php
require '../../includes/db.php';
require '../../includes/auth.php';
check_admin();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nama_game']) && !empty($_POST['nominal']) && !empty($_POST['harga'])) {
        $stmt = $pdo->prepare("INSERT INTO produk (nama_game, nominal, harga, diskon) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $_POST['nama_game'], $_POST['nominal'], $_POST['harga'], $_POST['diskon'] ?? 0
        ]);
        $message = "Produk berhasil ditambahkan!";
    } else {
        $message = "Mohon isi semua field yang wajib.";
    }
}

$produk = $pdo->query("SELECT * FROM produk ORDER BY id DESC")->fetchAll();
?>

<h2>Halaman Admin: Produk</h2>
<p><strong><?= $message ?></strong></p>

<form method="POST">
    Game: <input type="text" name="nama_game" required><br>
    Nominal: <input type="text" name="nominal" required><br>
    Harga: <input type="number" name="harga" required><br>
    Diskon: <input type="number" name="diskon"><br>
    <button type="submit">Tambah</button>
</form>

<h3>Daftar Produk</h3>
<ul>
<?php foreach ($produk as $p): ?>
    <li><?= $p['nama_game'] ?> - <?= $p['nominal'] ?> - Rp<?= number_format($p['harga'], 0, ',', '.') ?> (Diskon <?= $p['diskon'] ?>%)</li>
<?php endforeach; ?>
</ul>
