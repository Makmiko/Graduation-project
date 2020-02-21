<? if (isset($result)): ?>
    <p class="alert alert-warning"><? echo $result; ?></p>
<? endif; ?>
<h3>Заполните форму регистрации</h3>
<form method="post" action="/registration">
    <div class="form-group">
        <label for="login">Введите логин</label>
        <input name="login" type="text" class="form-control" id="login"  placeholder="логин">
    </div>
    <div class="form-group">
        <label for="password">Введите пароль</label>
        <input name="password" type="text" class="form-control" id="password"  placeholder="пароль">
    </div>
    <div class="form-group">
        <label for="firstName">Введите имя</label>
        <input name="firstName" type="text" class="form-control" id="firstName"  placeholder="имя">
    </div>
    <div class="form-group">
        <label for="lastName">Введите фамилию</label>
        <input name="lastName" type="text" class="form-control" id="lastName"  placeholder="фамилия">
    </div>
    <div class="form-group">
        <label for="email">Введите email</label>
        <input name="email" type="text" class="form-control" id="email"  placeholder="email">
    </div>
    <div class="form-group">
        <label for="address">Введите адрес</label>
        <input name="address" type="text" class="form-control" id="address"  placeholder="адрес">
    </div>
    <div class="form-group">
        <label for="phone">Введите телефон</label>
        <input name="phone" type="tel"  class="form-control" id="phone"  placeholder="телефон">
    </div>
    <div class="form-group">
        <label for="picture">Загрузить фотографию</label>
        <input type="file" class="form-control-file" id="picture" disabled>
    </div>
    <button type="submit" class="btn btn-primary">Регистрация</button>
</form>