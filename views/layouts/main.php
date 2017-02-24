<?php /** @var \app\models\Product $model*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site</title>
</head>
<body>
<!-- Блок пользователя-->
<p>Привет, пользователь!</p>

<?php if ($isAuthorized == false): ?>
    <a href="">Выйти</a>
<?php else: ?>
    <a href="/?c=login&a=showform">Войти</a>
<?php endif; ?>
<?= $content ?>
<br/>
<br/>
<a href="/">На главную</a>
</body>
</html>