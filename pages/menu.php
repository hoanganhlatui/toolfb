
<div class="container">
<div class="row">
    <div class="row text-centered">

   <div style="padding-top:15px;"></div>

    <div class="col-md-12 text-center">
<div class="panel panel-primary">
      <div class="panel-heading"><b>Menu Cài Đặt Bot</b></div>
      <div class="panel-body">
             <th>* Token của bạn</th>

<input name="token" value="<?php echo $_SESSION['token'] ?>" class="form-control" style="height:60px;" disabled/>
 <label></label> Vui lòng nhập đúng chính xác token của bạn để sử dụng tool.Chúng tôi sẽ không lưu lại token hay bất kì thông tin cá nhân nào của bạn.Xin cảm ơn!<br/></label>
<table class="table table-bordered">
    <thead>
        <tr class="active">
           <th>Chọn Chức Năng Muốn Dùng</th>
        </tr>
    </thead>            
    <tbody>
<center>
				<td>        
			<button type="submit" class="btn btn-danger btn-primary" onclick="location.href='acceptfr.php'"> Chấp Nhận Kết Bạn</button>

			<button type="summit" class="btn btn-warning" onclick="location.href='unfriend.php'">Xóa kết bạn</button>
			
			<button type="summit" class="btn btn-primary" onclick="location.href='delstt.php'">Xóa Status</button>
			
			<button type="summit" class="btn btn-default" onclick="location.href='poke.php'">Auto Chọc</button>
			
			<button type="summit" class="btn btn-info" onclick="location.href='postwall.php'">Auto Post Wall</button>
						<button type="sumimt" class="btn btn-success" onclick="location.href='logout.php'">Thoát</button>

				</td></center>
    </tbody>
</table> 





</div>
</div>
</div>
