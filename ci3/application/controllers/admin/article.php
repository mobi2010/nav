<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');


class Article extends Admin_Controller {
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

		$data['title'] = $params['title'] = $_GET['title'] ? $_GET['title'] : null;
		$data['tag_id'] = $params['tag_id'] = $_GET['tag_id'] ? $_GET['tag_id'] : null;
		$data['category_id'] = $params['category_id'] = $_GET['category_id'] ? $_GET['category_id'] : null;
		$data['member_id'] = $params['member_id'] = $_GET['member_id'] ? $_GET['member_id'] : null;
		
		$getList = $this->articleModel->getList($params);
		$data += $getList;

		$data['tagModel'] = $this->tagModel->getKv();
		$data['categoryData'] = $this->categoryModel->getKv();
		$this->load->view('admin/article/list',$data);
	}
	/**
	 * [add description]
	 * @return [type] [description]
	 */
	public function edit(){
		$data['dataModel'] = $this->articleModel->getInfo($_GET['id']);
		$data['categoryData'] = $this->categoryModel->getKv();
		$data['action'] = $_GET['action'];
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

		$member_id = (int)$_POST['member_id'];
		if(!$member_id){
			$memberIds = $this->ci3Model->dataFetchArray(['table'=>'member','where'=>'source=1','sval'=>'id']);
			$arKey = array_rand($memberIds,1);

			$member_id = $memberIds[$arKey];
		}
		$data['id'] = (int)$_POST['id'];
		$data['category_id'] = (int)$_POST['category_id'];
		$data['title'] = ci3_string_filter($_POST['title']);
		$data['abstract'] = ci3_string_filter($_POST['abstract']);
		$data['cover_image'] = $image_url;
		$data['content'] = trim($_POST['editorValue']);
		$data['video_url'] = trim($_POST['video_url']);
		$data['hits'] = rand(10,100);
		$data['member_id'] = $member_id;//rand(1,20);
		$article_id = $this->articleModel->save($data);

		//person_identity
		$params['tags'] = $_POST['tags'];
		$params['article_id'] = $article_id;
		$this->articleModel->addArticleTags($params);


		redirect('admin/article');
	}
	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function delete(){
		$id = (int)$_POST['id'];
		$this->articleModel->deleteOne($id);
		$this->cResponse();
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
						$this->articleModel->deleteOne($article_id);
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