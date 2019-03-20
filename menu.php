<?php
ob_start();
session_start();
include'inc/head.php';
?>
<div style="padding-top:15px;"></div>

<?php
include'pages/menu.php';
?>
<div style="display:none;">
<?php
include'inc/foot.php';
?></div>
<?php
if(!isset($_SESSION['password'])) // If session is not set then redirect to Login Page
       {
           echo "<script>alert('Bạn chưa nhập password');window.location.href='index.php'</script>";
       };
$me = @json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$_SESSION['token']), true);
if(!$me['id']){
    echo "<script>alert('Token của bạn đã hết hạn');window.location.href='logout.php'</script>";
}
?>