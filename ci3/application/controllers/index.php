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
		$this->load->model('article_model', 'articleModel');//服务
	}
	public function index()
	{	
		//分页
		$page = (int)$_GET['page'];
		$page = $page > 0 ? $page : 1;
		$params['pageSize'] = $data['pageSize'] = $pageSize = 8;
		$params['offset'] = $offset = ($page-1)*$pageSize;  


		$params['title'] = $data['keyWord'] = $title = $_GET['w'] ? $_GET['w'] : null;
		$params['tag_id'] = $data['t'] = (int)$_GET['t'];
		$getList = $this->articleModel->getList($params);
		
		$data += $getList;
		$this->load->view('index',$data);
	}	
	
}