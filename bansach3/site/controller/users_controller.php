<?php
 include_once("model/users.php");
 class users_controller{
	 //phan hoi user: them
	 function themphanhoi($hoten, $email,$noidung){
			$m_user = new User();
			$phanhoi = $m_user->themphanhoi($hoten, $email,$noidung);
			$_SESSION['respone_msg'] = "Đã Đặt h thành công . Cảm ơn bạn đã đồng hành cùng chúng tôi.";
	}
 }
 ?>
