@include('header')

<h1>List News</h1>
<?php foreach ($news as $n): ?>
<?php foreach ($categories as $category)?>
<div>
    <a href="
<?= route('news.show', [
        'id' => $n['id']
    ]) ?>">
        <h2><?= $n['title'] ?></h2></a>
    <a href="<?= route('category.show', [
        'id' => $category['id']
    ]) ?>"><p>Категория: <?= $category['title']?></p></a>
    <p><?= $n['description']?></p>
</div>
<hr>
<?php endforeach; ?>

@include('footer')


