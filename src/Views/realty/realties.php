<h2 class="centerText"><? echo $page_title; ?></h2>
<div class="realtyBox">
    <?php foreach($realties as $realty):?>
        <article class="realtyItem">
            <h3><? echo $realty['name']; ?></h3>
            <p><span><? echo $realty['address']; ?></span> | <span><? echo $realty['created']; ?></span></p>
            <img class="realtyImg" src="/static/imgs/<?
            foreach ($pics as $pic) {
                if ($realty['id'] == $pic['realty_id']) {
                    echo $pic['name'];
                    break;
                }
            }
            ;?>" alt="">
<!--            <img src="https://picsum.photos/350/100?grayscale">-->
            <p>
                <span><strong>Цена: </strong><? echo $realty['price']; ?></span> рублей<br>
                <span><strong>Количество комнат: </strong><? echo $realty['rooms']; ?></span><br>
                <span><strong>Площадь: </strong><? echo $realty['area']; ?> м²</span><br>
                <a href="/realty/<? echo $realty['type'] . '/' . $realty['id']; ?>">Перейти...</a>
            </p>
        </article>
    <? endforeach; ?>
</div>