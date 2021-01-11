<?php
/*соединение*/
require_once 'connect.php';

$login = $_POST['login'];
$password =($_POST['password']);

$check_user = mysqli_query($link, "SELECT * FROM users WHERE login = '$login' AND password = '$password' ");
    
//echo mysqli_num_rows($check_user);

 if (mysqli_num_rows($check_user) > 0) 
{
    //вывод $check_user  из бд
    $user = mysqli_fetch_assoc($check_user);

      $_SESSION['user'] = [
        "id_users" => $user['id_users'],
        "full_name" => $user['full_name'],
        "avatar" => $user['avatar'],
        "email" => $user['email'],
        "tel"=>$user['tel'],
        "urole" => $user['urole'],
          
    ]; 
//122-profil.php
exit("<meta http-equiv='refresh' content='0; url= /index.php?&a=122'>");
   // header('Location:index.php?&a=122'); 
    
}
  else {
    $_SESSION['massage'] = ' Не верный логин или пароль';
    //header('Location:index.php?&a=19');
	exit("<meta http-equiv='refresh' content='0; url= /index.php?&a=19'>");
 }
mysqli_close($link);
?>

<!-- 
<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>

</pre>
  -->