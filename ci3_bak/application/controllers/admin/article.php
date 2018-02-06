<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');


class Article extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->load->model('Category_model', 'categoryModel');//服务
		$this->load->model('article_model', 'articleModel');//服务
	}
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$data['categoryData'] = $this->categoryModel->getData(3);
		$data['title'] = $title = $_GET['title'] ? $_GET['title'] : null;
		$where = [];
		if($title){
			$where[] = "title like '%".addslashes($title)."%'";
		}
		$where = empty($where) ? null : implode(' and ',$where);
		$params['where'] = $where;
		$getList = $this->articleModel->getList($params);
		$data += $getList;
		$this->load->view('admin/article/list',$data);
	}
	/**
	 * [add description]
	 * @return [type] [description]
	 */
	public function edit(){
		$data['categoryData'] = $this->categoryModel->getData(3);
		$data['dataModel'] = $this->articleModel->getRow($_GET['id']);
		$this->load->view('admin/article/edit',$data);
	}

	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){
		if($_FILES['Filedata']['tmp_name']){
			$uploadImg = $this->image->upload();
			$thumbImg = $this->image->thumb(array('file'=>$uploadImg['filePath'],'width'=>272,'height'=>159,'bgcolor'=>'white'));
			$image_url = $thumbImg['filePath'];
		}else{
			$image_url = $_POST['image_url'];
		}
		$data['id'] = (int)$_POST['id'];
		$data['title'] = ci3_string_filter($_POST['title']);
		$data['abstract'] = ci3_string_filter($_POST['abstract']);
		$data['image_url'] = addslashes($image_url);
		$data['content'] = trim($_POST['editorValue']);
		$data['category_id'] = intval($_POST['category_id']);
		$res = $this->articleModel->save($data);
		redirect('admin/article');
	}
	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function delete(){
		$id = (int)$_POST['id'];
		$res = $this->articleModel->delete(['where'=>$id]);
		if($res){
			$this->cResponse();
		}else{
			$this->cResponse(['code'=>'10000','message'=>'data error']);
		}
	}
}	