<!-- Профиль -->


<div class='formclass'>

    <img src="img/<?php echo $_SESSION["user"]["avatar"] ?>" width=200 height=250 alt="Фото аватар">

    <h2 style="margin: 10px 0;"> <?php echo  $_SESSION['user']['full_name'] ?></h2>

    <a href="#"><?php echo $_SESSION['user']['email'] ?></a>

    <p><?php echo  $_SESSION['user']['urole'] ?></p>

    <?php if($_SESSION['user']['urole']=='admin'){
echo 'Здравствуйте, коллега, ' . $_SESSION['user']['full_name'] . '! <br> Наш интернет-магазин "ЯК" желает Вам отличного рабочего дня! Для Вас действует 50% скидка на весь ассортимент при покупке.';
}else{
    echo'Приветствуем Вас, ' .$_SESSION['user']['full_name'].'! Желаем приятных покупок!'; 
}
?>

    <p><a href="index.php?&a=123" class="logout">Выход</a></p>

</div>

