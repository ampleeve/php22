<body>
<h1>Регистрация</h1>
<form action="/customer/registration" method="post">
    <input type="text" name="login" placeholder="email" required><br/>
    <input type="password" name="password" placeholder="Пароль" required><br/>
    <input type="password" name="password2" placeholder="Повторите пароль" required><br/>
    <input type="text" name="phone" placeholder="Номер телефона" required><br/>
    <input type="submit" value="Зарегистрироваться">
</form>
<br/>
<br/>
<a href="/customer/trylogin">Авторизоваться</a>
</body>