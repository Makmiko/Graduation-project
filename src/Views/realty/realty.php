<h2 class="mainRealtyInfo">
    <span>Создан: <? echo $realty['created'];?></span> ||
    <span><strong><? echo $page_title;?></strong></span> ||
    <span> Статус: <? echo $realty['status'];?></span>
</h2>
<div class="realtyBox">
    <div class="realtySlickImages">
        <i class="fas fa-arrow-left leftSlickArrow"></i>
        <i class="fas fa-arrow-right rightSlickArrow"></i>
    </div>
    <div class="realtySlickImages">
        <div class="slider">
            <?php foreach($pics as $pic): ?>
                <div>
                <img class="realtySlickImage" src="/static/imgs/<? echo $pic['name']?>" alt="">
                </div>
            <?endforeach;?>
        </div>
    </div>

    <div class="oneRealtyInfo">
        <div class="realtySubInfo">
            <h6><strong>Адрес:</strong> <? echo $realty['address'];?></h6>
            <h6><strong>Цена:</strong> <? echo $realty['price'];?></h6>
            <h6><strong>Площадь:</strong> <? echo $realty['area'];?></h6>
            <h6><strong>Количество комнат:</strong> <? echo $realty['rooms'];?></h6>
            <a class="btn danger" href="/delete_realty/<? echo $realty['id'];?>">
                Удалить данный объект
            </a>
        </div>
        <div class="realtyDescriptionText">
            <h6><? echo $realty['description']; ?></h6>
        </div>
    </div>

</div>