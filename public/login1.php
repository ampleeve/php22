<?php
session_start();
require_once('functions.php');
// Если пользователь уже авторизован - перенаправляем его на главную.
if (isAuthorized()) {
  redirect('/');
}
// Проверяем что запрос пришел методом пост.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Если пользователь успешно вошел
  if (login($_POST['login'], $_POST['password'])) {
    redirect('/');
  } else {
    // Если пользоваель не смог войти.
    echo '<p>Не верный логин или пароль</p>';
  }
}
?>
<form action="/login.php" method="post">
  <input type="text" name="login" placeholder="Логин" required>
  <input type="password" name="password" placeholder="Пароль" required>
  <input type="submit" value="Войти">
</form>
