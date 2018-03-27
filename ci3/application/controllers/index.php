<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 首页
 *
 * @author by zsc
 */
class Index extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
	}
	public function index()
	{	
		//分页
		$page = (int)$_GET['page'];
		$page = $page > 0 ? $page : 1;
		$params['pageSize'] = $data['pageSize'] = $pageSize = 5;
		$params['offset'] = $offset = ($page-1)*$pageSize;  


		$params['title'] = $data['keyWord'] = $title = $_GET['w'] ? $_GET['w'] : null;
		$params['tag_id'] = $data['t'] = (int)ci3_decrypt($_GET['t']);
		$params['category_id'] = $data['c'] = (int)ci3_decrypt($_GET['i']);

		if(empty($_GET)){
			$params['random'] = true;
			$getList = $this->articleModel->getList($params);
		}else{
			$getList = $this->articleModel->getList($params);
		}

		
		
		$data += $getList;
		$this->load->view('index',$data);
	}	
	
	public function follow()
	{	
		//分页
		$page = (int)$_GET['page'];
		$page = $page > 0 ? $page : 1;
		if($this->userId){
			$params['pageSize'] = $data['pageSize'] = $pageSize = 8;
			$params['offset'] = $offset = ($page-1)*$pageSize; 
			$params['follow_member_id'] = $this->userId; 
			$getList = $this->articleModel->getList($params);
			
			$data += $getList;
		}else{
			$data = [];
		}
		$this->load->view('index',$data);
	}	

}