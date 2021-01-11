
                      <?php 
$link = mysqli_connect("localhost", "root", "root", "auto_moto_salon",3307);

if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
	}
	else {
	//printf("Соединение прошло успешно<br>");
	}
       ?> 