<h2>Удаление товара</h2>

<?php

$link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);
/* проверка соединения */
if (mysqli_connect_errno()) {
	printf("Не удалось подключиться: %s\n", mysqli_connect_error());
	exit();
} else {
	printf("Соединение прошло успешно<br>");
}
?>
<?php
$query =  'SELECT * FROM goods';

if ($result = mysqli_query($link, $query)) {
	printf("Select вернул %d строк.\n", mysqli_num_rows($result));

	/* Вывод результата Select */
	echo '
        <form name="delete" action="index.php?&a=26" method="post">
        <br>
        <table border = 1>
			<tr>
               
				<td>id_goods</td>
				<td>id_categories</td>
              <td>namegoods</td>
                <td>yeargoods</td>
                <td>DELETE</td>
                </tr>';

	while ($row = mysqli_fetch_assoc($result)) {
		echo '<tr><td>' . $row["id_goods"] . '</td> <td>' . $row["id_categories"] . '</td>  <td>' . $row["namegoods"] . '</td><td>' . $row["yeargoods"] . '</td><td><input name=del' . $row["id_goods"] . ' type=checkbox value=' . $row["id_goods"] . '></td></tr>';
	}
	echo '</table> <br>
<input type="submit" value="Удалить"> 
</form>';
?>

	<?php 
	if ($_GET['a'] == 26)
	require_once 'vendor/connect.php';
	


	foreach($_POST as $x){
	$query='delete from goods where id_goods='.$x;
	echo $query.'<br>';
	$result = mysqli_query($link, $query);
	}

	mysqli_close($link);

	}
	?>

	<p><a href='index.php?&a=14'>вернуться на просмотр</a></p>

