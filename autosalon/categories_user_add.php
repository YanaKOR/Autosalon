
                                
                                <?php
                                require_once 'vendor/connect.php';

                                $query =  'SELECT * FROM categories where id_categories >=4';
                                if ($result = mysqli_query($link, $query)) {
                                    mysqli_num_rows($result);
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        if (isset($_SESSION['language']) && $_SESSION['language'] == "english") {

                                            echo '<h2>' .$row["descriptioneng"].'</h2><br>';
                                        }

                                        if (isset($_SESSION['language']) && $_SESSION['language'] == "russian") {

                                            echo '<h2>' .$row["descriptionrus"].'</h2><br>' ;
                                        }
                                    }
                                }                     

/* Select запросы возвращают результирующий набор */

$query = "SELECT * FROM goods where id_categories >=4  ";


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
            <td> <input type=checkbox  name=buy' . $row["id_goods"] . '  value=' . $row["id_goods"] . '></td></tr>';
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

?>