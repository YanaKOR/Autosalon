<?php
session_start();


if (isset($_POST['language'])) {
    $_SESSION['language'] = $_POST['language'];
};

if (isset($_POST['style'])) {
    $_SESSION['style'] = $_POST['style'];
};

if (isset($_SESSION['language']) && $_SESSION['language'] == "english") {
    include('css/english.php');
} else {
    include('css/russian.php');
}


 if (isset($_POST['new_rus_cat'])) {
 $_SESSION['new_rus_cat'] = $_POST['new_rus_cat'];
 };

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <?php
    if (isset($_SESSION['style']) && $_SESSION['style'] === 'dark') {
        echo '<link rel="stylesheet" type="text/css" href="css/dark_theme.css">';
    } else {
        echo '<link rel="stylesheet" type="text/css" href="css/light_theme.css">';
    }


    ?>

</head>

<body>
    <div class="wrapper">
        <div class="content">

            <div class="header">

                <div class="logo">
                    <img src="img\36262.png" width="130px" height="120px">
                </div>

                <div class="title">
                    <h1>
                        <?php
                        echo  $title;
                        ?>
                    </h1>
                </div>

                <div class="header_form">
                    <form name="language" method=post action=''>

                        Выбирете язык:
                        <select name="language" size="1">
                            <option <?php if (isset($_SESSION['language']) && $_SESSION['language'] == "russian") {
                                        echo 'selected';
                                    } else {
                                        echo '';
                                    } ?> value="russian">Русский
                            <option <?php if (isset($_SESSION['language']) && $_SESSION['language'] == "english") {
                                        echo 'selected';
                                    } else {
                                        echo '';
                                    } ?> value="english">English
                        </select>
                        <br><br>
                        Выбирете тему:
                        <select name="style" size="1">
                            <option <?php if (isset($_SESSION['style']) && $_SESSION['style'] == "light") {
                                        echo 'selected';
                                    } else {
                                        echo '';
                                    } ?> value="light"><?php echo $light ?>
                            <option <?php if (isset($_SESSION['style']) && $_SESSION['style'] == "dark") {
                                        echo 'selected';
                                    } else {
                                        echo '';
                                    } ?> value="dark"><?php echo $dark ?>
                        </select>

                        <br>

                        <input type="submit" value=<?php echo $send ?>><br><br>
                    </form>


                    <?php
                    if (isset($_SESSION['user'])) {
                        echo ' <button> <a href=index.php?&a=123>' . $exit . '</a></button>';
                    } else {
                        echo ' <button> <a href=index.php?&a=19>' . $sign_in . '</a></button>';
                    }

                    if (isset($_SESSION['user']) && $_GET['a'] != 5) {
                        echo ' <button> <a href=index.php?&a=4>' . $basket . '</a></button>';
                    } else {
                        '';
                    }

                    ?>


                </div>
            </div>


            <div class="main">
                <div class="menu">
                    <div class="search">
                        <form name=formsort method=post action='index.php?&a=2'>
                            <input type="text" name="find" placeholder=<?php
                                                                        echo  $search;
                                                                        ?>>
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <ul>
                        <li><a href="index.php?&a=1"><?php echo  $home; ?></a></li>


                        <li><a href="index.php?&a=2"><?php
                                                        echo  $goods;
                                                        ?></a>

                            <ul>
                                <li> <a href="index.php?&a=7"><?php
                                                                echo  $auto;
                                                                ?></a>
                                </li>
                                <li> <a href="index.php?&a=8"><?php
                                                                echo  $moto;
                                                                ?></a></li>
                                <li> <a href="index.php?&a=9"><?php
                                                                echo  $spares;
                                                                ?></a></li>


                                <?php
                                require_once 'vendor/connect.php';
                                
                                $query =  'SELECT * FROM categories where id_categories >=4';
                                if ($result = mysqli_query($link, $query)) {
                                    mysqli_num_rows($result);
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        if (isset($_SESSION['language']) && $_SESSION['language'] == "english") {

                                            echo '<li><a href="index.php?&a=130">' . $row["descriptioneng"] . '<a/></li>';
                                        }


                                        if (isset($_SESSION['language']) && $_SESSION['language'] == "russian") {

                                            echo '<li><a href="index.php?&a=130">' . $row["descriptionrus"] . '<a/></li>';
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </li>

                        <li><a href="index.php?&a=3"><?php
                                                        echo  $contact;
                                                        ?></a></li>




                        <?php
                        if (isset($_SESSION['user']["urole"]) && $_SESSION['user']['urole'] == 'admin') {
                            echo '
                     

                        <li><a href="#">Администратор</a>
                            <ul>
                                <li><a href="index.php?&a=10">Категории</a></li>
                                <li><a href="index.php?&a=14">Товары </a></li>
                                <li><a href="index.php?&a=124">Пользователи</a></li>
                         </ul>
                        </li>';
                        }
                        ?>

                    </ul>
                </div>



                <div class="box">
                    <?php

                    if ($_GET['a'] == 1) {
                        include("index_welcom.php");
                    } elseif ($_GET['a'] == 2) {
                        include("index_goods.php");
                    } elseif ($_GET['a'] == 3) {
                        include("index_contacts.php");
                    } elseif ($_GET['a'] == 4) {
                        include("index4.php");
                    } elseif ($_GET['a'] == 5) {
                        include("index5.php");
                    } elseif ($_GET['a'] == 7) {
                        include("categories_auto.php");
                    } elseif ($_GET['a'] == 8) {
                        include("categories_moto.php");
                    } elseif ($_GET['a'] == 9) {
                        include("categories_spares.php");
                    } elseif ($_GET['a'] == 10) {
                        include("mycategories.php");
                    } elseif ($_GET['a'] == 11) {
                        include("mycategories_add.php");
                    } elseif ($_GET['a'] == 21) {
                        include("mycategories_add.php");
                    } elseif ($_GET['a'] == 12) {
                        include("mycategories_delete.php");
                    } elseif ($_GET['a'] == 22) {
                        include("mycategories_delete.php");
                    } elseif ($_GET['a'] == 13) {
                        include("mycategories_edit.php");
                    } elseif ($_GET['a'] == 33) {
                        include("mycategories_edit.php");
                    } elseif ($_GET['a'] == 43) {
                        include("mycategories_edit.php");
                    } elseif ($_GET['a'] == 14) {
                        include("mygoods.php");
                    } elseif ($_GET['a'] == 15) {
                        include("mygoods_add.php");
                    } elseif ($_GET['a'] == 25) {
                        include("mygoods_add.php");
                    } elseif ($_GET['a'] == 16) {
                        include("mygoods_delete.php");
                    } elseif ($_GET['a'] == 26) {
                        include("mygoods_delete.php");
                    } elseif ($_GET['a'] == 17) {
                        include("mygoods_edit.php");
                    } elseif ($_GET['a'] == 37) {
                        include("mygoods_edit.php");
                    } elseif ($_GET['a'] == 47) {
                        include("mygoods_edit.php");
                    } elseif ($_GET['a'] == 18) {
                        include("formaregistration.php");
                    } elseif ($_GET['a'] == 19) {
                        include("formaautorisation.php");
                    } elseif ($_GET['a'] == 20) {
                        include("vendor/signup.php");
                    } elseif ($_GET['a'] == 121) {
                        include("vendor/signin.php");
                    } elseif ($_GET['a'] == 122) {
                        include("profil.php");
                    } elseif ($_GET['a'] == 123) {
                        include("vendor/logout.php");
                    } elseif ($_GET['a'] == 124) {
                        include("users.php");
                    } elseif ($_GET['a'] == 125) {
                        include("users_delete.php");
                    } elseif ($_GET['a'] == 126) {
                        include("users_delete.php");
                    } elseif ($_GET['a'] == 127) {
                        include("users_edit.php");
                    } elseif ($_GET['a'] == 128) {
                        include("users_edit.php");
                    } elseif ($_GET['a'] == 129) {
                        include("users_edit.php");
                    } elseif ($_GET['a'] == 130) {
                        include("categories_user_add.php");
                    }else{
						include("index_welcom.php");
					}


                    ?>

                </div>

            </div>
        </div>
        <div class="footer">

          <!--   <a href='https://cloud.mail.ru/public/36rS/4M9HJegAp/'>Наше облако</a> -->
            <div class="year">Yanina Matsakova<br> БГУИР гр.90421<br>2021 г.

            </div>
        </div>
    </div>
</body>

</html>