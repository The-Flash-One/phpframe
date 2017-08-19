<?php

namespace controller;

class MemberController {
	public function login(){
		$sql = 'select * from member where admin_name=:admin_name and admin_pass=:admin_pass';
// 		$model = new Model('....');
// 		$row = $model->fetch($sql,[':admin_name'=>$_POST['admin_name'],':admin_pass'=>md5($_POST['admin_pass'])]);
// 		if($row){
			
// 		} else {
			
// 		}
	}
	public function logout(){
		
	}
}

