<?php
require_once 'vendor/connect.php';
?>

<?php

$query = 'SELECT * FROM goods';
if ($result = mysqli_query($link, $query)) {
    printf("Select вернул %d строк.\n", mysqli_num_rows($result));
    /* Вывод результата Select */
    echo ' 
     <form  action="index.php?&a=37" method="post">
     
	<table border = 1>
			<tr>
            <td>id_goods</td>
			<td>id_categories</td>
            <td>namegoods</td>
            <td>yeargoods</td>
            <td>image</td>
			<td>textrus</td>
            <td>texteng</td>
            <td>Edit</td>
            </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr><td>' . $row["id_goods"] . '</td><td>' . $row["id_categories"] . '</td><td>' . $row["namegoods"] . '</td> <td>' . $row["yeargoods"] . '</td><td><img src="img/' . $row["image"] . '"width=30 height=30> </td>   <td>' . $row["textrus"] . '</td><td>' . $row["texteng"] . '</td> <td><input name=edgoods type=radio  checked  value=' . $row["id_goods"] . '></td></tr>';
    }
    echo '</table><br>
    <input type="submit"  value="Редактировать"> 
    	</form><br>';

    /* очищаем результирующий набор */
    mysqli_free_result($result);
}
mysqli_close($link);
?>

<?php
if ($_GET['a'] == 37) {
    $link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);
    $query = 'SELECT * FROM goods where id_goods= ' . $_POST['edgoods'];
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
?>

    <form method=post action='index.php?&a=47' enctype='multipart/form-data'>

        <label for="fname">Измените название:</label>
        <input type="text" name="new_namegoods" value=<?php echo $row['namegoods']; ?>><br><br>
        <label for="year">Измените дату:</label>
        <input type="text" name="new_yeargoods" value=<?php echo $row['yeargoods']; ?>><br><br>
        <label>Измените категорию:</label>
        <select name="id_categories" size="1">
            <option selected value="1"> Автомобили
            <option value="2">Мотоциклы
            <option value="3">Запчасти
        </select>
        <br><br>
        <label>Измените фото товара</label>
        <input type=file name=uploadfile> </br><br>

        <label>Измените описание на русском:</label>
        <textarea rows="3" cols="25" name="new_textrus"> <?php echo $row['textrus']; ?>   </textarea></br>

        <label>Измените описание на английском:</label>
        <textarea rows="3" cols="25" name="new_texteng"> <?php echo $row['texteng']; ?> </textarea></p>

        <input type="hidden" name="id_goods" value=<?php echo $_POST['edgoods']; ?>>


        <input type="submit" name='Редактировать'>
    </form>

<?php
}
?>


<?php

if ($_GET['a'] == 47) {
    echo 'new_namegoods: ' . $_POST['new_namegoods'];
    echo 'new_yeargoods: ' . $_POST['new_yeargoods'];
    echo 'new_textrus:  ' . $_POST['new_textrus'];
    
    if ($_FILES['uploadfile']['name'] == true){copy($_FILES['uploadfile']['tmp_name'], "img/" . basename($_FILES['uploadfile']['name']));}
        else {
         echo'Файл не выбран' ; 
        }
         
    $link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);

    $query = 'update  goods SET   id_categories="' . $_POST['id_categories'] . '",namegoods ="' . $_POST['new_namegoods'] . '", yeargoods= "' . $_POST['new_yeargoods'] . '",textrus= "' . $_POST['new_textrus'] . '",texteng= "' . $_POST['new_texteng'] . '" where id_goods=' . $_POST['id_goods'];

    $result = mysqli_query($link, $query);

    if($_FILES['uploadfile']['name'] == true){
    $query = 'update  goods SET image="' . $_FILES['uploadfile']['name'] .
        '" where id_goods=' . $_POST['id_goods'];
        
     $result = mysqli_query($link, $query);}
    mysqli_close($link);
}

?>
<p><a href='index.php?&a=14'>вернуться на просмотр</a></p>