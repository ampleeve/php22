<?php /** @var \app\models\Product $model*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site</title>
</head>
<body>
<!-- Блок пользователя-->
<p>Привет, <?= $username?$username:'Гость'?>!</p>

<?php if ($username): ?>
    <a href="/auth/logout">Выйти</a>
<?php else: ?>
    <a href="/auth/">Войти</a>
<?php endif; ?>
<?= $content ?>
<br/>
<br/>
<a href="/">На главную</a>
</body>
</html>