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
			<h4><i class="fa fa-thumbs-up"></i> Auto  Remove Friends - Hệ Thống Tự Động Xóa Bạn Bè </h4>
			
		</div>
		<div class="box-content">
			<h4><strong><p class="text-danger"> Hệ Thống Tự Động Xóa Kết Bạn </p></strong></h4>
			<font style="color:#23c6c8;">Bước 1:</font> Sử Dụng Mục Bên " Danh Sách Bạn bè" Để Chọn ID Cần Xóa Của Bạn.  <br />
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
if( isset($_POST['id']) && is_array($_POST['id']) ) {
echo '<div class="alert alert-info"> ';
  foreach($_POST['id'] as $id) {
   $gay = file_get_contents('https://graph.facebook.com/me/friends?method=delete&uid='.$id.'&access_token='.$_SESSION['token']).'';
    $jancok = json_decode($gay);
    if($jancok=="500")
       echo " Đã Xóa ". $id ."<br>";
    else
        echo "<font color=red>Không Thể Xóan Bạn Bè Với ". $id ."</font><br>";
    sleep(5);
   }
echo '</div>'; 
}
?>
			

		</div>
	</div>
</div>

<div class="col-md-7">
	<div class="box box-info">
		<div class="box-title box-header with-border">
			<h4><i class="fa fa-credit-card"></i> Danh Sách Bạn Bè </h4>
		</div>
		<div class="box-content">
		<div class="input-group" style="margin-left: 20px;">
                     <div class="checkbox" style="margin-left: 30px;">
                          <label><input type="checkbox" value="" onClick="checkbox(this)"> Chọn Tất Cả </label>
                     </div>
                          <div class="control-group">
<?php
$data_friend = json_decode(auto('https://graph.facebook.com/me/friends?fields=id,name&method=GET&limit=500&access_token='.$_SESSION['token']), true);
$count_data_friend = count($data_friend['data']);
for($i=0;$i<$count_data_friend;$i++){
?>
								<div class="checkbox">
									<label><input type="checkbox" value="<?php echo $data_friend['data'][$i]['id']; ?>" name="id[]"><a href="https://www.facebook.com/<?php echo $data_friend['data'][$i]['id']; ?>" target="_blank"><?php echo $data_friend['data'][$i]['name']; ?></a></label>
								</div>
<?php
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

</form>
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
           echo "<script>alert('Bạn chưa nhập passwork');window.location.href='index.php'</script>";
       }
?>