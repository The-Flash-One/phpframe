<?php

namespace model;

class ArticleModel {
	protected $_model;
	public function __construct(){
		require CONF_PATH . '/config.php';
		$this->_model = new \PDO('mysql:host=' . $config['hostname'] .';dbname=' . $config['database'],$config['username'],$config['password']);		
	}
	public function getBasicInfo($id){
		$sql = 'select art_subject,filepath from article where id=:id';
		$stmt = $this->_model->prepare($sql);
		$stmt->setFetchMode(\PDO::FETCH_ASSOC);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$row = $stmt->fetch();
		return $row;
	}
	public function fetchAll($sql, $bind = []) {
		$stmt = $this->_model->prepare($sql);				
		$stmt->execute();
		$rowset = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $rowset;
	}
}
