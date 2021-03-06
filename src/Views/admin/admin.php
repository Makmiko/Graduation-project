<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Document</title>
    <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"
    ></script>
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"
    ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/admin.css"/>
</head>
<body>

    <div class="row main_panel">
        <div class="col-2">
            <form action="#">
                <fieldset class="row">
                    <legend class="col">Добавить объект</legend>
                    <label class="col"> Цена: <input class="col" type="number"/></label>
                    <label class="col">Район: <input class="col" type="text"/></label>
                    <label class="col">Улица: <input class="col" type="text"/></label>
                    <label class="col">Дом: <input class="col" type="text"/></label>
                    <label class="col">Квартира: <input class="col" type="text"/></label>
                    <label class="col"> Комнат: <input class="col" type="number"/></label>
                    <button type="button" class="btn btn-dark">Добавить</button>
                </fieldset>
            </form>
        </div>

        <div class="row col-10 object_list">
            <div class="apartment_item col-3">
                <img src="img/1.jpg"/>
                <span>5 000 000₽</span>
                <span>Тамбовская улица, 17Б Санкт-Петербург, Россия, 192007</span>
                <a href="#">Изменить параметры</a>
            </div>
            <div class="apartment_item col-3">
                <img src="img/2.jpg"/>
                <span>5 000 000₽</span>
                <span>Тамбовская улица, 17Б Санкт-Петербург, Россия, 192007</span>
                <a href="#">Изменить параметры</a>
            </div>
            <div class="apartment_item col-3">
                <img src="img/3.jpg"/>
                <span>5 000 000₽</span>
                <span>Тамбовская улица, 17Б Санкт-Петербург, Россия, 192007</span>
                <a href="#">Изменить параметры</a>
            </div>
            <div class="apartment_item col-3">
                <img src="img/4.jpg"/>
                <span>5 000 000₽</span>
                <span>Тамбовская улица, 17Б Санкт-Петербург, Россия, 192007</span>
                <a href="#">Изменить параметры</a>
            </div>
            <div class="apartment_item col-3">
                <img src="img/5.jpg"/>
                <span>5 000 000₽</span>
                <span>Тамбовская улица, 17Б Санкт-Петербург, Россия, 192007</span>
                <a href="#">Изменить параметры</a>
            </div>
            <div class="apartment_item col-3">
                <img src="img/6.jpg"/>
                <span>5 000 000₽</span>
                <span>Тамбовская улица, 17Б Санкт-Петербург, Россия, 192007</span>
                <a href="#">Изменить параметры</a>
            </div>
            <div class="apartment_item col-3">
                <img src="img/7.jpg"/>
                <span>5 000 000₽</span>
                <span>Тамбовская улица, 17Б Санкт-Петербург, Россия, 192007</span>
                <a href="#">Изменить параметры</a>
            </div>
            <div class="apartment_item col-3">
                <img src="img/8.jpg"/>
                <span>5 000 000₽</span>
                <span>Тамбовская улица, 17Б Санкт-Петербург, Россия, 192007</span>
                <a href="#">Изменить параметры</a>
            </div>
            <div class="apartment_item col-3">
                <img src="img/9.jpg"/>
                <span>5 000 000₽</span>
                <span>Тамбовская улица, 17Б Санкт-Петербург, Россия, 192007</span>
                <a href="#">Изменить параметры</a>
            </div>
        </div>
    </div>

</body>
</html>
