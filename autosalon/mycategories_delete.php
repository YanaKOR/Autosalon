
<h2>Удаление категории</h2>

<?php
require_once 'vendor/connect.php';
?>
<?php
$query =  'SELECT * FROM categories' ;

if ($result = mysqli_query($link, $query)) {
		//printf("Select вернул %d строк.\n",
		 mysqli_num_rows($result);
        
		/* Вывод результата Select */
        echo '
        <form name="delete" action="index.php?&a=22" method="post">
        <br>
        <table border = 1>
			<tr>
               
                <td>id</td>
              <td>descriptionrus</td>
                <td>descriptioneng</td>
                <td>DELETE</td>
                </tr>';
            
		while ($row = mysqli_fetch_assoc($result)) { 
		echo '<tr><td>'.$row["id_categories"].'</td><td>'.$row["descriptionrus"].'</td><td>'.$row["descriptioneng"].'</td><td><input name=del'.$row["id_categories"].' type=checkbox value='.$row["id_categories"].'></td></tr>';
	}
        echo '</table> <br>
<input type="submit" value="Удалить"> 
</form>';
mysqli_close($link);
   ?>

<?php

if($_GET['a']==22){
	//echo 'вот сейчас начнем удалять <br>';
	$link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);
	/* if (mysqli_connect_errno()) {
		printf("Не удалось подключиться: %s\n", mysqli_connect_error());
		exit();
		}
		else {
			printf("Соединение успешно<br>");
		}
	 */
	
	foreach($_POST as $x){
		$query='delete from categories where id_categories='.$x;
		//echo $query.'<br>';
		$result = mysqli_query($link, $query);
	} 
	
	mysqli_close($link);

}
?>

<p><a href ='index.php?&a=10'>вернуться на просмотр</a></p>

<?php
      
}
?>