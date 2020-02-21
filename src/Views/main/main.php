    <h2>Главная страница</h2>
    <div class="row">
        <?php foreach($all_articles as $article):?>

        <article class="col-sm">
            <h3><? echo $article['title']; ?></h3>
            <p><span><? echo $article['login']; ?></span> | <span><? echo $article['created']; ?></span></p>
            <img src="https://picsum.photos/350/100?grayscale">
            <p><? echo $article['article_text']; ?>
                <a href="/articles/<? echo $article['idarticle']; ?>"> Перейти к статье</a>
            </p>
        </article>
        <? endforeach; ?>
    </div>
