
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang User</title>
	<style>
		*{
  margin:0;
  padding: 0;
}
.menu ul
{
  list-style-type:none;/*Bo cham tron*/
  background:#1f5688;
  text-align:center;/*cho MENU o GIUA*/
}
.menu ul li 
{
 display:inline-table;/*dan HANG NGANG*/
  width:150px;
  height:40px;
  line-height:40px;/*chữ ở giữa Khung & tao 1 KICH THUOC mỗi MENUCON riêng*/
  position:relative;/*cho CỐ ĐỊNH để menucon2 dịch chuyển TRONG Item2 này 
   position:absolute;*/
  
}
.menu ul li a /*chu Item...*/
{
  text-decoration:none;/*BO GACH CHAN*/
  color:white;
  display:block;/*moi Menucon->1 Khoi BAO 
 BOC*/
  font-size:20px;
}
.menu ul li a:hover
{
  /*Effect khi di chuyen chuot vao*/
  background:red;
  color:yellow;
  
}
.menu ul li > .menucon2
{
  display:none; /*ẨN Menucon2*/
 
 
}
.menu ul li:hover .menucon2
{
  /*KHI di chuột vào Menu thì sẽ show menucon2*/
  display:block;
  position:absolute;/* cho KHUNG Menucon2 CHỈ Ở TRONG Item2 */
}
	</style>
</head>
<body>
	

<div class="menu">
  <ul>
    <li><a href="http://localhost/hocphp/Baocao/QLCN/view/user/user.php">Trang chủ</a></li>
<!--     <li><a href="#">TD2</a>
      <ul class="menucon2">
        <li><a href="">Item 2.1</a></li>
        <li><a href="">Item 2.2</a></li>
        <li><a href="">Item 2.3</a></li>
        <li><a href="">Item 2.4</a></li>
      </ul>
    </li>
    <li><a href="#">Laptop</a></li> -->
    <li><a href="http://localhost/hocphp/Baocao/QLCN/index.php?controller=congnhan&action=Thongtinuser">Thông Tin Chung</a></li>
    <li><a href="http://localhost/hocphp/Baocao/QLCN/index.php?controller=congnhan&action=xemluonguser">Lương Tháng</a></li>

    <li><a href="http://localhost/hocphp/Baocao/QLCN/view/logout.php">Đăng Xuất</a></li>
  </ul>
  
</div>



</body>
</html>