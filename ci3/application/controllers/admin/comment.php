<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 分类
 */
class Comment extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->load->model('Comment_model', 'commentModel');
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
		
		$data['content'] = $content = $_GET['content'] ? $_GET['content'] : null;

		$where = [];
		if($content){
			$where[] = "content like '%".ci3_string_filter($content)."%'";
		}

		$params['where'] = implode(' and ',$where);
		$params['source'] = 'backend';
		$getList = $this->commentModel->getList($params);
		$data += $getList;
		$this->load->view('admin/article/comment',$data);
	}



	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function delete(){
		$id = (int)$_POST['id'];
		$res = $this->commentModel->delete(['where'=>$id]);
		$this->cResponse();
	}
	/**
	 * [batch description]
	 * @return [type] [description]
	 */
	public function batch(){
		$type = $_GET['type'];
		if(!empty($_POST['ckbOption'])){
			switch ($type) {
				case 'delete':
					foreach ($_POST['ckbOption'] as  $id) {
						 $this->commentModel->delete(['where'=>$id]);;
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