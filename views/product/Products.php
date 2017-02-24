<?php /** @var \app\models\Product $model*/ ?>
<body>
<div>
    <h1>Все товары:</h1>
    <?php foreach ($model as $product): ?>
        <div>
            <a href="/?c=product&a=product&id=<?= $product['id'] ?>"><?= $product['name'] ?></a><br/>
        </div>
    <?php endforeach; ?>
</body>