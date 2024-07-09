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
	<link rel="stylesheet" href="main.css"/>
	<title>Quản Lý Giao Dịch-Expense</title>
	
</head>

<body>
		<?php
	
	$conn=mysqli_connect("localhost","root","") or die("disconnect");
	mysqli_select_db($conn,"qlchitieu")or die("not found");
	$sql_select_type="Select * from `danhmuc` where danhmuc.kieu='Chi'";
	$result_se_type=mysqli_query($conn,$sql_select_type);
	$tong_bg=mysqli_num_rows($result_se_type);// đếm số bản ghi
	$stt_type=0;
	while($row=mysqli_fetch_object($result_se_type))
	{
		$stt_type++;
		$id_type_inc[$stt_type]=$row->id_type;
		$name_inc[$stt_type]=$row->name;
	};
		$sql_select_acc="Select * from `list_accounts`";
	$result_se_acc=mysqli_query($conn,$sql_select_acc);
	$tong_acc=mysqli_num_rows($result_se_acc);// đếm số bản ghi
	$stt_acc=0;
	while($row1=mysqli_fetch_object($result_se_acc))
	{
		$stt_acc++;
		$id_acc[$stt_acc]=$row1->id_acc;
		$name_acc[$stt_acc]=$row1->name_acc;
	};
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
	
	<nav>
        <ul>
           <li><a class="dropdown"href="TrangChuLogin.php">Trang chủ</a></li>
			  <div class="dropdown">
				  <button class="dropbtn">Giao dịch</button>
				  <div class="dropdown-content">
					<a href="AddThuNhap.php">Thu-Income</a>

					<a class="active" href="AddChiTieu.php">Chi-Expense</a>
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
<article id="article">
		<div class="transaction-form">       		
        <form id="addTransactionForm" action="SaveGDChi.php" method="post" enctype="multipart/form-data">
			<h3>CHI TIÊU</h3>
            <h4>Thời gian</h4>
			<input type="date" name="Date" id="transactionDate"  required>
			
			<h4>Số tiền</h4>
            <input type="number" name="Amount" id="amount"  placeholder="Nhập số tiền" required>
             <h4>Kiểu ví</h4>
			<select  id="kieuvi" name="kieuvi">
				<option selected="selected">Chọn kiểu ví</option>
				<?php for ($i = 1; $i <= $tong_acc; $i++) : ?> 
    			<option value="<?php echo $i; ?>"><?php echo $name_acc[$i]; ?></option>
				<?php endfor; ?>
				
			</select>
			<h4>Thể loại</h4>
			<select id="loai" name="loai">
				<option selected="selected">Chọn thể loại</option>
				<?php for ($i = 1; $i <= $tong_bg; $i++) : ?> 
    			<option value="<?php echo $id_type_inc[$i]; ?>"><?php echo $name_inc[$i]; ?></option>
				<?php endfor; ?>
				
			</select>
			
			
		<h4>Ghi chú</h4>
			<input type="text" id="transactionAmount" name="note" placeholder="Nhập ghi chú" required>
			<input type="submit" value="Them">
					</form>
				</div>
		
		
	</article>
	
	
		<form action="SaveVi.php" id="Add1" method="post" enctype="multipart/form-data">
			<h4 id="them">Thêm ví</h4>
			<input type="text" name="addvi" id="add" placeholder="Tạo thêm ví">
			<input type="number" name="money" id="add" placeholder="So Tien trong vi">
			<input type="submit" class="A" value="Them">
			</form>
	
		<form action="SaveDanhMucChi.php" id="Add2">
			<h4 id="them">Thêm thể loại</h4>
			<input type="text" name="addloai" id="add" placeholder="Tạo thêm thể loại">
			<input type="submit" class="A" value="Them">
		</form>
	
		
</body>
</html>