<?php
session_start();
session_destroy();
echo "<script>alert('Xin chào & hẹn gặp lại');window.location.href= 'index.php';</script>";
?>