
<div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading">Đăng Nhập Để Sử Dụng</div>
      <div class="panel-body">


<form method="post" action="">
<center><img src="https://i.dlpng.com/static/png/106278_thumb.png" style="width:400px;height:400px;" /></center>
<div class="form-group">
<label>* Password:</label>
<input name="password" placeholder="Nhập Pass Vào Để Mà Đăng Nhập Nha...." class="form-control" style="height:50px;"/>
</div>

<div class="form-group">
<button class="btn btn-danger form-control" type="submit" name="submit"> Đăng Nhập <i class="pe-7s-check"></i></button>
</div>
</form>





</div>
</div>
</div>
<?php 
session_start();
$password = $_POST['password'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (md5($password) == "1a1dc91c907325c69271ddf0c944bc72"){
$_SESSION['password']=$password;
 header('Location: gettoken.php');
} else{
 echo "<script>alert('Sai Pass Roi Hihi')</script>";
}
}
?>