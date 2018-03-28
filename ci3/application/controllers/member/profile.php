<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require('Article_Controller.php');


class Profile extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));
	}

	public function index()
	{	
	
		$id = (int)ci3_decrypt($_GET['m']);
        if($id){
        	$page = (int)$_GET['page'];
			$page = $page > 0 ? $page : 1;
			$params['pageSize'] = $data['pageSize'] = $pageSize = 8;
			$params['offset'] = $offset = ($page-1)*$pageSize; 
			$params['member_id'] = $id;
            $data['dataModel'] = $dataModel = $this->memberModel->getInfo($id);

            $data['articleData'] = $this->articleModel->getList($params);
            $data['m'] = $_GET['m'];

            $data['followStatus'] = $this->memberModel->followStatus($this->userId,$id);

            $data['htmlTitle'] = 'iav18-'.$dataModel['nickname']; 
            $data['htmlKeywords'] = $dataModel['biography'] ? $dataModel['biography'] :  "iav18"; 
        }
		$this->load->view('member/profile',$data);
	}

	public function follow(){

		$id = (int)ci3_decrypt($_POST['m']);

        if(!$this->userId){
            $this->cResponse(['code'=>'10000','message'=>'Please log in first']);
        }

        if($id){
            $followStatus = $this->memberModel->followStatus($this->userId,$id);
            if(in_array($followStatus,['none','followed'])){
            	$res = $this->memberModel->follow($this->userId,$id);
                if($res == '20001'){
                    $this->cResponse(['code'=>'10000','message'=>'Follow upper limit 100']);
                }
            }
            $this->cResponse();
        }else{
        	$this->cResponse(['code'=>'10000','message'=>'Data error']);
        }
	}	
	public function unfollow(){
		$id = (int)ci3_decrypt($_POST['m']);
        if(!$this->userId){
            $this->cResponse(['code'=>'10000','message'=>'Please log in first']);
        }
        if($id){
            $this->memberModel->unfollow($this->userId,$id);
            $this->cResponse();
        }else{
        	$this->cResponse(['code'=>'10000','message'=>'Data error']);
        }
	}


}	