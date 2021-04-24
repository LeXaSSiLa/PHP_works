<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style0.css">
    <title>Вход</title>
</head>

<body class="text-center">
    <?
        if(isset($_COOKIE['Login'])){
            header("Location: http://localhost:8888/news.php");
        }
    ?>
    <main class="form-signin"> 
        <form action="news.php" method="post">
			<fieldset>
			<legend>Вход в учётную запись</legend>
                <input name="login" type="text" class="form-control" id="floatingInput" placeholder="Логин">
				<input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Пароль">
                <input type="submit" name="but" value="Войти">
			</fieldset>
			
			<fieldset>
			<legend>Не можете войти?</legend>
			<p><h3>У вас ещё нет аккаунта?
            
			
            <a href="registration.php"><input type="button" name="but1" value= "Зарегистрироваться" ></a></h3></p>
			<a href="#.php"><h2>Забыли пароль? </h2></a>
			</fieldset>
        </form>
    </main>
</body>

</html>
