<?php
ob_start();
include'inc/head.php';
?>
<div style="padding-top:15px;"></div>
      <div class="panel-heading"><b><i class="fa fa-home"></i><a href="menu.php">Trang chủ</a></b></div>
            <label><b>Chú ý: </b>Không nên quá lạm dụng chức năng này, vì có thể bạn sẽ bị checkpoint hoặc block tính năng!</label>
<div class="col-md-5">
	<div class="box box-success">
		<div class="box-title box-header with-border">
			<h4><i class="fa fa-thumbs-up"></i> Auto Delete Status - Hệ Thống Tự Động Xóa Bài Viết Trên Wall</h4>
			
		</div>
		<div class="box-content">
			<h4><strong><p class="text-danger"> Hệ Thống Tự Động Xóa Bài Viết Trên Wall</p></strong></h4>
			<font style="color:#23c6c8;">Bước 1:</font> Sử Dụng Mục Bên " Danh Sách Status" Để Chọn ID Status Của Bạn.  <br />
			<hr>


<form action="" method="post">
			<div id="bodyup" class="form-group">
				<button type="submit" class="btn btn-success btn-block"  onClick="done()" >
					<i class="fa fa-exchange"></i> Thực Hiện
				</button>
			</div>
                       <div id="thongbao" style="display: none;">
				<button type="submit" class="btn btn-success btn-block" disabled>
					<i class="fa fa-refresh fa-spin"></i> Đang Thực Hiện
				</button><BR><BR>
                                <div class="alert alert-info"><i class="fa fa-refresh fa-spin"></i> Đang Thực Hiện - Vui Lòng Đợi!
                                </div>
                       </div>
		</div>
		<div class="box-footer">
<?php
$c = 0;
if( isset($_POST['id']) && is_array($_POST['id']) ) {
  foreach($_POST['id'] as $lol) {
	auto('https://graph.facebook.com/'.$lol.'/?access_token='.$_SESSION['token'].'&method=delete').'';
          $c++;
          sleep(5);
   }
echo '<div class="alert alert-info"> SUCCESS: Auto Xóa Status Thành Công.<br /> Đã Xóa '.$c.' Status  .<script type="text/javascript">toarst("success","Auto Xóa Status  Thành Công!.","Lời Nhắn Từ Hệ Thống")</script></div>';
}

?>
			

		</div>
	</div>
</div>
<div class="col-md-7">
	<div class="box box-info">
		<div class="box-title box-header with-border">
			<h4><i class="fa fa-credit-card"></i> Danh Sách Status </h4>
		</div>
		<div class="box-content">
		<div class="input-group" style="margin-left: 20px;">
                     <div class="checkbox" style="margin-left: 30px;">
                          <label><input type="checkbox" value="" onClick="checkbox(this)"> Chọn Tất Cả </label>
                     </div>
                          <div class="control-group">
<?php
$stat=json_decode(auto('https://graph.beta.facebook.com/me/feed?fields=id,name,message,created_time,full_picture,from&access_token='.$_SESSION['token'].'&method=GET&limit=500'),true);
for($i=1;$i<=count($stat[data]);$i++){
if(!ereg($stat[data][$i-1][id],$log)){
?>
<div class="checkbox">
<label><input type="checkbox" value="<?=$stat[data][$i-1][id]?>" name="id[]"><?=$stat[data][$i-1][name]?><?=$stat[data][$i-1][message]?>
        <?=$stat[data][$i-1][full_picture] ? '<img class="img-responsive" src="'.$stat[data][$i-1][full_picture].'">' : '' ?><br> Đăng Lúc : <?=$stat[data][$i-1][created_time]?><br></label>
</div>
<?php
if($i=='10'){
?>
                          </div>
                          <div class="control-group">
<?php
}
?>
<?php
}
}
?>
                        </div>
                 </div>
</form>
		</div>
		<div class="box-footer">
		</div>
	</div>
</div>

<script type="text/javascript">
function done()
	{
	$("#bodyup").hide();
	$("#thongbao").show();
	}
</script>
<script>
function checkbox(source) {
  checkboxes = document.getElementsByName('id[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<?php
function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>
<div style="display:none;">
<?php
include'inc/foot.php';
?></div>
<?php
      if(!isset($_SESSION['password'])) // If session is not set then redirect to Login Page
       {
           echo "<script>alert('Bạn chưa nhập password');window.location.href='index.php'</script>";
       }
?>