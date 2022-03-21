<?php
    session_start();
    $_SESSION['inbox'] = 1;
    $_SESSION['read'] = 0;
    include_once("controller/users_controller.php");
    $c_admin = new users_controller();
    $tinnhan = $c_admin->loadMsg_Unread();
    $tinnhan_read = $c_admin->loadMsg_read();
	
	$msg_unread= mysqli_num_rows($tinnhan);
	$msg_read= mysqli_num_rows ($tinnhan_read);
?>

 <!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
<!-- Bootstrap -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery.min.js"></script>    
<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<style>
table[border="1"] {
  border-collapse:collapse;
  color:#6F0A0A;
}

table[border="1"] tr {
  background:#FFE5E5;
}

table[border="1"] th,
table[border="1"] td {
  vertical-align:top;
  padding:5px 10px;
  border:1px solid #fff;
}

table[border="1"] tr:nth-child(even) {
  background:#f5f5f5;
}

table[border="1"] th {
  background:#A00F0F;
  color:#fff;
  font-weight:bold;
}
</style>
<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<!-- Menu admin đăng nhập -->
					<h3 ><a href="index.php">Về HomePage</a></h3> 
                </div>
            </div>
        </div>
</div> <!-- End header area -->

<div class="container-fluid" >
    <div class="row col-md-12">
        <h2 style="color: blue;"><em class="fa fa-inbox"></em> Danh sách tất cả phản hồi khách hàng</h2>
        <div>
			<div class="box-content">
				<div class="btn-toolbar pull-right clearfix">
					<div class="btn-group">
						<a class="btn btn-block btn-social btn-dropbox show-tooltip" title="Cập nhật -Làm mới" href="?controller=response">
							<i class="fa fa-repeat"></i> Refresh
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-md-12">
            <div class="product-inner">
				<div role="tabpanel">
				<ul class="product-tab" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
							<i class="fa fa-lock"></i>  Tin nhắn chưa đọc <span class="badge"><?php  echo ( $msg_unread ); ?></span></a>
					</li>
					<li role="presentation">
						<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
							<i class="fa fa-unlock"></i> Tin nhắn đã đọc <span class="badge"><?php  echo ( $msg_read ); ?></span></a>
					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="home">
						<h2 class="text text-info"><b>Hộp thư chưa đọc</b></h2>  
						<div class="submit-review" style="color: green;">
								<table class="table table-condensed table-bordered" border="1">
							<thead>
								<tr>
									<th>Tên khách hàng</th>
									<th>Email</th>
									<th>Nội dung</th>
									<th>Ngày tạo</th>
									<th>Đánh dấu</th>
								</tr>    
							</thead>
							<tbody id="data">
								<?php
									if ( $msg_unread > 0) {
										while($row = $tinnhan->fetch_assoc()) {
											echo '
											<tr>
												<td>'.$row["hoten"]. '</td>
												<td width="20%">'.$row["email"]. '</td>
												<td>'.$row["noidung"]. '</td>
												<td>'.$row["ngaytao"]. '</td>
												<td style="text-align: center;"><a class="btn btn-info show-tooltip" title="Đánh dấu đã đọc" onclick="return confirm(\'Bạn chắc muốn đánh đấu đọc tin này rồi chứ?\')"  href="?controller=admin_readmsg&maph='.$row["id"].'"><em class="fa fa-check"></em></a></td>
											</tr> ';
										}
									}
								?>
							</tbody>
						</table>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="profile">
						<h2 class="text text-info"><b> Hộp thư đã đọc</b></h2>
						<div class="submit-review">
							<table class="table table-condensed table-bordered" border="1">
							<thead>
								<tr>
									<th>Tên khách hàng</th>
									<th>Email</th>
									<th>Nội dung</th>
									<th>Ngày tạo</th>
									<th>Xóa</th>
								</tr>    
							</thead>
							<tbody id="data">
							<?php
								if ( $msg_read > 0) {
									while($row = $tinnhan_read->fetch_assoc()) {
										echo '
										<tr>
											<td>'.$row["hoten"]. '</td>
											<td width="20%">'.$row["email"]. '</td>
											<td>'.$row["noidung"]. '</td>
											<td>'.$row["ngaytao"]. '</td>
											<td style="text-align: center;"><a class="btn btn-danger show-tooltip" title="Xóa phản hồi" onclick="return confirm(\'Bạn chắc muốn xóa chứ?\')"  href="?controller=admin_xoatinnhan&maph='.$row["id"].'"><em class="fa fa-trash"></em></a></td>
										</tr> ';
									}
								}
								?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
				</div>
				</div>
        </div>
    </div>
</div>	

    <br>
    <br>
    