<p><a href='index.php?&a=15'>Добавить</a></p>

<p><a href='index.php?&a=16'>Удалить</a> </p>

<p><a href='index.php?&a=17'>Редактировать</a> </p>

<?php
require_once 'vendor/connect.php';
?>


<?php
echo '<br>';
$query =  'SELECT * FROM goods';

if ($result = mysqli_query($link, $query)) {
	printf("Select вернул %d строк.\n", mysqli_num_rows($result));
	/* Вывод результата Select */
	echo '<table border = 1>
			<tr>
               
				<td>id_goods</td>
				<td>id_categories</td>
				
              <td>namegoods</td>
			  <td>yeargoods</td>
			  <td>image</td>
			  <td>textrus</td>
			  <td>texteng</td>
               
			</tr>';
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<tr><td>' . $row["id_goods"] . '</td>  <td>' . $row["id_categories"] . '</td>      <td>' . $row["namegoods"] . '</td><td>' . $row["yeargoods"] . '</td>  <td> <img src="img/' . $row["image"] . '"width=30 height=30></td>  <td>' . $row["textrus"] . '</td><td>' . $row["texteng"] . '</td> </tr>';
	}
	echo '</table>';

?>

<?php
	/* очищаем результирующий набор */
	mysqli_free_result($result);
}
mysqli_close($link);
?>