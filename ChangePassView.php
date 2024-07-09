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
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>changepass</title>
<!--    <link rel="stylesheet" href="reset_login.css" />-->
    <link rel="stylesheet" href="style_login.css" />
<!--	lấy style css của form đăng nhập-->
  </head>

<body>
	<div class="login">
		<h1 class="login-heading">CHANGE PASS</h1>
		
		<form action="ChangePassControl.php" class="login-form" autocomplete="off">
        <div class="group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="newpass" placeholder="New Password " id="password" autocomplete="off">
                <i class="fa-regular fa-eye"
                    onclick="changeTypePassword()"></i>
                <i class="fa-regular fa-eye-slash"
                onclick="changeTypePassword()"></i>
                <label for="password"></label>
            </div>
		<div class="group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder=" Repeat new Password " id="againpassword" autocomplete="off">
                <i class="fa-regular fa-eye"
                    onclick="changeTypePassword()"></i>
                <i class="fa-regular fa-eye-slash"
                onclick="changeTypePassword()"></i>
                <label for="password"></label>
            </div>
		
        <button class="login-submit" id="change">Thay Đổi </button>
      </form>
	</div>
	<script>
        function changeTypePassword(){
            document.getElementById('password').type = document.getElementById('password').type == 'text' ? 'password' : 'text';
        }
	document.getElementById("change").addEventListener("click", function() {
  window.location.href ="ChangePassControl.php";
});
    </script>
</body>
</html>
