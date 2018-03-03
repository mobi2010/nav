<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 分类
 */
class Tagtype extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->load->model('TagType_model', 'tagtypeModel');//服务
	}
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function index()
	{	
		$data['name'] = $name = $_GET['name'] ? $_GET['name'] : null;

		$where = [];
		if($name){
			$where[] = "name like '%".ci3_string_filter($name)."%'";
		}

		$params['where'] = implode(' and ',$where);
		$getList = $this->tagtypeModel->getList($params);
		$data += $getList;
		$this->load->view('admin/tagtype/list',$data);
	}

	/**
	 * 编辑
	 * @return [type] [description]
	 */
	public function edit(){
		$id = (int)$_GET['id'];
		if($id){
			$data['dataModel'] = $this->tagtypeModel->getRow($id);
		}

		$this->load->view('admin/tagtype/edit',$data);
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
			$res = $this->tagtypeModel->save($data);
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
		$res = $this->tagtypeModel->delete(['where'=>$id]);
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
						$name = ci3_string_filter($_POST['name'][$value]);
						$sort_id = $_POST['sort_id'][$value];
						$this->tagtypeModel->update(['data'=>['name'=>$name,'sort_id'=>$sort_id],'where'=>$value]);
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