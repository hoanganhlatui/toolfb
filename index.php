<?php
ob_start();
session_start();
include'inc/head.php';
?>
<div style="padding-top:15px;"></div>

<?php
include'login.php';
?>
<div style="display:none;">
<?php
include'inc/foot.php';
?></div>
<?php

      if(isset($_SESSION['password'])) // If session is not set then redirect to Login Page
       {
           header("Location: gettoken.php");
       }
?>