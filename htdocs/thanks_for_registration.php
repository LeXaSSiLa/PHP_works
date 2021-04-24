<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      
	  <!-- подключение к бд-->
<?php
    $mysqli = new mysqli('localhost:8889', 'root', 'root', 'cocial_club');
    if (mysqli_connect_errno()) {
        printf("Подключение к серверу MySQL невозможно. Код ошибки: %s<br>", mysqli_connect_error());
        exit;
    }
?>
    <?php

        $login = trim($_POST['login']);
        $passwrd = $_POST['password'];

        $result = $mysqli->query("SELECT COUNT(*) FROM `users` WHERE lower(`Login`) = lower('$login')");
        $row = $result->fetch_assoc();
        
        if(0 == $row['COUNT(*)']){
			if(strlen($login) > 0 AND strlen($passwrd) > 0 ){
				$result = $mysqli->query("INSERT INTO `users`(`Login`, `Password`) VALUES ('$login','$passwrd')");
			}
            
            
			
            setcookie('Login', $login, mktime(). time()+60*60*24*30);
            header("Location: http://localhost:8888/news.php");

        }
        else{
            header("Location: http://localhost:8888/registration.php");
        }
        
    ?>    
</body>
</html>




 
