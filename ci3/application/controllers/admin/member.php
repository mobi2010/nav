<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 分类
 */
class Member extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->load->model('Member_model', 'memberModel');
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
		
		$data['member_id'] = $member_id = $_GET['member_id'] ? $_GET['member_id'] : 0;

		$data['username'] = $username = $_GET['username'] ? $_GET['username'] : null;

		$where = [];

		if($member_id){
			$where[] = "id={$member_id}";
		}
		if($username){
			$where[] = "username like '%".ci3_string_filter($username)."%'";
		}

		$params['where'] = implode(' and ',$where);
		$getList = $this->memberModel->getList($params);
		$data += $getList;
		$this->load->view('admin/member/index',$data);
	}

	public function login(){
		$member_id = (int)$_GET['member_id'];
		if($member_id){
			$this->ci3SetCookie($member_id);
		}
		redirect('member/account/profile');
	}

	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function delete(){
		$id = (int)$_POST['id'];
		$res = $this->memberModel->delete(['where'=>$id]);
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
						 $this->memberModel->deleteOne(['where'=>$id]);
					}
					break;
				case 'update':
					foreach ($_POST['ckbOption'] as $key => $value) {
						$params['id'] = $value;
						$params['password'] = ci3_string_filter($_POST['password'][$value]);
						$params['status'] = intval($_POST['status'][$value]);
						$params['username'] = ci3_string_filter($_POST['username'][$value]);
						$params['email'] = ci3_string_filter($_POST['email'][$value]);
						$params['gender'] = intval($_POST['gender'][$value]);
						$params['biography'] = ci3_string_filter($_POST['biography'][$value]);
						$params['source'] = intval($_POST['source'][$value]);
						$this->memberModel->save($params);
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