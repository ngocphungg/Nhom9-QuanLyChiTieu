
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý chi tiêu cá nhân - Đăng xuất</title>
  <style>
    body {
		background-image: url("images/hinh-anh-ve-cac-hanh-tinh-trong-he-mat-troi.jpg");
			background-repeat: no-repeat;
		  background-attachment: fixed;
		  background-size: 100% 100%;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
	 header{
			background:#7F9FD8;
			weight:1000px;
			height:200px;
			text-align:center;
			color:white;
		}
		#anh{
			width: 60px;
			height: 60px;
			float:left;
			margin-top: 5px;
			margin-left: 30px;
			text-align: center;
		}
		.logo{
			height:70px;
			font-size: 25px;
			text-align: center;
			
		}
		nav {
			margin:auto;
            background-color: #333;
            padding: 0em;
			
			float:right;
			width: 71%;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

		header ul{
			list-style-type: none;
            margin: 0;
            padding: 0;
			padding-bottom: 15px;
            overflow: hidden;
			
		}
        nav li{
            float: left;
			border-right: 2px solid #e8e8e8;
        }
		#money{
			float:left;
			width: 280px;
			height: 30px;
			margin-top: 17px;
			margin-left: 0;
			text-align: center;
			
		}
		#chu{
			float:right;
			text-align: center;
			width: 75%;
			margin-bottom: 20px;
			
		}
		nav li:hover{
			background:#648FDB; 
		}

        nav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .active {
            background-color:#648FDB;
        }


        h1 {
            text-align: center;
        }

		nav ul input{
			width:40%;
			margin-left:300px;
		    margin-top:12px;
			
			
			
			
		}
		nav ul input span button{
			float:right;
	  }

    
			main {
			  max-width: 800px;
			  margin: 20px auto;
			  padding: 20px;
			  border: 1px solid #ccc;
			  border-radius: 5px;
			}

			h2 {
			  margin-top: 0;
			}

			p {
			  margin-bottom: 20px;
			}

			button {
			  background-color: #333;
			  color: #fff;
			  border: none;
			  padding: 10px 20px;
			  cursor: pointer;
			}

		main button{

		  padding: 10px;
		  color: white;
		  font-size: 18px;
		  text-align: center;
		  border: 0;
		  outline: none;
		  display: inline-block;
		  width: 30%;
		  border-radius: 14px;
		  background-color:#648FDB;
		  font-family: "Poppins", sans-serif;
		  cursor: pointer;
		  font-weight: 600;
		  box-shadow: 0 5px 10px 0 rgba(130, 201, 30, 0.5);
		  margin-top: 25px;
		  margin-bottom: 25px;

			  }
  </style>
</head>
<body>
 	
	<header class="logo">
		<ul>
				<li>
				<img src="images/Money Manager (1).png" id="anh">
				<p id="money">MONEY MANAGER</p>
				</li>
				
			  <li id="chu">
				<marquee  direction="left" scrollamount="7"  >
				<p>QUẢN LÝ CHI TIÊU CÁ NHÂN</p>
				</marquee>
				</li>
		</ul>
	
	</header>
   

  <main>
    <h2>Đăng xuất</h2>
    <p>Bạn có chắc chắn muốn đăng xuất khỏi tài khoản?</p>
	  <button id="logoutButton">Đăng xuất</button>
<!--	  bấm đăng xuất sẽ trở về trang index -->
<script>
	document.getElementById("logoutButton").addEventListener("click", function() {
  window.location.href ="TrangChuLogOut.php";
});
	  </script>

														 
<!--	  bấm đăng xuất sẽ trở về trang index -->
  </main>
</body>
</html>