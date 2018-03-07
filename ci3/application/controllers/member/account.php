<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Account extends MY_Controller {		
	public $memberId;
	public $memberEntity;//user 实体
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
		$this->load->model('Tag_model', 'tagModel');//服务
		$this->load->model('article_model', 'articleModel');//服务
		$this->getMemberInfo();
	}

	public function index()
	{	
	
		$memberModel = $this->memberEntity;
		$data['dataModel'] = $memberModel;
		$this->load->view('account/profile',$data);
	}	

	public function signout(){
		ci3_delcookie("identity");
		redirect('index');
	}

	public function post(){
		//分页
		$page = (int)$_GET['page'];
		$page = $page > 0 ? $page : 1;
		$params['pageSize'] = $data['pageSize'] = $pageSize = 8;
		$params['offset'] = $offset = ($page-1)*$pageSize; 

		$data['title'] = $params['title'] = $_GET['title'] ? $_GET['title'] : null;
		$params['member_id'] = $this->memberId;
		
		$getList = $this->articleModel->getList($params);
		$data += $getList;

		$this->load->view('account/post',$data);
	}


	public function postedit(){
		if($_GET['a']){
			$article_id = (int)ci3_decrypt($_GET['a']);
			$dataModel = $this->articleModel->getInfo($article_id);
			if($dataModel['member_id'] == $this->memberId){
				$data['dataModel'] = $dataModel;
			}else{
				redirect('index');
			}
		}
		$data['categoryData'] = $this->categoryModel->getKv();
		$this->load->view('account/post-edit',$data);
	}

	public function postdelete(){
		if($_POST['a']){
			$article_id = (int)ci3_decrypt($_POST['a']);
			$dataModel = $this->articleModel->getInfo($article_id);
			if($dataModel['member_id'] == $this->memberId){
				$this->articleModel->delete(['where'=>$article_id]);
			}else{
				redirect('index');
			}
		}
		$this->cResponse();		
	}

	public function postsave(){
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
		$data['hits'] = 0;
		$data['member_id'] = $this->memberId;
		$data['category_id'] = (int)$_POST['category_id'];
		$article_id = $this->articleModel->save($data);


		$params['tags'] = $_POST['tags'];
		$params['article_id'] = $article_id;
		$this->articleModel->addArticleTags($params);

		redirect('member/account/post');
	}

	public function getMemberInfo(){
		$identity = ci3_getcookie('identity');
        if($identity){
            $id = $this->aes->decrypt($identity);
            $memberModel = $this->memberModel->getInfo($id);
        }
        if(empty($memberModel)){
        	redirect('member/signin');
        }else{
        	$this->memberId = $id;
        	$this->memberEntity = $memberModel;
        	return $memberModel;
        }
	}

}	