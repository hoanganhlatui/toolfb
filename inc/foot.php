<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh"); 
if($_GET['show'] == '') {
$show = 20;
}else {
$show = $_GET['show'];
}
$i=1;
$ii=1;
$babygay = mysql_query ("SELECT name, COUNT(name) FROM user");
$robersgay = mysql_fetch_array($babygay);
$gay =$robersgay['COUNT(name)']; 

?>
<div class="row">
<div class="col-md-12">
<div class="col-md-6">
  <div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading"><b>THỐNG KÊ</b></div>
      <div class="panel-body">
<thead><tr class="active"><th><center></center></th><th><center><font color="red"><b>Tổng Số Người Dùng 1<? echo $gay;?></b></font></center></th></tr></thead>
<div style="overflow:auto;height:400px;">
<table class="table table-bordered">
    <thead>
        <tr class="active">
            <th>STT</th>
            <th>Name</th>
            <th>ID FaceBook</th>
            <th>Time Login</th>
        </tr>
    </thead>            
    <tbody>
        <tr>
                                               <?
						$res= @mysql_query("SELECT * FROM user ORDER BY id DESC LIMIT {$show}");
						while ($arr = mysql_fetch_array($res)) 
						{
						?>
            <td class="active" ><label for="usr"><font color="red">#<?echo ''.($i++).''?></font></label>
            </td>
            <td class="active" ><label for="usr"><font color="red"><?echo $arr['name'];?></font></label>
            </td>
            <td class="active" ><label for="usr"><font color="red"><?echo $arr['user_id'];?></font></label>
            </td>
            <td class="active" ><label for="usr"><font color="red"><? echo ' '.thoigianonline($arr['time']).' '; ?> trước</font></label>
            </td>
        </tr>
		<?}?>
		
    </tbody>
</table> </div>

			</div>
		</div>


</div>


</div>
<!---Log BOT-->
<div class="col-md-6">
  <div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading"><b>LỊCH SỬ HOẠT ĐỘNG</b></div>
      <div class="panel-body">
<thead><tr class="active"><th><center></center></th><th><center><font color="red"><b>Lịch Sử Hoạt Động</b></font></center></th></tr></thead>
<div style="overflow:auto;height:400px;">
<table class="table table-bordered">
    <thead>
        <tr class="active">
            <th>STT</th>
            <th>Thành Viên</th>
            <th>Hành Động Cho</th>
            <th>Vào Lúc</th>
        </tr>
    </thead>            
    <tbody>
        <tr>
                                               <?
						$res= @mysql_query("SELECT * FROM log_bot ORDER BY id DESC LIMIT {$show}");
						while ($arr = mysql_fetch_array($res)) 
						{
						?>
            <td class="active" ><label for="usr"><font color="red">#<?echo ''.($ii++).''?></font></label>
            </td>
            <td class="active" ><label for="usr"><font color="red"><?echo $arr['name'];?></font></label>
            </td>
            <td class="active" ><label for="usr"><font color="red"><?echo $arr['name_nguoita'];?></font></label>
            </td>
            <td class="active" ><label for="usr"><font color="red"><? echo $arr['thoigian']; ?></font></label>
            </td>
        </tr>
		<?}?>
		
    </tbody>
</table> </div>

			</div>
		</div>


</div>
</div>
</div>

</div>
</div>
</div>

</body>
</html>