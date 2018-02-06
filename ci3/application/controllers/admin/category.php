<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 分类
 */
class Category extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->load->model('Category_model', 'categoryModel');//服务
	}
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$data['categoryType'] = $categoryType = (int)$_GET['type'];
		$data['name'] = $name = $_GET['name'] ? $_GET['name'] : null;

		$where[] = 'type='.$categoryType;
		if($name){
			$where[] = "name like '%".addslashes($name)."%'";
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
		$data['categoryType'] = $categoryType = (int)$_GET['type'];
		$id = (int)$_GET['id'];
		if($id){
			$data['dataModel'] = $this->categoryModel->getRow($id);
			$data['categoryType'] = $data['dataModel'] ? $data['dataModel']['type'] : $categoryType;
		}

		$this->load->view('admin/category/edit',$data);
	}

	/**
	 * 保存
	 * @return [type] [description]
	 */
	public function save(){
		$name = $_POST['name'] ? addslashes($_POST['name']) : "";
		if($name){
			$data['id'] = (int)$_POST['id'];
			$data['name'] = $name;
			$data['type'] = (int)$_POST['type'];
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
						$sort_id = $_POST['sort_id'][$value];
						$this->categoryModel->update(['data'=>['sort_id'=>$sort_id],'where'=>$value]);
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