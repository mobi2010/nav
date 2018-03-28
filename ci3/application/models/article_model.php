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
		$this->params['where'] = "id=".(int)$id;
		return $this->dataFetchRow($this->params);
	}

	function getInfo($id){
		$res = $this->getRow($id);
		$tagInfo = [];
		if(!empty($res)){
			

			$res += $this->ci3Model->dataFetchRow(['table'=>$this->getContentTable($id),'where'=>'article_id='.$id]);
			$atrData = $this->ci3Model->dataFetchArray(['table'=>'article_tag_relation','where'=>'article_id='.$id,'order'=>'id asc']);
			if(!empty($atrData)){
				foreach ($atrData as $key => $value) {
					$row = $this->tagModel->getRow($value['tag_id']);
					if(!empty($row)){
						$tagInfo[$row['id']] = $row['name'];
					}
				}
			}
			$res['tags'] = $tagInfo;
			$res['categoryInfo'] = $this->tagModel->getRow($value['category_id']);
		}
		return $res;
	}

	/**
	 * 上下文
	 * @param  [type] $params [description]
	 * @return [type]         [description]
	 */
	function context($params){
		$id = $params['article_id'];
		$whereArr = [];
		$join = null;
		if($params['type'] == 1){//下一个
			$whereArr[] = "a.id>{$id}";
			$order = " order by a.id asc";
		}else{//上一个
			$whereArr[] = "a.id<{$id}";
			$order = " order by a.id desc";
		}

		if($params['category_id']){
			$whereArr[] = "a.category_id={$params['category_id']}";
		}

		if($params['tag_id']){
			$join = "left join article_tag_relation atr on a.id=atr.article_id ";
			$whereArr[] = "atr.tag_id={$params['tag_id']}";
		}

		$where = " where ".implode(" and ",$whereArr);
		$sql = "select a.id from article a {$join} {$where} {$order} limit 1";

		$row = $this->dataFetchRow(['sql'=>$sql]);
		if(empty($row)){
			return [];
		}else{
			$info = $this->getRow($row['id']);
			return $info;
		}

	}


	function getList($params=[]){

		$pageSize = $params['pageSize'];
		$offset = $params['offset'];  

		$order = $params['order'] ? $params['order'] : "a.id desc";  
		$orderBy = " order by {$order} ";

		

		$whereArr = [];

		if($params['member_id']){
			$whereArr[] = " a.member_id={$params['member_id']}";
		}

		if($params['category_id']){
			$whereArr[] = " a.category_id={$params['category_id']}";
		}

		if($params['title']){
			$whereArr[] = " a.title like '%".ci3_string_filter($params['title'])."%'";
		}

		if($params['tag_id']){
			$join = " left join article_tag_relation atr on a.id=atr.article_id ";
			$whereArr[] = "atr.tag_id={$params['tag_id']}";
		}
		
		if($params['source'] != "backend"){
			$whereArr[] = " a.status=0";
		}

		if($params['follow_member_id']){
			$followMemberIds = $this->memberModel->followMemberIds($params['follow_member_id']);
			if(!empty($followMemberIds)){
				$followMemberIdString = implode(',',$followMemberIds);
				$whereArr[] = "a.member_id in({$followMemberIdString})";
			}else{
				$res['totalCount'] = 0;
				$res['dataModel'] = [];
				return $res;
			}
		}	


		$where = empty($whereArr) ? "" : " where ".implode($whereArr,' and ');

		$sql = "select count(*) as total from article a {$join} {$where} limit 1";
		$res['totalCount'] = $this->dataFetchCount(['sql'=>$sql]);

		if($params['random'] == true){
			$sql = "select *,a.id as id from article a {$join} {$where} {$orderBy} limit 50";
			$dataModelTemp = $this->dataFetchArray(['sql'=>$sql]);
			$randData = array_rand($dataModelTemp,$pageSize);
			foreach ($randData as $key => $value) {
				$dataModel[] = $dataModelTemp[$value];
			}
		}else{
			$sql = "select *,a.id as id from article a {$join} {$where} {$orderBy} limit {$offset},{$pageSize}";
			$dataModel = $this->dataFetchArray(['sql'=>$sql]);
		}

		
		if(!empty($dataModel)){
			foreach ($dataModel as $key => $value) {
				$id = $value['id'];
				$value += $this->ci3Model->dataFetchRow(['table'=>$this->getContentTable($id),'where'=>'article_id='.$id]);
				$dataModel[$key] = $value;

			}
		}
		$res['dataModel'] = $dataModel;

		
		return $res;
	}

	function save($params=[]){
		$contentParams = [];
		foreach ($params as $key => $value) {
			if(in_array($key,['cover_image','abstract','content','video_url'])){
				$contentParams[$key] = $value;
				unset($params[$key]);
			}
		}

		$params['update_time'] = time(); 
		$this->params['data'] = $params;
		$id = $params['id'];unset($params['id']);
		if($id){
			$this->params['where'] = $id;
			$this->dataUpdate($this->params);

			if(!empty($contentParams)){
				$this->ci3Model->dataUpdate(['table'=>$this->getContentTable($id),'where'=>'article_id='.$id,'data'=>$contentParams]);
			}

		}else{
			$this->params['data']['insert_time'] = time(); 
			$id = $this->dataInsert($this->params);

			$contentParams['article_id'] = $id;
			$this->ci3Model->dataInsert(['table'=>$this->getContentTable($id),'data'=>$contentParams]);
		}
		return $id;
	}
	function delete($params=[]){
		$this->params['where'] = $params['where'];
		$res = $this->dataDelete($this->params);
		return $res;
	}

	function deleteOne($id){
		$id = (int)$id;
		
		$this->params['where'] = $id;
		$res = $this->dataDelete($this->params);

		//删除tag关系
		$this->ci3Model->dataDelete(['table'=>'article_tag_relation','where'=>"article_id={$id}"]);

		//删除评论
		$this->commentModel->delete(['article_id'=>$id,'where'=>"article_id={$id}"]);
		
		//删除内容
		$this->ci3Model->dataDelete(['table'=>$this->getContentTable($id),'where'=>"article_id={$id}"]);
		return $res;	
	}


	function addArticleTags($params=[]){
		$article_id = (int)$params['article_id'];
		$tag_type_id = (int)$params['tag_type_id'];
		$tags = $params['tags'];
		if(empty($tags) || !$article_id){
			return false;
		}

		$tagIds = [];

		foreach ($tags as $tag_name) {
			$tag_name = ci3_string_filter($tag_name);
			if(!empty($tag_name)){
				$where = "name like '{$tag_name}' and tag_type_id={$tag_type_id}";
				$tagRow = $this->ci3Model->dataFetchRow(['table'=>'tag','where'=>$where]);

				if(empty($tagRow)){
					$tag_id = $this->ci3Model->dataInsert(['table'=>'tag','data'=>['name'=>$tag_name,'tag_type_id'=>$tag_type_id]]);
				}else{
					$tag_id = $tagRow['id'];
				}
				
				$tagIds[$tag_id] = $tag_id;
			}
		}

		$where = "article_id={$article_id}";
		$atrTagIds = $this->ci3Model->dataFetchArray(['table'=>'article_tag_relation','where'=>$where,'sval'=>'tag_id']);

		//关系中存在，新tag中不存在，则删除relation
		$delTagIds = array_diff($atrTagIds,$tagIds);
		foreach ($delTagIds as $key => $value) {
			$where = "article_id={$article_id} and tag_id={$value}";
			$this->ci3Model->dataDelete(['table'=>'article_tag_relation','where'=>$where]);
		}


		//新tag中存在，关系中不存在，则创建relation
		$addTagIds = array_diff($tagIds,$atrTagIds);
		//var_dump($tagIds,$atrTagIds,$delTagIds,$addTagIds);
		foreach ($addTagIds as $key => $value) {
			$data['article_id'] = $article_id;
			$data['tag_id'] = $value;
			$this->ci3Model->dataInsert(['table'=>'article_tag_relation','data'=>$data]);
		}
		return $tagIds;
	}

	function getContentTable($article_id){
		$article_id = (int)$article_id;
		$article_id = substr($article_id,-1);
		return "article_content_{$article_id}";
	}
}	