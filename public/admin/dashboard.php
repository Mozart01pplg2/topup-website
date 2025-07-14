<?php
require '../../includes/auth.php';
check_admin();
?>

<h2>Selamat datang, <?= $_SESSION['admin'] ?></h2>
<ul>
  <li><a href="produk.php">Kelola Produk</a></li>
  <li><a href="event.php">Kelola Event</a></li>
</ul>
