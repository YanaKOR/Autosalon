<?php
echo ' <h1>Заказ оформлен</h1>';
?>


<img src="img/<?php echo $_SESSION["user"]["avatar"] ?>" width=200 height=250 alt="Фото аватар">

<h2 style="margin: 10px 0;"> <?php echo  $_SESSION['user']['full_name'] ?></h2>
<p>Ваш Email</p><?php echo $_POST['email']; ?>
<p>Ваш телефон</p><?php echo $_POST['tel']; ?><br><br>



<?php
require_once 'vendor/connect.php';

foreach (array_keys($_SESSION) as $x) {

    if ($x != "style" && $x != "language" && $x != "user") {

        $query = "SELECT * FROM goods where id_goods=" . $_SESSION[$x];
        if ($result = mysqli_query($link, $query)) {
            $row = mysqli_fetch_assoc($result);


            if (isset($_SESSION['language']) && $_SESSION['language'] == "english") {
                echo '
<br><div>' . $row["namegoods"] . '</div><br><div><img src="img/' . $row["image"] . '" width=280 height=200></div><div>' . $row["texteng"] . '</div><br>';
            } else {
                echo '
<br><div>' . $row["namegoods"] . '</div><br><div><img src="img/' . $row["image"] . '" width=280 height=200></div><div>' . $row["textrus"] . '</div><br>';
            }
        }
    }
}


echo '<p>Дополнительные услуги:</p>';
if (isset($_POST['add']) && $_POST['add'] == 'add') {
    print "Дополнительное оборудование";
}
echo '<br>';

if (isset($_POST['registration']) && $_POST['registration'] == 'registration') {
    print "Регистрация автомобиля";
}
echo '<br>';
if (isset($_POST['garant']) && $_POST['garant'] == 'garant') {
    print "Расширенная гарантия";
}
echo '<br>';

if (isset($_POST['trade-in']) && $_POST['trade-in'] == 'trade-in') {
    print "Trade-in";
}

echo '<p>Способ оплаты:</p>';
if ($_POST['buy'] == 'cash') {
    print "Наличные";
}


if ($_POST['buy'] == 'card') {
    print "Банковская карточка";
}


echo '<p>Способ связи:</p>';
if ($_POST['contact'] == 'email') {
    print "Email";
}


if ($_POST['contact'] == 'phone') {
    print "Phone";
}

echo '<p>Комментарий:</p>' . $_POST['comments'];
session_destroy();

?>

<h1>Cпасибо за заказ!</h1>

<p><a href='index.php?&a=2'><?php
                            echo  $back;
                            ?></a></p>