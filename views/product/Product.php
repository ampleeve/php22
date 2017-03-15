<?php /** @var \app\models\Product $model*/ ?>
<body>
<?php
//echo "<pre>";var_dump($model);die();

?>
<p>
    <strong>Название товара:</strong> <?= $model->name ?> <br/>
    <strong>Бренд:</strong> <?= $model->brand ?> <br/>
    <strong>Тип:</strong> <?= $model->type ?> <br/>
    <strong>Категория товара:</strong> <?= $model->category ?> <br/>
    <strong>Цена:</strong> <?= $model->price ?> <br/>
    <strong>Описание:</strong> <?= $model->description ?> <br/>
    <i>Поставщик:</i> <?= $model->vendor ?> <br/>
    <i>ID товара:</i> <?= $model->id ?> <br/><br/>
    <a href="/product/index">к списку всех товаров</a>
</p>

</body>

