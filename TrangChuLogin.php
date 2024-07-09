<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="main.css"/>
	<title>Quản Lý Giao Dịch-Trang Chủ</title>
	
</head>

<body>
	<?php
	include("connectdb.php");
	?>
	<div id="header">
		<div>
				
				<img src="images/Money Manager (1).png" id="anh">
				<p id="money">MONEY MANAGER</p>
				
		</div>	
		
	    <div id="chu">
				<marquee  direction="left" scrollamount="7" hspace="10%"  >
				<p>QUẢN LÝ CHI TIÊU CÁ NHÂN</p>
				</marquee>
				</div>
		<div id="icon"><a href="LoginView.php">
				 <i class="fa-solid fa-right-from-bracket"></i></a></div>

		
	</div>
	
	<nav>
        <ul>
			
           <li class="active"><a class="dropdown"href="TrangChuLogin.php">Trang chủ</a></li>
			
			  <div class="dropdown">
				  <button class="dropbtn">Giao dịch</button>
				  <div class="dropdown-content">
					<a href="AddThuNhap.php">Thu-Income</a>

					<a href="AddChiTieu.php">Chi-Expense</a>
				  </div>
			</div>
          
			
			<div class="dropdown">
			  <button class="dropbtn">Thống kê</button>
			  <div class="dropdown-content">
				<a  href="ThongKeView.php">Thống kê Thu/Chi</a>
				<a href="ThongKeViView.php">Thống kê theo Ví</a> 
				<a href="Danhsachvi.php">Danh sách các ví</a>
			  </div>
		</div>
			
			
            <div class="dropdown">
			  <button class="dropbtn">Tài khoản</button>
			  <div class="dropdown-content">
				<a href="LoginView.php">Đăng nhập bằng tài khoản khác</a>
				<a href="LogOutView.php">Đăng xuất</a>
				<a href="ChangePassView.php">Thay đổi mật khẩu</a>
			  </div>
		</div>
        </ul>
		 
		
    </nav>
	<article id="dsgd">
	  <h1>Danh sách các giao dịch</h1>
		<table id="table_right_trangchu" border="1">
			<tr>
					<th width="15%"><i style='font-size:18px' class='far'>&#xf073;</i>Thời gian</th>
					<th width="15%"><i style='font-size:18px' class='far'>&#xf3d1;</i>Số tiền</th>
					<th width="15%"><i class="fas fa-layer-group"></i>Thể loại</th>
					<th width="20%"><i class="fas fa-wallet"></i>Kiểu ví</th>
					<th width="20%"><i class="fas fa-piggy-bank"></i>Kiểu giao dịch</th>
					<th width="25%"><i class="fas fa-book"></i>Ghi chú</th>
					<th width="10%">Tùy chọn</th>
			</tr>
			<tr>
				<?php		
	$sql = "SELECT giaodich.*,  list_accounts.name_acc,danhmuc.name, danhmuc.kieu
        FROM (giaodich
        INNER JOIN list_accounts ON giaodich.id_acc = list_accounts.id_acc)
        INNER JOIN danhmuc ON giaodich.id_type = danhmuc.id_type ORDER BY date";
	$result = $conn->query($sql);
	if ($result->num_rows > 0 ) {
        while ($row = $result->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $row["date"]?></td>
					<td><?php echo $row["amount"]?></td>
					<td><?php echo $row["name"]?></td>
					<td><?php echo $row["name_acc"]?></td>
					<td><?php echo $row["kieu"]?></td>
					<td><?php echo $row["note"]?></td>
					<td><a href="DelGiaoDich.php?id_gd=<?php echo $row["id_gd"]?>">Xóa</a></td>
			</tr>
			<?php
		}
	}
    else {
        echo "<p>No transactions found.</p>";
    }
			?>
			<tr>
				
			</tr>
		</table>
	</article>
	
	<section>
		<table id="table_left" border="0">
			<tr>
				<th width="160" height="150px">
					<i class="fa-solid fa-circle-user"></i>
				</th>			
				
				<th width="150"></th>
			</tr>
			<tr>
				<?php
				$sql = "SELECT SUM(amount) AS total_in FROM giaodich WHERE kieu='Thu'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				$total_in = $row["total_in"];
				?>
				<th id="sum_thu">Tổng số tiền đã thu</th>
				<th id="sum_thu"><?php echo $total_in; ?></th>
			</tr>
			<tr><th id="sum_chi">Tổng sổ tiền đã chi</th>
				<?php
				$sql = "SELECT SUM(amount) AS total_expense FROM giaodich WHERE kieu='Chi'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				$total_expenses = $row["total_expense"];
				?>
				<th id="sum_chi"><?php echo $total_expenses ; ?></th>
				<th id="sum_chi"></th>
			</tr>
			<tr>
				<th id="sum">Số tiền còn lại</th>
				<?php $remaining_balance = $total_in - $total_expenses; ?>
				<th id="sum"> <?php echo $remaining_balance ?> </th>
				<th id="sum"></th>
			</tr>
			
		</table>
	</section>
	 


</body>
</html>
