<h2>Редактирование категории</h2>

<?php
require_once 'vendor/connect.php';
?>

<?php

$query = 'SELECT * FROM categories';
if ($result = mysqli_query($link, $query)) {
	 mysqli_num_rows($result);
	

	echo ' <form name="formed" action="index.php?&a=33" method="post">
     
	<table border = 1>
			<tr>
				<td>ID</td>
				<td>Descriptionrus</td>
				<td>Descriptioneng</td>
				<td>Edit</td>
			</tr>';
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<tr><td>' . $row["id_categories"] . '</td><td>' . $row["descriptionrus"] . '</td><td>' . $row["descriptioneng"] . '</td><td><input name=edcategories type=radio checked value=' . $row["id_categories"] . '></td></tr>';
	}
	echo '</table>
    <input type="submit"  value="Редактировать"> 
    	</form><br>';

	/* очищаем результирующий набор */
	mysqli_free_result($result);
}
mysqli_close($link);
?>

<?php
if ($_GET['a'] == 33) {
	$link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);
	$query = 'SELECT * FROM categories where id_categories= ' . $_POST['edcategories'];
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
?>


	<form method=post action='index.php?&a=43'>

		<label for="fname">Введите название на русском:</label>
		<input type="text" name="new_name_rus" value=<?php echo $row['descriptionrus']; ?>><br>
		<label for="fname">Введите название на английском:</label>
		<input type="text" name="new_name_eng" value=<?php echo $row['descriptioneng']; ?>>

		<input type="hidden" name="id_categories" value=<?php echo $_POST['edcategories']; ?>>


		<input type="submit" name='Редактировать'>
	</form>

<?php
}
?>

<?php

if ($_GET['a'] == 43) {
	echo 'new_name: ' . $_POST['new_name_rus'];
	echo 'new_name: ' . $_POST['new_name_eng'];

	$link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);
	$query = 'SELECT*FROM categories where descriptionrus="' . $_POST['new_name_rus'] . '"';
	$result = mysqli_query($link, $query);
	if (mysqli_num_rows($result) > 0) {
		echo ' такое имя категории не допустимо';
		mysqli_close($link);
	} else {


		echo ' такое имя категории допустимо';
		mysqli_free_result($result);
		$query = 'update  categories SET descriptioneng="' . $_POST['new_name_eng'] . '", descriptionrus= "' . $_POST['new_name_rus'] . '" where id_categories=' . $_POST['id_categories'];
		echo $query;
		mysqli_query($link, $query);
		mysqli_close($link);
	}
}

?>
<p><a href='index.php?&a=10'>вернуться на просмотр</a></p>