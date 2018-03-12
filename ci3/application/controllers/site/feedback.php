<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require('Article_Controller.php');


class Feedback extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
		$this->load->model('feedback_model', 'feedbackModel');
	}
	public function index()
	{	
		//分页
		$page = (int)$_POST['page'];
		$page = $page > 0 ? $page : 1;
		$params['pageSize'] = $data['pageSize'] = $pageSize = 10;
		$params['offset'] = $offset = ($page-1)*$pageSize; 
		
		$getList = $this->feedbackModel->getList($params);
		$data += $getList;
		$data['member_id'] = $this->getMemberId();
		$this->load->view('site/feedback',$data);
	}

	public function save(){
		


		$params['content'] = ci3_string_filter($_POST['content']);
		$params['reply_content'] = "";
		$params['member_id'] = $this->getMemberId();
		$params['ip'] = $_SERVER['REMOTE_ADDR'];

		$id = $this->feedbackModel->save($params);

		$this->cResponse();

	}

	public function delete(){

		$id = (int)ci3_decrypt($_POST['i']);
		$params['where'] = "id={$id}";
		$this->feedbackModel->delete($params);
		$this->cResponse();
	}	

	private function getMemberId(){
		$member_id = 0;
		$identity = ci3_getcookie('identity');
        if($identity){
            $member_id = $this->aes->decrypt($identity);
        }
        return $member_id;
	}	
}

