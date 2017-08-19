<?php
namespace controller;

class CategoryController
{

    protected $_model;

    public function __construct()
    {
        require_once CONF_PATH . 'config.php';
        $this->_model = new \vendor\Model($config);
    }

    public function create()
    {
        $cm = new \vendor\CategoryModel();
        $option = $cm->getCategory();
        require_once 'view/category_create.html';
    }

    public function list()
    {
        $rowset = $this->_model->fetchAll('select * from category');
        require_once 'view/category_list.html';
    }
}

