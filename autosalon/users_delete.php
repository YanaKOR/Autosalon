<h2>Удаление пользователя</h2>

<?php
require_once 'vendor/connect.php';
?>

<?php
$query =  'SELECT * FROM users';

if ($result = mysqli_query($link, $query)) {
    printf("Select вернул %d строк.\n", mysqli_num_rows($result));
    /* Вывод результата Select */

    echo '
    <form name="delete" action="index.php?&a=126" method="post">
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
                   <td>DELETE</td>
						</tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr><td>' . $row["id_users"] . '</td><td>' . $row["full_name"] . '</td><td>' . $row["login"] . '</td><td>' . $row["email"] . '</td>   <td>'.$row ["tel"].'</td>  <td>' . $row["password"] . '</td><td><img src="img/' . $row["avatar"] . '" width=30 height=30></td><td>' . $row["urole"] . '</td><td><input name=del' . $row["id_users"] . ' type=checkbox value=' . $row["id_users"] . '></td> </tr>';
    }
    echo '</table><br>
<input type="submit" value="Удалить"> 
</form>';

?>

<?php
    if ($_GET['a'] == 126)
        require_once 'vendor/connect.php';

    foreach ($_POST as $x) {
        $query = 'delete from users where id_users=' . $x;
        echo $query . '<br>';

        $result = mysqli_query($link, $query);
    }

    mysqli_close($link);
}
?>


<p><a href='index.php?&a=124'>вернуться на просмотр</a></p>



