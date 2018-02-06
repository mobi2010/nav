<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Video_Controller.php');


class Detail extends Video_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
		$this->load->model('Category_model', 'categoryModel');//服务
	}
	public function index()
	{	
		$id = (int)$_GET['id'];
		if($id){
			$dataModel = $this->videoModel->getRow($id);
			$dataModel['views'] = $dataModel['views'] + 1;
			$this->videoModel->save(['id'=>$id,'views'=>$dataModel['views']]);
			$data['dataModel'] = $dataModel;
		}
		$this->load->view('video/detail',$data);
	}	
	
}