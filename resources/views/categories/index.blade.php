@include('header')
<h1>Categories List</h1>

<?php foreach ($category as $c): ?>
<div>
    <a href="
<?= route('category.show', [
        'id' => $c['id']
    ]) ?>">
        <h2><?= $c['title'] ?></h2></a>
</div>
<?php endforeach; ?>

@include('footer')



