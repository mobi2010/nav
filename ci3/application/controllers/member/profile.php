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
            $data['dataModel'] = $this->memberModel->getRow($id);

            $data['articleData'] = $this->articleModel->getList($params);
        }

		$this->load->view('member/profile',$data);
	}	
}	