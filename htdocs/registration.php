<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
  <title>Регистрация</title>
</head>

<body class="text-center">
    <main class="form-signin"> 
        <form action="thanks_for_registration.php" method="POST">
            <fieldset>
                <legend>Регистрация</legend>
            
                <input name="login" type="text" class="form-control" id="floatingInput" placeholder="Придумайте логин">
                
            
                <input name="password" type="password" class="form-control" id="floatingSecPassword" placeholder="Пароль">
                
            
			<input type="submit" name="but" value= "Зарегестрироваться">
			<a href="login.php"><h2>Вернуться на страницу входа </h2></a>
		</fieldset>

        </form>
    </main>
</body>

</html>