<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');
/**
 * 分类
 */
class Nav extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->initData['navData'] = require(APPPATH.'/config/nav_data.php');
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
		$data['uri'] = $_GET['uri'] ? $_GET['uri'] : null;
		$data['nav_category_id'] = $nav_category_id = $_GET['nav_category_id'] ? $_GET['nav_category_id'] : null;

		$where = [];
		if($name){
			$where[] = "name like '%".ci3_string_filter($name)."%'";
		}
		if($nav_category_id){
			$where[] = "nav_category_id={$nav_category_id}";
		}

		$params['where'] = implode(' and ',$where);
		$getList = $this->navModel->getList($params);
		$data += $getList;

		$data['categoryKV'] = $this->navModel->getCategoryKV();
		$this->load->view('admin/nav/list',$data);
	}

	public function category(){
		//分页
		$page = (int)$_GET['page'];
		$page = $page > 0 ? $page : 1;
		$params['pageSize'] = $data['pageSize'] = $pageSize = 10;
		$params['offset'] = $offset = ($page-1)*$pageSize; 
		$data = $this->navModel->categoryList($params);
		$this->load->view('admin/nav/categorylist',$data);
	}

	public function categorycreate(){
		$name = $_POST['name'] ? ci3_string_filter($_POST['name']) : "";
		if($name){
			$data['id'] = (int)$_POST['id'];
			$data['name'] = $name;
			$data['sort_id'] = (int)$_POST['sort_id'];
			$res = $this->navModel->categorySave($data);
		}
		$this->cResponse();
	}

	/**
	 * 编辑
	 * @return [type] [description]
	 */
	public function data(){
		$id = (int)$_GET['id'];
		if($id){
			$data['dataModel'] = $this->navModel->getRow($id);
		}
		$this->load->view('admin/nav/data',$data);
	}
	public function dataconfig(){
		$navData = $this->initData['navData'];
		foreach ($navData as $key => $value) {
			$ctitle = $value['title'];
			$crow = $this->ci3Model->dataFetchRow(['table'=>'nav_category','where'=>"name like '{$ctitle}'"]);
			if(empty($crow)){
				$cid = $this->ci3Model->dataInsert(['table'=>'nav_category','data'=>['name'=>$ctitle]]);
			}else{
				$cid = $crow['id'];
			}
			foreach ($value['sub'] as $nk => $nv) {
				$ntitle = $nv['title'];
				$nrow = $this->ci3Model->dataFetchRow(['table'=>'nav','where'=>"name like '{$ntitle}'"]);
				if(empty($nrow)){
					$data['name'] = $ntitle;
					$data['uri'] = $nv['uri'];
					$data['type'] = $nv['type'];
					$data['sort_id'] = 0;
					$data['hits'] = 0;
					$data['nav_category_id'] = $cid;
					$this->navModel->save($data);
				}
			}
		}
		$this->cResponse();
	}

	public function datafetch(){
		$params['url'] = $_POST['uri'] ? $_POST['uri'] : "http://www.form.gq/";
		$html = $this->curlUtils->get($params);
		preg_match_all('/<h2>(.*?)<\/ul>/is',$html,$out, PREG_SET_ORDER);
	    foreach ($out as $key => $value) {
	    	preg_match_all('/<h2><a href="(.*?)">(.*?)<\/a><\/h2>/is',$value[0],$title, PREG_SET_ORDER);
	    	preg_match_all('/<li><a href="(.*?)" target="_blank">(.*?)<\/a><\/li>/is',$value[0],$body, PREG_SET_ORDER);
	    	$bd = [];
	    	foreach ($body as $k2 => $v2) {
	    		$name = strip_tags($v2[2]);
	    		$url = strip_tags($v2[1]);
	    		$bd[$name] = $url;
	    	}
	    	$title = strip_tags($title[0][2]);
	    	$res[$title] = $bd;
	    	
	    }

	    foreach ($res as $key => $value) {
			$ctitle = $key;
			$crow = $this->ci3Model->dataFetchRow(['table'=>'nav_category','where'=>"name like '{$ctitle}'"]);
			if(empty($crow)){
				$cid = $this->ci3Model->dataInsert(['table'=>'nav_category','data'=>['name'=>$ctitle]]);
			}else{
				$cid = $crow['id'];
			}
			foreach ($value as $nk => $nv) {
				$ntitle = $nk;
				$nrow = $this->ci3Model->dataFetchRow(['table'=>'nav','where'=>"name like '{$ntitle}'"]);
				$data['id'] = $nrow['id'];
				$data['name'] = $ntitle;
				$data['uri'] = $nv;
				$data['type'] = "";
				$data['sort_id'] = 0;
				$data['hits'] = 0;
				$data['nav_category_id'] = $cid;
				$this->navModel->save($data);
			}
		}
		$this->cResponse();
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
			$data['uri'] = ci3_string_filter($_POST['uri']);
			$data['type'] = ci3_string_filter($_POST['type']);
			$data['sort_id'] = (int)$_POST['sort_id'];
			$data['hits'] = (int)$_POST['hits'];
			$data['nav_category_id'] = (int)$_POST['nav_category_id'];
			$res = $this->navModel->save($data);
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
		$res = $this->navModel->delete(['where'=>$id]);
		if($res){
			$where = "nav_id={$id}";
			$this->ci3Model->dataDelete(['table'=>'article_nav_relation','where'=>$where]);
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
						$data['name'] = ci3_string_filter($_POST['name'][$value]);
						$data['sort_id'] = (int)$_POST['sort_id'][$value];
						$data['uri'] = ci3_string_filter($_POST['uri'][$value]);
						$data['nav_category_id'] = (int)$_POST['nav_category_id'][$value];
						$data['type'] = ci3_string_filter($_POST['type'][$value]);
						$this->navModel->update(['data'=>$data,'where'=>$value]);
					}
					break;
				case 'delete':
					foreach ($_POST['ckbOption'] as $id) {
						$res = $this->navModel->delete(['where'=>$id]);
					}
					break;
				default:
					# code...
					break;
			}
		}
		$this->cResponse();
	}
	/**
	 * [batch description]
	 * @return [type] [description]
	 */
	public function categorybatch(){
		$type = $_GET['type'];
		if(!empty($_POST['ckbOption'])){
			switch ($type) {
				case 'update':
					foreach ($_POST['ckbOption'] as $key => $value) {
						$name = ci3_string_filter($_POST['name'][$value]);
						$sort_id = (int)$_POST['sort_id'][$value];
						$status = (int)$_POST['status'][$value];
						$this->navModel->categorySave(['status'=>$status,'name'=>$name,'sort_id'=>$sort_id,'id'=>$value]);
					}
					break;
				case 'delete':
					foreach ($_POST['ckbOption'] as $id) {
						$res = $this->navModel->categorydelete(['where'=>$id]);
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