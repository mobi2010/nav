<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 分类
 */
class Tag extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->load->model('Tag_model', 'tagModel');
		$this->load->model('TagType_model', 'tagtypeModel');
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
		
		$data['tagtypeModel'] = $this->tagtypeModel->getKv();
		$data['name'] = $name = $_GET['name'] ? $_GET['name'] : null;
		$data['source'] = $_GET['source'] ? $_GET['source'] : null;

		$where = [];
		if($name){
			$where[] = "name like '%".ci3_string_filter($name)."%'";
		}

		$params['where'] = implode(' and ',$where);
		$getList = $this->tagModel->getList($params);
		$data += $getList;
		$this->load->view('admin/tag/list',$data);
	}

	/**
	 * 编辑
	 * @return [type] [description]
	 */
	public function edit(){
		$data['tagtypeModel'] = $this->tagtypeModel->getKv();
		$id = (int)$_GET['id'];
		if($id){
			$data['dataModel'] = $this->tagModel->getRow($id);
		}

		$this->load->view('admin/tag/edit',$data);
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
			$data['tag_type_id'] = (int)$_POST['tag_type_id'];
			$data['sort_id'] = (int)$_POST['sort_id'];
			$res = $this->tagModel->save($data);
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
		$res = $this->tagModel->delete(['where'=>$id]);
		if($res){
			$where = "tag_id={$id}";
			$this->ci3Model->dataDelete(['table'=>'article_tag_relation','where'=>$where]);
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
						$tag_type_id = (int)$_POST['tag_type_id'][$value];
						$this->tagModel->update(['data'=>['name'=>$name,'sort_id'=>$sort_id,'tag_type_id'=>$tag_type_id],'where'=>$value]);
					}
					break;
				case 'delete':
					foreach ($_POST['ckbOption'] as $id) {
						$res = $this->tagModel->delete(['where'=>$id]);
						$where = "tag_id={$id}";
						$this->ci3Model->dataDelete(['table'=>'article_tag_relation','where'=>$where]);
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