<?php

namespace controller;

class AdminController {
protected $_model;
	public function __construct(){		
		require_once CONF_PATH . 'config.php';
		$this->_model = new \vendor\Model($config);		
	}
	public function index() {
		require_once 'view/admin_list.html';
	}
	public function create() {
		require_once 'view/admin_create.html';
	}
	public function store() {
		//echo '哈哈省吃俭用0';
		//1.获取数据
		$data['admin_name'] = $_POST['admin_name'];
		$data['admin_pass'] = md5($_POST['admin_pass']);
		$data['true_name'] = $_POST['true_name'];
		$data['admin_level'] = $_POST['admin_level'];		
		//2.插入数据
		$this->_model->insert('admin', $data);
	}
	public function update() {
	}
	public function edit() {
	}
	public function remove() {
	}
	public function login(){
		//初始化显示
		$method = strtolower($_SERVER['REQUEST_METHOD']);
		if($method == 'get'){
			require_once 'view/admin_login.html';
		} 
		if($method == 'post'){
			//echo '管理员登录了,应该检测了';
			$admin_name = $_POST['admin_name'];
			$admin_pass = md5($_POST['admin_pass']);
			$sql = 'select id,admin_name,true_name,admin_level from admin where admin_name=:admin_name and admin_pass=:admin_pass';
			$data = [
				':admin_name'=>$admin_name,
				':admin_pass'=>$admin_pass
			];
			$row = $this->_model->fetch($sql,$data);
			if($row){				
				$_SESSION['id'] = $row['id'];
				$_SESSION['admin_name'] = $row['admin_name'];
				$_SESSION['true_name'] = $row['true_name'];
				$_SESSION['admin_level'] = $row['admin_level'];
				require_once 'view/index.html';
			} else {
				require_once 'view/admin_login.html';
			}
			
		}
		
	}
	public function logout(){
		session_destroy();
		header('Location:index.php');		
	}
}









