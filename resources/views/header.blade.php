<style>
    ul {
        display: flex;
        }
    li {
        display: block;
        margin: 10px;
    }
</style>
<header>
    <nav>
        <ul>
            <a href="/"><li>Главная</li></a>
            <a href="<?= route('news') ?>"><li>Новости</li></a>
            <a href="<?= route('category') ?>"><li>Категории</li></a>
            <a href=""><li>Админка</li></a>
        </ul>
    </nav>
</header>
