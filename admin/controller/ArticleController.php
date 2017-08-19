<?php
namespace controller;

class ArticleController {
	protected $_model;
	public function __construct(){		
		require_once CONF_PATH . 'config.php';
		$this->_model = new \vendor\Model($config);		
	}
	public function index(){
		//数据库
		$keywords = $_GET['keywords'];
		$where = ' where is_deleted = 0 ';
		if($keywords){
			if(strpos($keywords,'%') !== false){
				$pos = strpos($keywords,'%');
				$keywords = str_replace('%', '\%', $keywords);
			}
			$where .= ' and art_subject like \'%' . $keywords . '%\'';
		}
		$sql = 'select art.id,art_subject,is_checked,add_time,cate_name,ptr_name,ptr_url,true_name from article as art '				
				.' left join category as c on cate_id = c.id'
				.' left join partner as p on ptr_id = p.id'
				.' left join admin as a on admin_id = a.id ' . $where . ' order by art.id desc';
		//echo $sql;
		$rowset = $this->_model->fetchAll($sql);
		require_once 'view/article_list.html';
	}
	public function create(){
		//数据库
		$cm = new \vendor\CategoryModel();
		$option = $cm->getCategory();
		$ptr_rowset = $this->_model->fetchAll('select id,ptr_name from partner');			
		require_once 'view/article_create.html';	
	}
	public function store(){
		$timestamp = time();
		$folderName = date('Y-m-d');
		$folderPath = '../articles/' . $folderName;
		if(!file_exists($folderPath)){
			mkdir($folderPath);
		}
		$filename = md5(uniqid(microtime() . mt_rand())) . '.html';
		$filepath = $folderPath . '/' . $filename;
		//获取模板文件内容
		$html = file_get_contents("templates/index.html");
		//将占位符替换为真实的信息
		$html = str_replace('{art_subject}',$_POST['art_subject'],$html);
		$html = str_replace('{pub_time}',date('Y年m月d日 H:i',$timestamp),$html);
		//以提交的ptn_id为条件,查找合作合伴的信息
		$ptr_row = $this->_model->fetch('select ptr_name,ptr_url from partner where id=' . $_POST['ptr_id']);
		//继承替换合作伙伴的信息
		$html = str_replace('{ptr_url}',$ptr_row['ptr_url'],$html);
		$html = str_replace('{ptr_name}',$ptr_row['ptr_name'],$html);
		$html = str_replace('{cmt_num}','0',$html);
		$html = str_replace('{art_content}',$_POST['art_content'],$html);
		
		//数据库		
		$_POST['add_time'] = $timestamp;
		$_POST['admin_id'] = $_SESSION['id'];
		$_POST['filepath'] = $folderName . '/' . $filename; 
		$bool = $this->_model->insert('article', $_POST);
		
	
		if($bool){
			//将替换后的信息写入到文件
			$html = str_replace('{newsid}', $this->_model->lastInsertId(), $html);
			file_put_contents($filepath, $html);
			$message = '新闻成功添加,最后插入记录的ID号是' . $this->_model->lastInsertId();
		} else {
			$message = '新闻添加失败';
		}
		require_once 'view/message.html';
	}	
	public function checked(){
		$id = $_GET['id'];
		$this->_model->update('article', ['is_checked'=>1],['id','=',$id]);		
	}
	public function unchecked(){
		
		$id = $_GET['id'];
		$this->_model->update('article', ['is_checked'=>0],['id','=',$id]);		
	}
	public function modify(){
		$id = $_GET['id'];		
		//数据库		
		$cm = new \vendor\CategoryModel();		
		$ptr_rowset = $this->_model->fetchAll('select id,ptr_name from partner');
		$article_row = $this->_model->fetch('select id,art_subject,art_content,cate_id,ptr_id from article where id=:id',[':id'=>$id]);
		$option = $cm->getCategory(0,$article_row['cate_id']);
		//echo $option;
		require_once 'view/article_modify.html';
		//数据库
		//显示编辑时的表单页面
	}
	public function edit(){
		$id = $_POST['id'];
		unset($_POST['id']);
		$bool = $this->_model->update('article', $_POST,['id','=',$id]);
		if($bool){
			$meta = '<meta http-equiv="refresh" content="5;url=index.php?ctl=article">';
			$message = '新闻编辑成功,系统将在5秒后自动跳转到首页';
		} else {
			$message = '新闻编辑失败';
		}
		require_once 'view/message.html';
	}
	public function recyclelist(){
		$keywords = $_GET['keywords'];
		$where = ' where is_deleted = 1 ';
		if($keywords){
			if(strpos($keywords,'%') !== false){
				$pos = strpos($keywords,'%');
				$keywords = str_replace('%', '\%', $keywords);
			}
			$where .= ' and art_subject like \'%' . $keywords . '%\'';
		}
		$sql = 'select art.id,art_subject,is_checked,add_time,cate_name,ptr_name,ptr_url,true_name from article as art '
				.' left join category as c on cate_id = c.id'
				.' left join partner as p on ptr_id = p.id'
						.' left join admin as a on admin_id = a.id ' . $where . ' order by art.id desc';
		//echo $sql;
		$rowset = $this->_model->fetchAll($sql);
		require_once 'view/article_recyclelist.html';
	}
	
	public function recycle(){
		$array = $_POST['article_checkbox'];
		foreach ($array as $val){
			$this->_model->update('article',['is_deleted'=>1],['id','=',$val]);
		}
		$message = '新闻已经成功放入回收站';
		require_once 'view/message.html';
		//echo '新闻放入回收站';
	}
	public function restore(){
		$array = $_POST['article_checkbox'];
		foreach ($array as $val){
			$this->_model->update('article',['is_deleted'=>0],['id','=',$val]);
		}
		$message = '新闻已经成功还原';
		require_once 'view/message.html';
	}
	public function remove(){
		//数据库
		$array = $_POST['article_checkbox'];
		$string = join(',',$array);
		//echo $string;
		$this->_model->delete('article',['id','in',$string]);
		$message = '新闻已经成功放入删除';
		require_once 'view/message.html';
	}
}









