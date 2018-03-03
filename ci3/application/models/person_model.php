<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person_model extends MY_Model {		
	public $table = 'person';	
	public $params;
	function __construct()
	{
		parent::__construct();
		$this->params['table'] = $this->table;
	}
	function getRow($id){
		$this->params['where'] = "id=".(int)$id;
		return $this->dataFetchRow($this->params);
	}

	function getInfo($id){
		$res = $this->getRow($id);
		if(!empty($res)){
			//get identity
			$personIdentity = [];
			$identityParams['table'] = 'person_identity';
			$identityParams['where'] = "person_id={$id}";
			$personIdentityList = $this->dataFetchArray($identityParams);
			if(!empty($personIdentityList)){
				foreach ($personIdentityList as $key => $value) {
					$tagData = $this->dataFetchRow(['table'=>'tag','where'=>$value['tag_id']]);
					$personIdentity[$value['tag_id']]= $tagData['name'];
				}
			}
			//get avatar
			$avatarParams['table'] = 'person_avatar';
			$avatarParams['where'] = "person_id={$id}";
			$personAvatar = $this->dataFetchArray($avatarParams);
		}

		$res['personIdentity'] = empty($personIdentity) ? [] : $personIdentity;
		$res['personAvatar'] = empty($personAvatar) ? [] : $personAvatar;

		return $res;
	}

	function getList($params=[]){
		$this->params = $this->params + $params;
		$res['totalCount'] = $this->dataFetchCount($this->params);
		$res['dataModel'] = $this->dataFetchArray($this->params);
		return $res;
	}

	function save($params=[]){
		$params['update_time'] = time(); 
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
	function delete($params=[]){
		$this->params['where'] = $params['where'];
		$res = $this->dataDelete($this->params);
		return $res;
	}
}	