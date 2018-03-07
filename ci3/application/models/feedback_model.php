<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_model extends MY_Model {		
	public $table = 'feedback';	
	public $params;
	function __construct()
	{
		parent::__construct();
		$this->params['table'] = $this->table;
	}

	function getList($params=[]){
		$pageSize = $params['pageSize'];
		$offset = $params['offset'];  
		$this->params = $this->params + $params;
		$res['totalCount'] = $this->dataFetchCount($this->params);
		$this->params['order'] = $params['order'] ? $params['order'] : "id desc";
		$this->params['limit'] = "{$offset},{$pageSize}";
		$dataModel = $this->dataFetchArray($this->params);
		$res['dataModel'] = $dataModel;
		return $res;
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
			$this->params['data']['insert_time'] = time(); 
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