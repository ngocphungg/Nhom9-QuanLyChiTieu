
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
    <title>createacc</title>
<!--    <link rel="stylesheet" href="reset_login.css" />-->
    <link rel="stylesheet" href="style_create_acc.css" />
  </head>
  <body>
    <div class="createacc">
      <h1 class="createacc-heading">Create Account</h1>
      
      
      <form action="AccSave.php" class="createacc-form" autocomplete="off">
        <div class="group">
                <i class="fa-regular fa-user"></i>
                 <input type="text" name="txt_name" id="name"  placeholder="Username">           
            </div>
       <div class="group">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" placeholder="Email " name="txt_email" id="email" autocomplete="off">
            </div>
		<div class="group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password " name="passw" id="pass" autocomplete="off">
                <i class="fa-regular fa-eye"
                    onclick="changeTypePassword()"></i>
                <i class="fa-regular fa-eye-slash"
                onclick="changeTypePassword()"></i>
                <label for="password"></label>
            </div>
        <button class="createacc-submit" name="insert">Create Account</button>
      </form>
      <p class="createacc-already">
        <span>Bạn đã có tài khoản ?</span>
        <a href="LoginView.php" class="createacc-login-link">Login</a>
      </p>
		
		
    </div>
	  <script>
        function changeTypePassword(){
            document.getElementById('password').type = document.getElementById('password').type == 'text' ? 'password' : 'text';
        }
    </script>
  </body>

</html>
