<?php
 include_once("model/users.php");
 class users_controller{
	//phan hoi tai admin: ds doc, ds chua doc, doc, xoa
	function loadMsg_Unread(){
		$m_admin = new User();
		$tinnhan = $m_admin->loadMsg_Unread();
		//return array('tinnhan'=>$tinnhan);
		return $tinnhan;
	}

	function loadMsg_read(){
		$m_admin = new User();
		$tinnhan = $m_admin->loadMsg_read();
		//return array('tinnhan_read'=>$tinnhan);
		return $tinnhan;
	}

	function check_read($maph){
		$m_admin = new User();
		$msg = $m_admin->check_read($maph);
		//header('location:'.$_SERVER['HTTP_REFERER']);
		header('location:?controller=response');
		
	}

	function xoaPhanHoi($maph){
		$m_admin = new User();
		$delete = $m_admin->xoaPhanHoi($maph);
		header('location:?controller=response');
	}
 }
 ?>