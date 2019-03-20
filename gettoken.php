<?php
ob_start();
session_start();
include'inc/head.php';
?>
<div style="padding-top:15px;"></div>

<div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading">Vui Lòng Nhập Token</div>
      <div class="panel-body">


<form method="post" action="">
<center><img src="http://pngimg.com/uploads/mark_zuckerberg/mark_zuckerberg_PNG3.png" style="width:400px;height:400px;" /></center>
<div class="form-group">
    <label>HƯỚNG DẪN GET TOKEN<a href="https://bit.ly/2Rynmk1" target="_blank"><b> TẠI ĐÂY</b></a><br/>
    Vui lòng nhập đúng chính xác token của bạn để sử dụng tool.Chúng tôi sẽ không lưu lại token hay bất kì thông tin cá nhân nào của bạn.Xin cảm ơn!<br/>
    </label>
<br/>
<label>* Token:</label>
<input name="token" placeholder="Nhập Token Vào Để Sử Dụng Chức Năng Nha...." class="form-control" style="height:50px;"/>
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
if(isset($_POST['submit'])){
$token = $_POST['token'];
$me = @json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token), true);
if($me['id']){
echo "<script>toastr.success('Thành công', 'Đăng nhập thành công');location.href='menu.php'</script>";
}else{
echo "<script>toastr.error('Thất bại', 'Token sai hoặc đã hết hạn');location.href='gettoken.php'</script>";
};
$_SESSION['token']=$token;
}
?>
<div style="display:none;">
<?php
include'inc/foot.php';
?></div>
<?php
      if(!isset($_SESSION['password'])) // If session is not set then redirect to Login Page
       {
           header("Location: index.php");
       }
?>