<?php
 include_once("model/order.php");
 class Xac_Nhan{
	 //phan hoi user: them
	 function themxn($transaction_id,$qty,$product_id,$amount,$data,$status){
			$m_user = new User();
			$ps = $m_user->themxn($transaction_id,$qty,$product_id,$amount,$data,$status);
			// $_SESSION['res_msg'] = "Đã gửi phản hồi thành công . Cảm ơn bạn đã đồng hành cùng chúng tôi.";
	}
 }
 ?>
