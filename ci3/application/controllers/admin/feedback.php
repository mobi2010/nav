<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 分类
 */
class Feedback extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
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
		$data['content'] = $content = $_GET['content'];
		if($content){
			$params['where'] = "content like '%".ci3_string_filter($content)."%'";
		}
		$getList = $this->feedbackModel->getList($params);

		$data += $getList;
		$this->load->view('admin/feedback/list',$data);
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
			$data['feedback_type_id'] = (int)$_POST['feedback_type_id'];
			$data['sort_id'] = (int)$_POST['sort_id'];
			$res = $this->feedbackModel->save($data);
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
		$res = $this->feedbackModel->delete(['where'=>$id]);
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
						$content = ci3_string_filter($_POST['content'][$value]);
						$reply_content = ci3_string_filter($_POST['reply_content'][$value]);
						$this->feedbackModel->update(['data'=>['content'=>$content,'reply_content'=>$reply_content],'where'=>$value]);
					}
					break;
				case 'delete':
					foreach ($_POST['ckbOption'] as $id) {
						$res = $this->feedbackModel->delete(['where'=>$id]);
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