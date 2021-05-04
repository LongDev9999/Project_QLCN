<?php 

session_start();
if (isset($_SESSION['username'])&&isset($_SESSION['password'])) 
	{
		//Neu da Đăng nhập-->SET QUYEN
		if ($_SESSION['quyen']==1) 
		{
			/*ADMIN
			echo "Xin chao Admin ! <br>";
			echo "<a href='../index.php?controller=congnhan&action=list'>Xem Danh sach Cong nhan</a>";
			echo "<br><a href='../view/logout.php'>Logout</a>";
      */
		
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Trang Admin</title>
  <link rel="stylesheet" href="gdadmin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   
</head>
<body>
      
  <body>

<aside class="side-nav" id="show-side-navigation1">
  <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
  <div class="heading">
    <img src="" alt="">
   
  </div>
  <ul class="categories">
    <li><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="#"> Trang chủ</a>
      
    </li>
    <li><i class="fa fa-user fa-fw"></i><a href="http://localhost/hocphp/Baocao/QLCN/index.php?controller=congnhan&action=list"> Quản Lý Công Nhân</a>
      
    </li>

    <li>
      <i class="fa fa-building"></i>

      <a href="http://localhost/hocphp/Baocao/QLCN/index.php?controller=xuongsx&action=QLxuong">Quản Lý Xưởng SX</a>
    </li>


    <li>
      <i class="fa fa-money fa-fw"></i>
      <a href="http://localhost/hocphp/Baocao/QLCN/index.php?controller=congnhan&action=quanlyluong">Chấm công&Lương CN</a>
    </li>

    <li><i class="fa fa-bell"></i><a href="#"> Thông báo <span class="num dang">56</span></a></li>
    <li><i class="fa fa-wrench fa-fw"></i><a href="#"> Cài Đặt <span class="num prim">6</span></a>
      <ul class="side-nav-dropdown">
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">ipsum dolor</a></li>
        <li><a href="#">dolor ipsum</a></li>
        <li><a href="#">amet consectetur</a></li>
        <li><a href="#">ipsum dolor sit</a></li>
      </ul>
    </li>
    <li><i class="fa fa-envelope-o fw"></i><a href="#"> Tin Nhắn <span class="num succ">43</span></a></li>
    <li>
     <i class="fa fa-sign-out"></i>
      <a href="../logout.php">Đăng Xuất</a>
    </li>
    
  </ul>
</aside>
<section id="contents">
 
  <div class="welcome">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h2>Chào mừng bạn đến với trang quản trị Công nhân C.Ty SamSung Electronics Thái Nguyên </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="statistics">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="box">
            <i class="fa fa-envelope fa-fw bg-primary"></i>
            <div class="info">
              <h3>979</h3> <span>Emails</span>
              <p>Gửi đơn đặt hàng / 1 tháng</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <i class="fa fa-mobile" style="font-size: 75px;color: red;"></i>
            <div class="info">
              <h3>~8900</h3> <span>Smartphone</span>
              <p> Sản Xuất /1 tuần </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <i class="fa fa-users fa-fw success"></i>
            <div class="info">
              <h3>1200</h3> <span>Công Nhân</span>
              <p>Tăng ca đạt 99% chỉ tiêu</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <section class='statis text-center'>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="box bg-primary">
              <i class="fa fa-eye"></i>
              <h3>5,154</h3>
              <p class="lead">Lượt khách ghé thăm /tháng</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box danger">
              <i class="fa fa-user-o"></i>
              <h3>345</h3>
              <p class="lead">Công nhân được hưởng trợ cấp</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box warning">
              <i class="fa fa-shopping-cart"></i>
              <h3>4378</h3>
              <p class="lead">Sản phẩm đã bán/Tổng Sản phẩm</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box success">
              <i class="fa fa-handshake-o"></i>
              <h3>9.000.000 VND</h3>
              <p class="lead">Tổng thu nhập / 1 công nhân</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  <section class="admins">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <h3>Danh Sách Đối Tác đã Ký hợp đồng</h3>
            <div class="admin">
              <div class="img">
      <img class="img-responsive" src="anh/avatar.jpg" alt="admin" style="width: 70px;height: 70px;">
              </div>
              <div class="info">
                <h3>Vũ Văn Long</h3>
                <p>Trường CNTT Thái Nguyên.</p>
              </div>
            </div>
            <div class="admin">
              <div class="img">
                <img class="img-responsive" src="anh/avatar.jpg" alt="admin" style="width: 70px;height: 70px;">
              </div>
              <div class="info">
                <h3>Đối Tác 2</h3>
                <p>Mô tả.</p>
              </div>
            </div>
            <div class="admin">
              <div class="img">
               <img class="img-responsive" src="anh/avatar.jpg" alt="admin" style="width: 70px;height: 70px;">
              </div>
              <div class="info">
                <h3>Đối Tác 3</h3>
                <p>Mô tả.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <h3>.</h3>
            <div class="admin">
              <div class="img">
                <img class="img-responsive" src="anh/avatar.jpg" alt="admin" style="width: 70px;height: 70px;">
              </div>
              <div class="info">
                <h3>Đối Tác 5</h3>
                <p>Giới thiệu</p>
              </div>
            </div>
            <div class="admin">
              <div class="img">
               <img class="img-responsive" src="anh/avatar.jpg" alt="admin" style="width: 70px;height: 70px;">
              </div>
              <div class="info">
                <h3>Đối Tác 6</h3>
                <p>giới thiệu</p>
              </div>
            </div>
            <div class="admin">
              <div class="img">
            <img class="img-responsive" src="anh/avatar.jpg" alt="admin" style="width: 70px;height: 70px;">
              </div>
              <div class="info">
                <h3>Đối tác 7</h3>
                <p>Thông Tin</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
  
    <section class="chrt3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9">
            <div class="chart-container">
              <canvas id="chart3" width="100%"></canvas>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>


  <div align="center" style="
    position: relative;
    bottom: 450px;
    right: 220px;

  ">
  
    <table border="1">
      <tr>
        <th colspan="4">Danh sách Admin Quản Lý Công Nhân</th>
      </tr>
      <tr>
        <th>STT</th>
      
        <th>Username</th>
        <th>Password</th>
        <th>Quyền</th>

      </tr>
      <tr>
        <td>1</td>
        <td>Admin01</td>
        <td>admin01</td>
        <td>1</td>
      </tr>   
       <tr>
        <td>2</td>
        <td>Admin02</td>
        <td>admin02</td>
        <td>1</td>
      </tr>

    </table>

   
</div>
</body>


</body>
</html>



<?php } ?>




<?php  

		if ($_SESSION['quyen']==0) 
		{
			//USER
			echo "Bạn Không Có Quyền Admin !!";
		}
	}
	else
	{//Neu chua Đăng nhập--->thong bao
		echo "bạn chưa Đăng nhập !! <br>";
		echo "<a href='http://localhost/hocphp/Baocao/QLCN/index.php?controller=congnhan&action=dangnhap'>Đăng nhập</a>";
	}

 ?>



