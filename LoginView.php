<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap"
      rel="stylesheet"
    />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>login</title>
<!--    <link rel="stylesheet" href="reset_login.css" />-->
    <link rel="stylesheet" href="style_login.css" />
  </head>

<body>
	<div class="login">
		<h1 class="login-heading">Log In</h1>
		
		<form action="LoginControl.php" class="login-form" autocomplete="off">

			<div class="group">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="namedn" placeholder="Username " id="name" autocomplete="off">
                
            </div>
       

			<div class="group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="passdn" placeholder="Password " id="password" autocomplete="off">
                <i class="fa-regular fa-eye"
                    onclick="changeTypePassword()"></i>
                <i class="fa-regular fa-eye-slash"
                onclick="changeTypePassword()"></i>
                <label for="password"></label>
            </div>
		<p class="quenmk"><a href="ChangePassView.php" class="quenmk-link">Quên mật khẩu ?</a> </p>
		<p class="quenmk">
        
        <a href="CreateAcc.php" class="quenmk-link">Bạn chưa có tài khoản? Create Account in here</a>
      </p>	
        <button class="login-submit">Log In </button>
      </form>
	</div>
	<script>
        function changeTypePassword(){
            document.getElementById('password').type = document.getElementById('password').type == 'text' ? 'password' : 'text';
        }
    </script>
	
</body>
</html>
