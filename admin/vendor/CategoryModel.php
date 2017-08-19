<?php

namespace vendor;

class CategoryModel {
	protected $_model;
	public function __construct() {
		require_once CONF_PATH . 'config.php';	
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = 'ecms';		
		$this->_model = new \vendor\Model ( $config );
	}
	public function getCategory($parent_id = 0, $selectedValue = 0) {
		static $html = '';
		static $n = 0;		
		$sql = "select * from category where parent_id=" . $parent_id;
		$rowset = $this->_model->fetchAll ( $sql );        		
		if ($rowset) {
			foreach ( $rowset as $key => $row ) {
				$html .= '<option value="' . $row ['id'] . '"' . ($row ['id'] == $selectedValue ? ' selected' : null) . '>' . str_repeat ( '&nbsp;&nbsp;&nbsp;&nbsp;', $n ) . $row ['cate_name'] . '</option>';
				$n ++;
				$this->getCategory ( $row ['id'],$selectedValue );
			}
		}
		$n --;
		// $html .= "</ul>\n";
		return $html;
	}
}
