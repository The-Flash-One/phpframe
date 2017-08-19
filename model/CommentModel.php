<?php

namespace model;
class CommentModel {
	protected $_model;
	public function __construct(){
		require  CONF_PATH . '/config.php';
		$this->_model = new \PDO('mysql:host=' . $config['hostname'] .';dbname=' . $config['database'],$config['username'],$config['password']);
	}
	public function fetchAll($art_id){		
		$sql = 'select cmt_content,add_time,mem_name,mem_face from comment inner join member on mem_id=member.id where art_id=:art_id order by comment.id desc';
		$stmt = $this->_model->prepare($sql);
		$stmt->bindValue(':art_id', $art_id);
		$stmt->setFetchMode(\PDO::FETCH_ASSOC);
		$stmt->execute();
		$rowset = $stmt->fetchAll();
		return $rowset;		
	}
}
