<h1>Добавление категории</h1>


<?php
require_once 'vendor/connect.php';
?>


<?php
echo '<br>';
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
	echo '</table>';
	mysqli_close($link);
?>


	<form name="add" action='index.php?&a=21' method=post>
		<br>
		<label>Введите наименование на русском:</label>
		<input type="text" name="new_rus_cat"  required  placeholder=" на русском"><br><br>
		<label>Введите наименование на английском:</label>
		<input type="text" name="new_eng_cat"  placeholder=" на английском" required><br><br>
		<input type="submit" value="Добавить">
	</form>

	<?php


	if ($_GET['a'] == 21) {
		$link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);
		/* проверка соединения */

		/* if (mysqli_connect_errno()) {
			printf("Не удалось подключиться: %s\n", mysqli_connect_error());
			exit();
		} else {
			printf("Соединение прошло успешно<br>");
		} */


		$query = 'select * from categories where  descriptionrus="' . $_POST['new_rus_cat'] . '" and  descriptioneng="' . $_POST['new_eng_cat'] . '"';


		if ($result = mysqli_query($link, $query)) {
			printf("Select вернул %d строк.\n", mysqli_num_rows($result));
		}

		if (mysqli_num_rows($result) > 0) {
			echo 'такая категория существует';

			/* очищаем результирующий набор */
			mysqli_free_result($result);
			mysqli_close($link);
		} else {


			$query = 'INSERT INTO categories (descriptionrus, descriptioneng ) VALUEs ("' . $_POST['new_rus_cat'] . '","' . $_POST['new_eng_cat'] . '")';
			if ($result = mysqli_query($link, $query)) {
				printf("новая категория добавлена<br>");
			}

			mysqli_close($link);
		}
	}
	?>


	<p><a href='index.php?&a=10'>вернуться на просмотр</a></p>

<?php

}

?>