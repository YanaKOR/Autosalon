<form class="formclass" action="index.php?&a=20" method="post" enctype="multipart/form-data">
    <label>ФИО</label>
    <input type="text" name="full_name" placeholder="Введите свое полное имя">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин">
    <label>Почта</label>
    <input type="email" name="email" required  placeholder="Введите адрес своей почты">
    <label for="tel">Введите ваш телефон</label>
    <input type="telNo" name="tel" required placeholder="Формат +375-29-1234567" size="20" maxlength="50" pattern="[\+][0-9]{3}-[0-9]{2}-[0-9]{7}">
    <label>Изображение профиля</label>
    <input type="file" name="avatar">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <label>Подтверждение пароля</label>
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
    <button type="submit">Войти</button>
    <p>
        У вас уже есть аккаунт? - <a href="index.php?&a=19">авторизируйтесь</a>!
    </p>
    <?php

    if (isset($_SESSION['massage'])) {
        echo '<p class="msg">' . $_SESSION['massage'] . ' </p>';
    }
    unset($_SESSION['massage']);
    ?>


</form>