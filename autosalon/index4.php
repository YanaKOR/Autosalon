<?php

/* function get_value($name)
{
  echo $_SESSION[$name];
}  */

echo '<h3> ' .  $_SESSION['user']['full_name'] . ',<br><br></h3><p>'.$check.'</p>' ;

?>


<?php
require_once 'vendor/connect.php';

foreach ($_POST as $y) {
  $_SESSION['buy' . $y] = $_POST['buy' . $y];
}

foreach (array_keys($_SESSION) as $x) {

  if ($x != "style" && $x != "language" && $x != "user") {

    $query = "SELECT * FROM goods where id_goods=" . $_SESSION[$x];
    if ($result = mysqli_query($link, $query)) {
      $row = mysqli_fetch_assoc($result);
      


      if (isset($_SESSION['language']) && $_SESSION['language'] == "english") {
        echo '
<br><div>' . $row["namegoods"] . '</div><br><div><img src="img/' . $row["image"] . '" width=280 height=200></div><div>' . $row["texteng"] . '</div><br>';
    }
    else{
        echo '
<br><div>' . $row["namegoods"] . '</div><br><div><img src="img/' . $row["image"] . '" width=280 height=200></div><div>' . $row["textrus"] . '</div><br>';
}
  }
}}



if (!isset($_POST[$x])) {
  echo '<h3>'.$no_orders.'</h3>'   ;
} else {
  echo '
<form name="forma1" action="index.php?&a=5" method="post">

  <p>Дополнительные услуги:</p>
  <input type="checkbox" name="add" value="add" checked>Дополнительное оборудование </input><br>
  <input type="checkbox" name="registration" value="registration"> Регистрация автомобиля </input><br>
  <input type="checkbox" name="garant" value="garant"> Расширенная гарантия </input><br>
  <input type="checkbox" name="trade-in" value="trade-in"> Trade-In </input>

  <br><br>


  <p>Пожалуйста, выберете способ оплаты :</p>

  <div>

    <input type="radio" id="buyChoice1" name="buy" value="cash">
    <label for="BuyChoice1">Наличные</label>

    <input type="radio" id="buyChoice2" name="buy" value="card" checked>
    <label for="BuyChoice2">Банковская карточка</label>
    <br>
  </div>

  <!-- <p>Please select your preferred contact method:</p> -->

  <p>Пожалуйста, выберете ваш предпочитаемый способ для связи:</p>
  <p><input type="email" name="email" value= ' . $_SESSION['user']['email'] . '  size="20" maxlength="50" required> <br></p>
  <input type="radio" id="contactChoice1" name="contact" value="email" checked>
  <label for="contactChoice1">Email</label>
  <p><input type="telno" name="tel" value=' . $_SESSION["user"]["tel"] . '   size="20" maxlength="50" required> <br></p>
  <input type="radio" id="contactChoice2" name="contact" value="phone">
  <label for="contactChoice2">Phone</label><br>

  <p><label>Комментарии</label></p>
  <textarea rows="5" cols="45" name="comments"> </textarea></p>
  <div>
    <input type="submit" name="done"></input>
  </div>
</form>';
}
?>




<p><a href='index.php?&a=2'><?php
                            echo  $back;
                            ?></a></p>