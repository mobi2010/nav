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
            $data['dataModel'] = $this->memberModel->getRow($id);
        }

		$this->load->view('member/profile',$data);
	}	
}	