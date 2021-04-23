<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style3.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    --><title>Новостя</title>
</head>

<body >
    <?php
    
    $mysqli = new mysqli('localhost:8889', 'root', 'root', 'cocial_club');
    if (mysqli_connect_errno()) {
        printf("Подключение к серверу MySQL невозможно. Код ошибки: %s<br>", mysqli_connect_error());
        exit;
    }
?>
<!-- подключение бд -->
    
	
	<!-- проверяем есть ли пользователь в бд, если нет, то перекидываем на стр логина-->
    <?php
        $login = $_POST['login'];
        $passwrd = $_POST['password'];
 
        $result = $mysqli->query("SELECT COUNT(*) FROM `users` WHERE lower(`Login`) = lower('$login') and `Password` = '$passwrd' ");
        $row = $result->fetch_assoc();
        if(1 == $row['COUNT(*)']){
            setcookie('Login', $login, mktime(). time()+60*60*24*30);
        }
        else{
            if(!isset($_COOKIE['Login'])){
                header("Location: http://localhost:8888/login.php");
            }
        }
    ?>
<span class="nazvaznie"><p><h3>Поделитесь своими новостями</h3></p></span>

	<span class="quit"><?php echo($_COOKIE['Login']);?> <a href="logout.php" class="text-light">выйти</a></span>
		<div class="lenta">
	
          <form class="text-center mt-3" action="news.php" method="post">
    <!-- <input type="text"  id="" placeholder="Что у вас нового?">
    <input type="submit" value="Поделиться"> -->

    <div class="input-group mb-3">
        <input value=" " name="message" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Отправить</button>
        </div>
    </div>
</form>
<!-- вытаскиваюстя все сообщения из бд-->
        <?php
            $result = $mysqli->query("SELECT * FROM `messages` ORDER BY `message_id` DESC")
        ?>
		<!-- открываем цикл и на каждом цикле вытаскиваем по 1 кортежу из запроса-->
        <?php while( $row = $result->fetch_assoc()):?>
            
            <div class="mt-3 card">
    <div class="card-body">    
        <blockquote class="blockquote mb-0">
		<!-- вызываем часть кортежа с нужным атрибутом. чтобы вставить информацию о сообщении-->
            <p class="h2"><?php echo($row['message_text'])?></p>
            <footer class="blcokquote-footer text-muted"><?php echo($row['login'])?> <cite title="Source Title" > said at <?php echo($row['message_time'])?></cite></footer>
        </blockquote>
    </div>
</div>
<!-- конец цикла-->
        <?php endwhile; ?>        
    </div>
    
      <!-- отвечает за отправку сообщения сказать что подсказали-->
<?php
    $login = $_COOKIE['Login'];
    $message = trim ($_POST['message']);

    if(strlen($message) > 0){
        $result = $mysqli->query("INSERT INTO messages (Login, message_text, message_time) VALUES ('$login','$message',NOW())");  
    }
    unset($_POST);
    $message = "";
    if($_GET['message']=='sended')
    {

    }
    else{
        header("Location: http://localhost:8888/news.php?message=sended");
        exit();
    }
    
    
?>
</body>

</html>
