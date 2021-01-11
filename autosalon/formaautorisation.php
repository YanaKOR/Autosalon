<!-- Форма авторизации -->


<form class="formclass" action="index.php?&a=121" method="post">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <button type="submit">Войти</button>
    <p>
        У вас нет аккаунта? - <a href="index.php?&a=18">зарегистрируйтесь</a>!
    </p>
    <?php

    if (isset($_SESSION['massage'])) {
        echo '<p class="msg">' . $_SESSION['massage'] . ' </p>';
    }
    unset($_SESSION['massage']);
    ?>

</form>