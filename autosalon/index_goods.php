 <?php
 /* function CheckBox($check)
{
  if (isset($_SESSION[$check])) {
    return 'checked';
  }
}; */ 
?> 

<h2><?php
    echo $index_goods;
    ?></h2>
<h3><?php echo $must ?></h3>

<form name=formsort method=post action='index.php?&a=2'>
  <?php echo $search_id ?>
  <label></label>
  <input type="radio" name="sort" value="id"><br>
  <?php echo $search_name ?>
  <label></label>
  <input type="radio" name="sort" value="name"><br><br>
  <input type="submit" value="Sort"><br><br>
</form>



<?php
require_once 'vendor/connect.php';


$query = "SELECT * FROM goods";


if (isset($_POST['sort']) && $_POST['sort'] == 'name') {
  $query = $query . ' order by namegoods';
}

if (isset($_POST['sort']) && $_POST['sort'] == 'id') {
  $query = $query . ' order by id_goods ';
}

if (isset($_POST['find']) && $_POST['find']) {
  $query = "SELECT * FROM goods where namegoods like '" . $_POST['find'] . "%'";
}




if ($result = mysqli_query($link, $query)) {
  printf("Select вернул %d строк.\n", mysqli_num_rows($result));


  if (isset($_SESSION['language']) && $_SESSION['language'] == "english") {
    echo ' 
  <form name="forma1" action="index.php?&a=4" method="post">
<table border = 1>
			<tr>
        <td>ID_goods</td>
        <td>ID_categories</td>
        <td>Namegoods</td>
        <td>image</td>
        <td>texteng</td>';

    if (isset($_SESSION['user'])) {
      echo ' 
        <td>to buy</td>';
    }
    echo '</tr>';


    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr><td>' . $row["id_goods"] . '</td><td>' . $row["id_categories"] . '</td><td>' . $row["namegoods"] . '</td><td><img src="img/' . $row["image"] . '" width=30 height=30></td><td>' . $row["texteng"] . '</td>';

      if (isset($_SESSION['user'])) {
        echo '
            <td> <input type=checkbox  name= buy' . $row["id_goods"] . '  value=' . $row["id_goods"] . '></td></tr>';
      }
      echo '</tr>';
    }
  }

  echo '
</table> ';

  if (isset($_SESSION['user']) && $_SESSION['language'] && $_SESSION['language'] == "english") {
    echo '<input type="submit" value="To buy now">';
  }

  echo '</form>';
}



if (isset($_SESSION['language']) && $_SESSION['language'] == "russian") {
  echo ' 
  <form name="forma1" action="index.php?&a=4" method="post">
<table border = 1>
			<tr>
        <td>ID_goods</td>
        <td>ID_categories</td>
        <td>Namegoods</td>
        <td>image</td>
        <td>textrus</td>';

  if (isset($_SESSION['user'])) {
    echo ' 
        <td>to buy</td>';
  }
  echo '</tr>';


  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr><td>' . $row["id_goods"] . '</td><td>' . $row["id_categories"] . '</td><td>' . $row["namegoods"] . '</td><td><img src="img/' . $row["image"] . '" width=30 height=30></td><td>' . $row["textrus"] . '</td>';
    if (isset($_SESSION['user'])) {
      echo '
            <td> <input type=checkbox  name=buy' . $row["id_goods"] . '  value=' . $row["id_goods"] . '></td></tr>';
    }
    echo '</tr>';
  }
}

echo '
</table> ';


if (isset($_SESSION['user']) && $_SESSION['language'] && $_SESSION['language'] == "russian") {
  echo '<input type="submit" value="Купить сейчас">';
}


echo '</form>';

mysqli_free_result($result);
mysqli_close($link);
?>

<?php

/* for ($i = 1; $i < 4; $i++) {
  $pnp = 'c' . $i;

  echo '
    <tr>
    <td><input ".CheckBox($pnp)."  type="checkbox" name=c' . $i . ' value=' . $i . ' Купить </input> </td>
    <td><img src=img/img' . $i . '.jpg ></td>
    <td>' . $info[$i] . '</td>
        </tr>';
} */

?>