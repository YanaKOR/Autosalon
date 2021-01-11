

<p><a href='index.php?&a=125'>Удалить</a> </p>

<p><a href='index.php?&a=127'>Редактировать</a> </p>

<?php
require_once 'vendor/connect.php';
?>

<?php
$query =  'SELECT * FROM users';

if ($result = mysqli_query($link, $query)) {
    printf("Select вернул %d строк.\n", mysqli_num_rows($result));
    /* Вывод результата Select */
    echo '<table border = 1>
			<tr>
               
                <td>id_users</td>
              <td>full_name</td>
                <td>login</td>
                 <td>email</td>
                 <td>tel</td>
                  <td>password</td>
                   <td>avatar</td>
                   <td>urole</td>
						</tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr><td>' . $row["id_users"] . '</td><td>' . $row["full_name"] . '</td><td>' . $row["login"] . '</td><td>' . $row["email"] . '</td>  <td>' . $row["tel"] . '</td>   <td>' . $row["password"] . '</td><td><img src="img/' . $row["avatar"] . '" width=30 height=30></td><td>' . $row["urole"] . '</td> </tr>';
    }
    echo '</table>'

?>

<?php
    /* очищаем результирующий набор */
    mysqli_free_result($result);
}
mysqli_close($link);
?>