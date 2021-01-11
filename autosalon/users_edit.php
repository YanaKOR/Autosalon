<?php
require_once 'vendor/connect.php';
?>

<?php

$query = 'SELECT * FROM users';
if ($result = mysqli_query($link, $query)) {
    printf("Select вернул %d строк.\n", mysqli_num_rows($result));
    /* Вывод результата Select */

    echo '
    <form name="delete" action="index.php?&a=128" method="post">
    <table border = 1>
			<tr>
               
                <td>id_users</td>
              <td>full_name</td>
                <td>login</td>
                 <td>email</td>
                 <td>tel</td>
                  <td>password</td>
                   <td>avatar</td>
                   <td>urole</td>
                   <td>EDIT</td>
                        </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr><td>' . $row["id_users"] . '</td><td>' . $row["full_name"] . '</td><td>' . $row["login"] . '</td><td>' . $row["email"] . '</td><td>' . $row['tel'] . '</td>   <td>' . $row["password"] . '</td><td><img src="img/' . $row["avatar"] . '" width=30 height=30></td><td>' . $row["urole"] . '</td><td><input name=edusers type=radio  checked  value=' . $row["id_users"] . '></td> </tr>';
    }
    echo '</table><br>
<input type="submit" value="Редактировать"> 
</form><br><br>';

    /* очищаем результирующий набор */
    mysqli_free_result($result);
}
mysqli_close($link);
?>

<?php
if ($_GET['a'] == 128) {
    $link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);
    $query = 'SELECT * FROM users where id_users= ' . $_POST['edusers'];
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
?>

    <form method=post action='index.php?&a=129' enctype='multipart/form-data'>

        <label for="fname">Измените имя:</label>
        <input type="text" name="new_full_name" value=<?php echo $row['full_name']; ?>><br><br>
        <label for="year">Измените логин:</label>
        <input type="text" name="new_login" value=<?php echo $row['login']; ?>><br><br>
        <label for="year">Измените email:</label>
        <input type="text" name="new_email" value=<?php echo $row['email']; ?>><br><br>
        <label for="tel"> Измените номер телефонa:</label>
        <input type="telNo" name="new_tel" value=<?php echo $row['tel']; ?> size="20" maxlength="50" pattern="[\+][0-9]{3}-[0-9]{2}-[0-9]{7}"><small>Формат +375-29-1234567</small><br><br>
        <label for="year">Измените пароль:</label>
        <input type="text" name="new_password" value=<?php echo $row['password']; ?>><br><br>
        <label>Измените роль:</label>
        <select name="urole" size="1">
            <option selected value="user">user
            <option value="admin">admin
        </select>
        <br><br>
        <label>Измените аватар</label>
        <input type=file name=avatar></br>

        <input type="hidden" name="id_users" value=<?php echo $_POST['edusers']; ?>>


        <br> <input type="submit" name='Редактировать'>
    </form>

<?php
}
?>




<?php

if ($_GET['a'] == 129) {
    echo 'new_login: ' . $_POST['new_login'];
    echo 'new_email: ' . $_POST['new_email'];
    echo 'new_password: ' . $_POST['new_password'];
    echo ' new_passwoord:' . $_POST['new_tel'];


    if ($_FILES['avatar']['tmp_name'] == true) {
        copy($_FILES['avatar']['tmp_name'], "img/" . basename($_FILES['avatar']['name']));
    } else {
        echo 'Файл не выбран';
    }


    $link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);

    $query = 'update users SET urole="' . $_POST['urole'] . '",full_name ="' . $_POST['new_full_name'] . '", login= "' . $_POST['new_login'] . '",email= "' . $_POST['new_email'] . '",tel="' . $_POST['new_tel'] . '", password= "' . $_POST['new_password'] . '" where id_users=' . $_POST['id_users'];

    $result = mysqli_query($link, $query);

    if ($_FILES['avatar']['name'] == true) {
        $query = 'update users SET avatar="' . $_FILES['avatar']['name'] . '" where id_users=' . $_POST['id_users'];
    }
    $result = mysqli_query($link, $query);

    mysqli_close($link);
}

?>


<p><a href='index.php?&a=124'>вернуться на просмотр</a></p>



