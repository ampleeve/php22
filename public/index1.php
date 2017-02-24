<?php
session_start();
require_once('functions.php');
?>

<p>Привет, <?= getCurrentUserName(); ?></p>

<?php if (isAuthorized()): ?>
  <a href="logout.php">Выйти</a>
<?php else: ?>
  <a href="login.php">Войти</a>
<?php endif; ?>
