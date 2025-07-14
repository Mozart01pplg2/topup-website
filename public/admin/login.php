<?php
require '../../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($_POST['password'], $admin['password'])) {
        $_SESSION['admin'] = $admin['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Login gagal";
    }
}
?>
<form method="POST">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  <button type="submit">Login</button>
</form>
