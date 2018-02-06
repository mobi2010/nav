<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Article_Controller.php');


class Detail extends Article_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
		$this->load->model('Category_model', 'categoryModel');//服务
	}
	public function index()
	{	
		$id = (int)$_GET['id'];
		if($id){
			$dataModel = $this->articleModel->getRow($id);
			$dataModel['views'] = $dataModel['views'] + 1;
			$this->articleModel->save(['id'=>$id,'views'=>$dataModel['views']]);
			$data['dataModel'] = $dataModel;
		}
		$this->load->view('article/detail',$data);
	}	
	
}