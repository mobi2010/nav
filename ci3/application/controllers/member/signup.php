<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require('Article_Controller.php');


class Signup extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
	}

	public function index()
	{	
	
		$identity = ci3_getcookie('identity');
        if($identity){
            $id = $this->aes->decrypt($identity);
            $data['dataModel'] = $this->memberModel->getInfo($id);
        }

		$this->load->view('member/signup',$data);
	}

	public function check(){
		

		$id = $this->userId;    

		if($_POST['username']){
			$username = ci3_string_filter($_POST['username']);
			$row = $this->memberModel->getRow("username like '{$username}'");
			if($row['id'] && $row['id'] != $id){
				$this->cResponse(['code'=>'10000','message'=>'Username has been occupied']);
			}
		}
		if($_POST['email']){
			$email = ci3_string_filter($_POST['email']);
			$row = $this->memberModel->getRow("email like '{$email}'");
			if($row['id'] && $row['id'] != $id){
				$this->cResponse(['code'=>'10000','message'=>'Email has been occupied']);
			}
		}
		$this->cResponse();
	}

	public function save(){

		$id = null;
		$identity = ci3_getcookie('identity');
        $params['id'] = $this->userId;    

		if($_FILES['Filedata']['tmp_name']){
			$uploadImg = $this->image->upload();
			$thumbImg = $this->image->thumb(array('file'=>$uploadImg['filePath'],'width'=>80,'height'=>80,'bgcolor'=>'white'));
			$avatar_url = $thumbImg['filePath'];
		}else{
			$avatar_url = $_POST['avatar_url'];
		}

		$params['username'] = ci3_string_filter($_POST['username']);
		$params['password'] = ci3_string_filter($_POST['password']);
		$params['email'] = ci3_string_filter($_POST['email']);
		$params['avatar_url'] = $avatar_url;
		$params['gender'] = intval($_POST['gender']);
		$params['biography'] = ci3_string_filter($_POST['biography']);
		$params['ip'] = $_SERVER['REMOTE_ADDR'];
		$id = $this->memberModel->save($params);
		if($id){
			$this->ci3SetCookie($id);
		}

		redirect('member/account/profile');
	}
}