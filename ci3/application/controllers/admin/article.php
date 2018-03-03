<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');


class Article extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		$this->load->model('Tag_model', 'tagModel');//服务
		$this->load->model('article_model', 'articleModel');//服务
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

		$data['title'] = $params['title'] = $_GET['title'] ? $_GET['title'] : null;
		$data['tag_id'] = $params['tag_id'] = $_GET['tag_id'] ? $_GET['tag_id'] : null;
		
		$getList = $this->articleModel->getList($params);
		$data += $getList;

		$data['tagModel'] = $this->tagModel->getKv();
		$this->load->view('admin/article/list',$data);
	}
	/**
	 * [add description]
	 * @return [type] [description]
	 */
	public function edit(){
		$data['dataModel'] = $this->articleModel->getInfo($_GET['id']);
		$this->load->view('admin/article/edit',$data);
	}

	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){
		if($_FILES['Filedata']['tmp_name']){
			$uploadImg = $this->image->upload();
			$thumbImg = $this->image->thumb(array('file'=>$uploadImg['filePath'],'width'=>160,'height'=>120,'bgcolor'=>'white'));
			$image_url = $thumbImg['filePath'];
		}else{
			$image_url = $_POST['cover_image'];
		}
		$data['id'] = (int)$_POST['id'];
		$data['title'] = ci3_string_filter($_POST['title']);
		$data['abstract'] = ci3_string_filter($_POST['abstract']);
		$data['cover_image'] = $image_url;
		$data['content'] = trim($_POST['editorValue']);
		$data['hits'] = rand(10,100);
		$data['member_id'] = rand(1,50);
		$article_id = $this->articleModel->save($data);

		//person_identity
		foreach ($_POST['tag'] as $tag_id) {
			$taData['tag_id'] = $tag_id;
			$taData['article_id'] = $article_id;
			$this->ci3Model->dataInsert(['table'=>'article_tag_relation','data'=>$taData]);
		}


		redirect('admin/article');
	}
	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function delete(){
		$id = (int)$_POST['id'];
		$res = $this->articleModel->delete(['where'=>$id]);
		if($res){
			$where = "article_id={$id}";
			$this->ci3Model->dataDelete(['table'=>'article_tag_relation','where'=>$where]);
			$this->cResponse();
		}else{
			$this->cResponse(['code'=>'10000','message'=>'data error']);
		}
	}

	public function deltag(){
		$tag_id = (int)$_POST['tag_id'];
		$article_id = (int)$_POST['article_id'];
		if($tag_id && $article_id){
			$where = "tag_id={$tag_id} and article_id={$article_id}";
			$this->ci3Model->dataDelete(['table'=>'article_tag_relation','where'=>$where]);
		}
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
					foreach ($_POST['ckbOption'] as $article_id) {
						$this->articleModel->delete(['where'=>$article_id]);
						$where = "article_id={$article_id}";
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