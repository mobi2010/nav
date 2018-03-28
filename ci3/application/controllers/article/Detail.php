<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require('Article_Controller.php');


class Detail extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		

	}
	public function index()
	{	
		$id = (int)$_GET['id'];
		$tag_id = (int)$_GET['tag_id'];
		$category_id = (int)$_GET['category_id'];
		$dataModel = [];
		if($id){
			$dataModel = $this->articleModel->getInfo($id);
		}
		
		if(empty($dataModel['id'])){
			redirect('index');
		}else{
			$dataModel['hits'] += 1;
			$this->articleModel->save(['id'=>$dataModel['id'],'hits'=>$dataModel['hits']]);

			$data['dataModel'] = $dataModel;
			$data['tag_id'] = $tag_id;
			$data['category_id'] = $category_id;
			$member_id = $dataModel['member_id'] ? $dataModel['member_id'] : 1;

			$data['memberData'] = $this->memberModel->getInfo($member_id);
			$data['m'] = ci3_encrypt($member_id);
			$data['current_user_id'] = $this->userId;

			$data['followStatus'] = $this->memberModel->followStatus($this->userId,$member_id);


			$data['previousModel'] = $this->articleModel->context(['category_id'=>$category_id,'article_id'=>$id,'tag_id'=>$tag_id]);
			$data['nextModel'] = $this->articleModel->context(['category_id'=>$category_id,'article_id'=>$id,'tag_id'=>$tag_id,'type'=>1]);



			$data['htmlTitle'] = 'iav18-'.$dataModel['title']; 
    		$data['htmlKeywords'] = $dataModel['tags'] ? implode(',',$dataModel['tags']) :  "iav18"; 
			$this->load->view('article/detail',$data);
		}
	}

	public function comment(){
		$member_id = $this->userId;
		if(!$member_id || !$_POST['article_id'] || !$_POST['comment']){
			$this->cResponse(['code'=>'10000','message'=>'Data error']);
		}

        $reply_id = (int)$_POST['reply_id'];

		$data['article_id'] = $_POST['article_id'];
		$data['member_id'] = $member_id;
		$data['content'] = ci3_string_filter($_POST['comment']);
		$data['reply_id'] = $reply_id;

		$res = $this->commentModel->save($data);
		
		$this->cResponse();
	}

	public function commentList(){


		//分页
		$page = (int)$_POST['page'];
		$page = $page > 0 ? $page : 1;
		$params['pageSize'] = $data['pageSize'] = $pageSize = 10;
		$params['offset'] = $offset = ($page-1)*$pageSize; 
		$params['order'] = "id asc"; 
		$data['article_id'] = $params['article_id'] = (int)$_POST['article_id'];

		$getList = $this->commentModel->getList($params);
		$data += $getList;
		$data['member_id'] = $this->userId;
		$this->load->view('article/comment-list',$data);
	}	

	public function commentDel(){

		$id = (int)ci3_decrypt($_POST['c']);
		$params['where'] = "id={$id}";
		$params['article_id'] = (int)$_POST['article_id'];
		$this->commentModel->delete($params);
		$this->cResponse();
	}	
	
}