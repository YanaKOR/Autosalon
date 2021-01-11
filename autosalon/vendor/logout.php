<?php

unset($_SESSION['user']);

//header('Location:index.php?&a=19'); заменила следующей строкой
exit("<meta http-equiv='refresh' content='0; url= /index.php?&a=19'>");

session_destroy();
?>