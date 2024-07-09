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
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="main.css"/>
	<title>Quản Lý Giao Dịch-Thống Kê</title>
	
</head>

<body>
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
           <li><a class="dropdown"href="TrangChuLogin.php">Trang chủ</a></li>
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
				<a class="active" href="ThongKeView.php">Thống kê Thu/Chi</a>
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
	<article>
	  <h1>THỐNG KÊ THEO THỂ LOẠI </h1>
		<div>
		<h3><p id="tkct"><a href="ThongKeChi.php">Thống kê Chi tiêu</a></p>
			<p id="tktn"><a href="ThongKeView.php"  >Thống kê Thu Nhập</a></p></h3>
		</div>
		

    <?php
    // Kết nối cơ sở dữ liệu
    $conn=mysqli_connect("localhost","root","") or die("disconnect");
	mysqli_select_db($conn,"qlchitieu")or die("not found");
    
    
    // Tính toán thống kê theo danh mục
	$sqlchi = "SELECT danhmuc.id_type, danhmuc.name, SUM( amount) AS sumchi FROM giaodich JOIN danhmuc ON giaodich.id_type = danhmuc.id_type WHERE giaodich.kieu='Chi' GROUP BY danhmuc.id_type, danhmuc.name";
    $result1 = $conn->query($sqlchi);

    if ($result1->num_rows > 0) {
        
        echo "<table>";
        echo "<tr><th>Thể loại</th><th>Tổng cộng</th></tr>";
		$categories1 = [];
        $totals1 = [];
        while ($row1 = $result1->fetch_assoc()) {
            array_push($categories1, $row1["name"]);
            array_push($totals1, $row1["sumchi"]);
            echo "<tr><td>".$row1["name"]."</td><td>".$row1["sumchi"]."</td></tr>";
        }
        echo "</table>";
        
        // Tạo biểu đồ
        echo "<canvas id='chart'></canvas>";
        echo "<script>";
        echo "var ctx = document.getElementById('chart').getContext('2d');";
        echo "var chart = new Chart(ctx, {";
        echo "    type: 'bar',";
        echo "    data: {";
        echo "        labels: " . json_encode($categories1) . ",";
        echo "        datasets: [{";
        echo "            label: 'Tổng chi',";
        echo "            data: " . json_encode($totals1) . ",";
		echo "            backgroundColor: 'rgba(211, 114, 135, 0.9)',";
        echo "            borderColor: 'rgba(211, 114, 135, 0.9)',";
        echo "            borderWidth: 1";
        echo "        }]";
        echo "    },";
        echo "    options: {";
        echo "        scales: {";
        echo "            y: {";
        echo "                beginAtZero: true";
        echo "            }";
        echo "        }";
        echo "    }";
        echo "});";
        echo "</script>";
    } else {
        echo "<p>No category totals found.</p>";
    }
		?>
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