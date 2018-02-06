<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends MY_Model {		
	public $table = 'article';	
	public $params;
	function __construct()
	{
		parent::__construct();
		$this->params['table'] = $this->table;
	}
	function getRow($id){
		$this->params['where'] = (int)$id;
		return $this->dataFetchRow($this->params);
	}
	function getList($params=[]){
		$this->params = $this->params + $params;
		$res['totalCount'] = $this->dataFetchCount($this->params);
		$res['dataModel'] = $this->dataFetchArray($this->params);
		return $res;
	}

	function save($params=[]){
		$params['update_time'] = time(); 
		$id = $params['id'];unset($params['id']);
		$this->params['data'] = $params;
		if($id){
			$this->params['where'] = $id;
			$this->dataUpdate($this->params);
		}else{
			$id = $this->dataInsert($this->params);
		}
		return $id;
	}
	function delete($params=[]){
		$this->params['where'] = $params['where'];
		$res = $this->dataDelete($this->params);
		return $res;
	}
}	