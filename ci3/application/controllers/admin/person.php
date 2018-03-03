<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 视频
 */
class Person extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->load->model('Tag_model', 'tagModel');//服务
		$this->load->model('Person_model', 'personModel');//服务
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
			$where[] = "name like '%".addslashes($name)."%'";
		}
		$where = empty($where) ? null : implode(' and ',$where);
		$params['where'] = $where;
		$getList = $this->personModel->getList($params);
		$dataModel = [];
		foreach ($getList['dataModel'] as $key => $value) {
			$dataModel[] = $this->personModel->getInfo($value['id']);
		}
		$getList['dataModel'] = $dataModel;
		$data += $getList;
		$data['source'] = $_GET['source'] ? $_GET['source'] : null;
		$this->load->view('admin/person/list',$data);
	}
	/**
	 * [add description]
	 * @return [type] [description]
	 */
	public function edit(){
		$person_id = (int)$_GET['id'];
		$data['identityTagData'] = $this->tagModel->getData(1);


		$data['dataModel'] = $this->personModel->getInfo($person_id);
		$this->load->view('admin/person/edit',$data);
	}

	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){
		

		$data['id'] = (int)$_POST['id'];
		$data['name'] = ci3_string_filter($_POST['name']);
		$data['birthday'] = strtotime($_POST['birthday']);
		$data['gender'] = intval($_POST['gender']);
		$data['bust'] = intval($_POST['bust']);
		$data['waist'] = intval($_POST['waist']);
		$data['hips'] = intval($_POST['hips']);
		$data['hobby'] = ci3_string_filter($_POST['hobby']);
		$data['region'] = intval($_POST['region']);
		$data['introduction'] = ci3_string_filter($_POST['introduction']);
		$data['status'] = intval($_POST['status']);


		$person_id = $this->personModel->save($data);


		//person_avatar
		if($_FILES['Avatar']['tmp_name'][0]){
			$uploadImgs = $this->image->mutilUpload(['fileKey'=>'Avatar']);
			foreach ($uploadImgs as $key => $value) {
				$thumbImg = $this->image->thumb(array('file'=>$value['filePath'],'width'=>125,'height'=>125,'bgcolor'=>'white'));
				$avatarData['image_url'] = $thumbImg['filePath'];
				$avatarData['person_id'] = $person_id;
				$this->ci3Model->dataInsert(['table'=>'person_avatar','data'=>$avatarData]);

			}			
		}

		//person_identity
		$this->ci3Model->dataDelete(['table'=>'person_identity','where'=>"person_id={$person_id}"]);
		foreach ($_POST['identity'] as $tag_id) {
			$identityData['tag_id'] = $tag_id;
			$identityData['person_id'] = $person_id;
			$this->ci3Model->dataInsert(['table'=>'person_identity','data'=>$identityData]);
		}

		redirect('admin/person');
	}

	function delavatar(){
		$id = (int)$_POST['id'];
		$this->ci3Model->dataDelete(['table'=>'person_avatar','where'=>$id]);
		$this->cResponse();
	}

	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function delete(){
		$id = (int)$_POST['id'];
		$res = $this->personModel->delete(['where'=>$id]);
		if($res){
			$this->cResponse();
		}else{
			$this->cResponse(['code'=>'10000','message'=>'data error']);
		}
	}
}	