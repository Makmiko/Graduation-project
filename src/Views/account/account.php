<? if (isset($result) && $result === \Makmiko\Project\Models\RealtyModel::REALTY_ADD_SUCCESS): ?>
    <p class="alert success fadeOut"><? echo $result; ?></p>
<? elseif(isset($result) && $result === \Makmiko\Project\Models\RealtyModel::REALTY_DELETE_SUCCESS): ?>
    <p class="alert success fadeOut"><? echo $result; ?></p>
<? elseif(isset($result) && ($result === \Makmiko\Project\Models\RealtyModel::PIC_UPLOAD_FAILED
        || $result === \Makmiko\Project\Models\RealtyModel::REALTY_ADD_FAILED)): ?>
    <p class="alert warning fadeOut"><? echo \Makmiko\Project\Models\RealtyModel::PIC_UPLOAD_FAILED; ?></p>
    <p class="alert danger fadeOut"><? echo \Makmiko\Project\Models\RealtyModel::REALTY_ADD_FAILED; ?></p>
<? endif; ?>
<nav id="profileNav">
    <span class="profileNavItem" id="myObjects">
        Мои объекты
    </span>
    <span class="profileNavItem" id="addNewRealty">
        Добавить объект
    </span>
</nav>
    <div class="accountMenu">
    <div class="fadeRealty">
        <div class="realtyBox">
            <?php foreach($realties as $realty):?>
                <article class="realtyItem">
                    <h3><? echo $realty['name']; ?></h3>
                    <p><span><? echo $realty['address']; ?></span> | <span><? echo $realty['created']; ?></span></p>
                    <img class="realtyImg"  src="/static/imgs/<?
                    foreach ($pics as $pic) {
                        if ($realty['id'] == $pic['realty_id']) {
                            echo $pic['name'];
                            break;
                        }
                    }
                    ;?>" alt="">
                    <p>
                        <span><strong>Цена: </strong><? echo $realty['price']; ?></span> рублей<br>
                        <span><strong>Количество комнат: </strong><? echo $realty['rooms']; ?></span><br>
                        <span><strong>Площадь: </strong><? echo $realty['area']; ?> м²</span><br>
                        <a href="/realty/<? echo $realty['type'] . '/' . $realty['id']; ?>">Перейти...</a>
                    </p>
                </article>
            <? endforeach; ?>
        </div>
    </div>
    <div class="fadeAddRealty">
        <form enctype="multipart/form-data" class="addRealty" action="/realty_add" method="post">
            <div class="addRealtyGroup">
                <label for="name">Название</label><br>
                <input placeholder="Название" name="name" id="name" type="text">
            </div>
            <div class="addRealtyGroup">
                <label for="address">Адрес</label><br>
                <input placeholder="Адрес" name="address" id="address" type="text">
            </div>
            <div class="addRealtyGroup">
                <label for="price">Цена</label><br>
                <input placeholder="12345.67890" name="price" id="price" type="text"><span> руб.</span>
            </div>
            <div class="addRealtyGroup">
                <label for="type">Тип</label><br>
                <select name="type" id="type">
                    <option value="primary">Новостройка</option>
                    <option value="assignment">Переуступка</option>
                    <option value="commercial">Коммерческая</option>
                </select>
            </div>
            <div class="addRealtyGroup">
                <label for="rooms">Количество комнат</label><br>
                <input placeholder="Кол-во комнат" name="rooms" id="rooms" type="text">
            </div>
            <div class="addRealtyGroup">
                <label for="area">Площадь</label><br>
                <input placeholder="Площадь" name="area" id="area" type="text"><span> м²</span>
            </div>
            <div class="realtyDescription">
                <label for="description">Описание</label><br>
                <textarea placeholder="..." name="description" id="description" rows="10"></textarea>
            </div>
            <div class="addRealtyPictureInput">
            <input multiple type="file" accept="image/*" name="pictures[]" id="2"/>

            </div>
            <button class="btn-dark addRealtyButton" type="submit">Создать объект</button>
        </form>
    </div>
</div>
