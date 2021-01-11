<h1>Добавление товара</h1>

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
				<td>image</td>
              <td>namegoods</td>
			  <td>yeargoods</td>
			  <td>textrus</td>
			  <td>texteng</td>
               
			</tr>';
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<tr><td>' . $row["id_goods"] . '</td>  <td>' . $row["id_categories"] . '</td>  <td> <img src="img/' . $row["image"] . '"width=30 height=30></td>     <td>' . $row["namegoods"] . '</td><td>' . $row["yeargoods"] . '</td><td>' . $row["textrus"] . '</td><td>' . $row["texteng"] . '</td> </tr>';
	}
	echo '</table>';

	echo '</table>';
	mysqli_close($link);
?>

	<form name="add" action='index.php?&a=25' method=post enctype="multipart/form-data">
		<br>
		<label>Введите наименование:</label>
		<input type="text" name="new_goods" placeholder="Наименование" required><br><br>
		<label>Введите дату:</label>
		<input type="text" name="new_yeargoods" placeholder="Дата в формате: гггг.мм.дд" required><br><br>


		Выбирете категорию:
		<select name="id_categories" size="1">
			<option selected value="1"> Автомобили
			<option value="2">Мотоциклы
			<option value="3">Запчасти
			<?php
				if(isset($_SESSION['new_rus_cat']))
				{ echo'
			<option value="4">'.$_SESSION['new_rus_cat'];}
			?>
			
					</select>

		<br><br>
		<label>Добавьте фотографию товара</label><br><br>
		<input type=file name=uploadfile></br>

		<label>Добавьте описание на русском:</label>
		<textarea rows="3" cols="25" name="textrus" placeholder="Описание товара"></textarea></p>

		<label>Добавьте описание на английском:</label>
		<textarea rows="3" cols="25" name="texteng" placeholder="Description good"></textarea></p>

		<input type="submit" value="Добавить">
	</form>


<?php

	if ($_GET['a'] == 25) {
		copy($_FILES['uploadfile']['tmp_name'], "img/" . basename($_FILES['uploadfile']['name']));

		$link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);

		$query = 'insert into goods( namegoods,yeargoods, id_categories ,textrus, texteng,image) values("' . $_POST['new_goods'] . '","' . $_POST['new_yeargoods'] . '","' . $_POST['id_categories'] . '","' . $_POST['textrus'] . '","' . $_POST['texteng'] . '","' . $_FILES['uploadfile']['name'] . '")';
		echo $query;
		$result = mysqli_query($link, $query);
		mysqli_close($link);
		printf("Новый товар добавлен<br>");
	}
}
?>

<p><a href='index.php?&a=14'>вернуться на просмотр</a></p>