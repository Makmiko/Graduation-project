<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><? echo $page_title; ?></title>


<!--    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">-->
<!--    <script src="/node_modules/jquery/dist/jquery.min.css"></script>-->
    <link href="/node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/node_modules/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/node_modules/slick-carousel/slick/slick-theme.css"/>
    <link rel="stylesheet" href="/static/css/style.css">
</head>
<body>


<header>
    <ul class="navigation">
        <li>
            <img src="/static/imgs/13.jpg" alt="">
        </li>
        <li>
            <a class="navItem" href="/realty/primary"><i class="fas fa-building"></i>Новостройки</a>
        </li>
        <li>
            <a class="navItem" href="/realty/assignment">Переуступки</a>
        </li>
        <li>
            <a class="navItem" href="/realty/commercial"><i class="fas fa-hand-holding-usd"></i>Коммерция</a>
        </li>
        <li>
            <span class="navItem" id="social"><i class="fas fa-users"></i>Социальные сети</span>
            <div class="social">
                <div>
                    <a target="_blank" href="https://vk.com/id149084193">Vk</a>
                </div>
                <div>
                    <a target="_blank" href="https://www.instagram.com/tdimglknbd/?hl=ru">Instagram</a>
                </div>
                <div>
                    <a target="_blank" href="https://t.me/joinchat/GYX-HhfIB_CwTvx5kkJiYQ">Telegram</a>
                </div>
            </div>
        </li>
    </ul>
    <div class="account">
        <span>
            <? if(isset($_SESSION['login'])): ?>
                <a class="navItem" href="/account"><i class="fas fa-user"></i>Личный кабинет</a>
        </span>
        <span>
            <a class="navItem" href="/logout"<i class="far fa-share-square"></i>Выход</a>
        </span>
            <?else:?>
                <a class="navItem" href="" data-toggle="modal" data-target="#modal"><i class="fas fa-user"></i>Личный кабинет</a>
        </span>
            <?endif;?>
    </div>
</header>

<!-- Modal -->

<main>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Авторизация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p id="error"></p>
                    <form name="authorisation">
                        <div class="form-group">
                            <label for="login">Ваш логин</label>
                            <input name="login" type="text" class="form-control" id="login"  placeholder="логин">
                        </div>
                        <div class="form-group">
                            <label for="password">Ваш пароль</label>
                            <input name="pwd" type="password" class="form-control" id="password" placeholder="пароль">
                        </div>
                        <button type="submit" class="btn btn-warning">Войти</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <a role="button" href="/registration" class="btn btn-warning">Регистрация</a>
                </div>
            </div>
        </div>
    </div>
    <section class="contentBox">
        <? include_once $content; ?>
    </section>
</main>




<footer>
    <div>
        <img src="/static/imgs/logo.png" alt="">
    </div>
    <ul>
        <li><strong>Недвижимость</strong></li>
        <li>Новостройки</li>
        <li>Переуступки</li>
        <li>Коммерция</li>
    </ul>
    <ul>
        <li><strong>Недвижимость</strong></li>
        <li>Новостройки</li>
        <li>Переуступки</li>
        <li>Коммерция</li>
    </ul>
    <ul>
        <li><strong>Недвижимость</strong></li>
        <li>Новостройки</li>
        <li>Переуступки</li>
        <li>Коммерция</li>
    </ul>
</footer>
<script src="/node_modules/jquery/dist/jquery.js"></script>
<script src="/node_modules/tether/dist/js/tether.js"></script>
<script src="/node_modules/slick-carousel/slick/slick.min.js"></script>
<script src="/static/js/bootstrap.bundle.js"></script>
<script src="/static/js/authorisation.js"></script>
<script src="/static/js/field_validation.js"></script>
<script src="/static/js/animation.js"></script>
</body>
</html>