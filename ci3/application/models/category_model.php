<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MY_Model {		
	public $table = 'category';	
	public $params;
	function __construct()
	{
		parent::__construct();
		$this->params['table'] = $this->table;
	}

	function getList($params=[]){
		$this->params = $this->params + $params;
		$res['totalCount'] = $this->dataFetchCount($this->params);
		$this->params['order'] = "sort_id asc";
		$res['dataModel'] = $this->dataFetchArray($this->params);
		return $res;
	}

	function getData($type=0){
		if($type){
			$this->params['where']='type='.$type;
		}
		$this->params['skey']='id';
		$this->params['sval']='name';
		return $this->dataFetchArray($this->params);
	}
	function getRow($id){
		$this->params['where'] = (int)$id;
		return $this->dataFetchRow($this->params);
	}

	function save($params=[]){
		$this->params['data'] = $params;
		$id = $params['id'];unset($params['id']);
		if($id){
			$this->params['where'] = $id;
			$this->dataUpdate($this->params);
		}else{
			$id = $this->dataInsert($this->params);
		}
		return $id;
	}

	function update($params){
		$this->params['where'] = $params['where'];
		$this->params['data'] = $params['data'];
		return $this->dataUpdate($this->params);
	}
	function delete($params=[]){
		$this->params['where'] = $params['where'];
		$res = $this->dataDelete($this->params);
		return $res;
	}
}	