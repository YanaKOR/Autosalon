<!-- <pre>
<?php
/* print_r($_POST);
print_r($_FILES); */
?>
</pre>

 -->

<?php
        require_once 'vendor/connect.php';

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $tel=$_POST['tel'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    

    if ($password === $password_confirm) {
   
    copy($_FILES['avatar']['tmp_name'], "img/" . basename($_FILES['avatar']['name']));

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /*  $password = md5($password);
     $password_confirm= md5($password_confirm);
      */
    $query =
        'insert into users( full_name,login ,email,tel,password,avatar) values("' . $_POST['full_name'] . '","' . $_POST['login'] . '","' . $_POST['email'] . '","' . $_POST['tel'] . '", "' . $_POST['password'] . '","' . $_FILES['avatar']['name'] . '")';
    // echo $query;
    
    $result = mysqli_query($link, $query);

    mysqli_close($link);



    $_SESSION['massage'] = 'Регистрация прошла успешно';
    //header('Location:index.php?&a=19');
	exit("<meta http-equiv='refresh' content='0; url= /index.php?&a=19'>");

}
    
     else {
        $_SESSION['massage']='Пароли не совпадают';
        //header('Location:index.php?&a=18');
		exit("<meta http-equiv='refresh' content='0; url= /index.php?&a=18'>");
         }

?>
