<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 分类
 */
class Category extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->load->model('Category_model', 'categoryModel');
	}
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function index()
	{	

		//分页
		$page = (int)$_GET['page'];
		$page = $page > 0 ? $page : 1;
		$params['pageSize'] = $data['pageSize'] = $pageSize = 10;
		$params['offset'] = $offset = ($page-1)*$pageSize; 
		
		$data['name'] = $name = $_GET['name'] ? $_GET['name'] : null;
		$data['source'] = $_GET['source'] ? $_GET['source'] : null;

		$where = [];
		if($name){
			$where[] = "name like '%".ci3_string_filter($name)."%'";
		}

		$params['where'] = implode(' and ',$where);
		$getList = $this->categoryModel->getList($params);
		$data += $getList;
		$this->load->view('admin/category/list',$data);
	}

	/**
	 * 编辑
	 * @return [type] [description]
	 */
	public function edit(){
		$id = (int)$_GET['id'];
		if($id){
			$data['dataModel'] = $this->categoryModel->getRow($id);
		}
		$this->load->view('admin/category/edit',$data);
	}

	/**
	 * 保存
	 * @return [type] [description]
	 */
	public function save(){
		$name = $_POST['name'] ? ci3_string_filter($_POST['name']) : "";
		if($name){
			$data['id'] = (int)$_POST['id'];
			$data['name'] = $name;
			$data['sort_id'] = (int)$_POST['sort_id'];
			$res = $this->categoryModel->save($data);
			$this->cResponse();
		}
		$this->cResponse(['code'=>'10000','message'=>'data error']);
	}

	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function delete(){
		$id = (int)$_GET['id'];
		$res = $this->categoryModel->delete(['where'=>$id]);
		if($res){
			$where = "category_id={$id}";
			$this->ci3Model->dataDelete(['table'=>'article_category_relation','where'=>$where]);
			$this->cResponse();
		}else{
			$this->cResponse(['code'=>'10000','message'=>'data error']);
		}
	}
	/**
	 * [batch description]
	 * @return [type] [description]
	 */
	public function batch(){
		$type = $_GET['type'];
		if(!empty($_POST['ckbOption'])){
			switch ($type) {
				case 'update':
					foreach ($_POST['ckbOption'] as $key => $value) {
						$name = ci3_string_filter($_POST['name'][$value]);
						$sort_id = (int)$_POST['sort_id'][$value];
						$this->categoryModel->update(['data'=>['name'=>$name,'sort_id'=>$sort_id],'where'=>$value]);
					}
					break;
				case 'delete':
					foreach ($_POST['ckbOption'] as $id) {
						$res = $this->categoryModel->delete(['where'=>$id]);
					}
					break;
				default:
					# code...
					break;
			}
		}
		$this->cResponse();
	}
}	