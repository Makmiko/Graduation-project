    <article class="article">
        <h3><? echo $article['title']; ?></h3>
        <p class="d-flex">
            <span><? echo $article['login']; ?></span> | <span><? echo $article['created']; ?></span>
<!--            <span class="ml-auto">Номинация, если есть</span>-->
        </p>
        <img src="https://picsum.photos/1100/200?grayscale">
        <p>
            <? echo $article['article_text']; ?>

        </p>
    </article>