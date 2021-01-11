<p><a href='index.php?&a=11'>Добавить</a></p>

<p><a href='index.php?&a=12'>Удалить</a> </p>

<p><a href='index.php?&a=13'>Редактировать</a> </p>

<?php
require_once 'vendor/connect.php';
?>

<?php
$query =  'SELECT * FROM categories';

if ($result = mysqli_query($link, $query)) {
	printf("Select вернул %d строк.\n", mysqli_num_rows($result));
	/* Вывод результата Select */
	echo '<table border = 1>
			<tr>
               
                <td>id</td>
              <td>descriptionrus</td>
				<td>descriptioneng</td>
				
				
			</tr>';
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<tr><td>' . $row["id_categories"] . '</td><td>' . $row["descriptionrus"] . '</td><td>' . $row["descriptioneng"] . '</td> </tr>';
	}
	echo '</table>'

?>

<?php
	/* очищаем результирующий набор */
	mysqli_free_result($result);
}
mysqli_close($link);
?>