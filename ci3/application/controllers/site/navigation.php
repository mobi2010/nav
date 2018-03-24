<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require('Article_Controller.php');


class Navigation extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
		//配置参数
		// $this->initData['navData'] = require(APPPATH.'/config/nav_data.php');
		// $this->load->vars('initData',$this->initData);//映射到模板
	
	}
	public function index()
	{	
		$data = [];
		$ncInfo = $this->navModel->getMoreCategory(['field'=>'id,name','where'=>'status=0']);
		if(!empty($ncInfo)){
			
			foreach ($ncInfo as $key => $value) {
				$value['sub'] = $this->navModel->getMore(['field'=>'id,name','where'=>'nav_category_id='.$value['id']]);
				$navData[] = $value;
			}
			$data['navData'] = $navData;
		}
		$this->load->view('site/nav',$data);
	}

	public function dis(){
		if($_GET['u']){
			$id = (int)ci3_decrypt($_GET['u']);
			$row = $this->navModel->getRow($id);
			if(!empty($row)){
				$sql = "update nav_category set hits=hits+1 where id={$row['nav_category_id']} limit 1";
				$this->ci3Model->query($sql);
				$this->navModel->save(['id'=>$id,'hits'=>$row['hits']+1]);
				redirect($row['uri']);
			}

		}
		redirect('index');
	}

}

