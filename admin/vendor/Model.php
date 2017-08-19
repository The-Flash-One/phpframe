<?php

namespace vendor;

class Model {
	const FETCH_ASSOC = \PDO::FETCH_ASSOC;
	const FETCH_NUM = \PDO::FETCH_NUM;
	const FETCH_BOTH = \PDO::FETCH_BOTH;
	const FETCH_OBJ = \PDO::FETCH_OBJ;
	protected $fetch_style = self::FETCH_ASSOC;
	protected $stmt;
	protected $_pdo;
	/**
	 * 构造函数
	 *
	 * @param array $config,数据库连接时的参数,包括有:
	 *        	hostname,服务器名称;
	 *        	username,用户名;
	 *        	password,密码
	 *        	database,数据库名称
	 * @return void
	 */
	public function __construct(array $config) {
		$this->_pdo = new \PDO ( 'mysql:host=' . $config ['hostname'] . ';dbname=' . $config ['database'], $config ['username'], $config ['password'] );
	}
	
	/**
	 * 插入记录
	 *
	 * @param string $table,数据表名称        	
	 * @param array $data,字段名称与字段值组成的二维数组        	
	 * @return int,被插入记录的行数
	 */
	public function insert($table, array $data) {
		$keys = join ( ',', array_keys ( $data ) );
		$vals = join ( ',:', array_keys ( $data ) );
		$sql = 'insert ' . $table . '(' . $keys . ') values(:' . $vals . ')';
		$this->stmt = $this->_pdo->prepare ( $sql );
		foreach ( $data as $key => $val ) {
			$this->stmt->bindValue ( ':' . $key, $val );
		}
		if ($this->stmt->execute ()) {
			return $this->stmt->rowCount ();
		}
		return false;
	}
	/**
	 * 获取最后插记录的ID号
	 *
	 * @param
	 *        	void
	 * @return string,最后插入记录的ID号
	 */
	public function lastInsertId() {
		return $this->_pdo->lastInsertId ();
	}
	public function update($table, array $data, $where = []) {
		$setting = null;
		$sql = 'update ' . $table . ' set ';
		foreach($data as $key => $val){
			if(is_null($setting)){
				$setting = $key . '=:' . $key; 
			} else {
				$setting .= ',' . $key . '=:' . $key;
			}
		}
		$sql .= $setting;
		if($where){
			$sql .= ' where ' .  $where[0] . $where[1] . ':' . $where[0];
		}
		$stmt = $this->_pdo->prepare($sql);
		foreach($data as $key=>$val){
			$stmt->bindValue(':' . $key , $val);
		}
		$stmt->bindValue(':'.$where[0],$where[2]);
		return $stmt->execute();
	}
	/**
	 * 根据SQL查询语言来抽取所有的记录
	 * @param  string $sql,SQL语句       	
	 * @param  array $params,SQL语句的占位符,而且采用命名占位符形式        	
	 * @return array
	 */
	public function fetchAll($sql, array $params = []) {
		$rowset = [ ];
		$this->stmt = $this->_pdo->prepare ( $sql );
		if ($params) {
			foreach ( $params as $key => $val ) {
				$this->stmt->bindValue ( $key, $val );
			}
		}
		$this->stmt->execute ();
		// $this->setFetchMode($this->fetch_style);
		$rowset = $this->stmt->fetchAll ( \PDO::FETCH_ASSOC );
		return $rowset;
	}
	
	public function fetch($sql, array $params = []){
		$row = [];
		$this->stmt = $this->_pdo->prepare ( $sql );
		if ($params) {
			foreach ( $params as $key => $val ) {
				$this->stmt->bindValue ( $key, $val );
			}
		}
		$this->stmt->execute ();		
		$row = $this->stmt->fetch ( \PDO::FETCH_ASSOC );
		return $row;
	}
	
	/**
	 * 删除记录
	 *
	 * @param string $table,数据表名称        	
	 * @param array $where,指定删除记录的条件        	
	 * @return int bool,如果成功时将返回被删除的行数;失败时返回false;
	 */
	public function delete($table, $where = []) {
		$sql = 'delete from ' . $table . (($where ? (' where ' . $where [0] . ' ' . $where [1] . ' (' . $where[2] .')') : null));
		$this->stmt = $this->_pdo->prepare ( $sql );
		$bool = $this->stmt->execute ();		
		if ($bool) {
			return $this->stmt->rowCount ();
		}
		return false;
	}
	/**
	 * 截断数据表
	 *
	 * @param string $table,数据表名称        	
	 * @return boolean
	 */
	public function truncate($table) {
		$sql = 'truncate table ' . $table;
		$this->stmt = $this->_pdo->prepare ( $sql );
		$bool = $this->stmt->execute ();
		return $bool;
	}
	/**
	 * 设置stmt对象的匹配类型
	 *
	 * @param int $mode,匹配类型        	
	 */
	public function setFetchMode($mode) {
		$this->fetch_style = $mode;
	}
	public function __destruct() {
		$this->_pdo = null;
		if ($this->stmt) {
			$this->stmt = null;
		}
	}
}