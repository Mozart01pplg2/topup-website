<?php
require '../../includes/db.php';
require '../../includes/auth.php';
check_admin();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO event (judul, deskripsi, banner_url, tanggal_mulai, tanggal_akhir) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['judul'], $_POST['deskripsi'], $_POST['banner_url'], $_POST['tanggal_mulai'], $_POST['tanggal_akhir']
    ]);
    $message = "Event berhasil ditambahkan!";
}

$events = $pdo->query("SELECT * FROM event ORDER BY id DESC")->fetchAll();
?>

<h2>Halaman Admin: Event</h2>
<p><strong><?= $message ?></strong></p>

<form method="POST">
    Judul: <input type="text" name="judul" required><br>
    Deskripsi: <textarea name="deskripsi"></textarea><br>
    Banner URL: <input type="text" name="banner_url"><br>
    Mulai: <input type="date" name="tanggal_mulai"><br>
    Akhir: <input type="date" name="tanggal_akhir"><br>
    <button type="submit">Tambah</button>
</form>

<h3>Daftar Event</h3>
<ul>
<?php foreach ($events as $e): ?>
    <li><?= $e['judul'] ?> (<?= $e['tanggal_mulai'] ?> - <?= $e['tanggal_akhir'] ?>)</li>
<?php endforeach; ?>
</ul>
