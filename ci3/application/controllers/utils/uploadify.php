<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 上传
 *
 * @author by zsc
 */
class Uploadify extends MY_Controller {	
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		
	}
	function ueditor(){
		$res['state'] = 'SUCCESS';
		$uploadImg = $this->image->upload(array('fileKey'=>'upfile'));	
		if(!$uploadImg['filePath']){
			$this->cResponse($res);
		}
		$imgInfo = getimagesize($uploadImg['filePath']);
		$width = $imgInfo[0];
		if($width<700){//直接输出
			$file = $uploadImg['filePath'];
		}else{
			$thumbImg = $this->image->thumb(array('file'=>$uploadImg['filePath'],'width'=>700,'height'=>1500));
			$file = $thumbImg['filePath'];
		}	
		if(!$file){
			$this->cResponse($res);
		}	
		//$ypyImg = $this->image->ypyUpload(array('file'=>$file));
		$res['url'] = $file;//$ypyImg['filePath']."!m01";
		echo json_encode($res);
		//$this->cResponse($res);
	}
	/**
	 * [头像]
	 * @return [type] [description]
	 */
	function avatar(){
		$uploadImg = $this->image->upload();
		$thumbImg = $this->image->thumb(array('file'=>$uploadImg['filePath'],'width'=>120,'height'=>120,'bgcolor'=>'black'));
		$res['data'] = $thumbImg['filePath'];
		$this->cResponse($res);
	}
	/**
	 * [原图]
	 * @return [type] [description]
	 */
	function image(){
		$uploadImg = $this->image->upload();	
		$res['data'] = $uploadImg['filePath'];
		$this->cResponse($res);
	}	
	/**
	 * [房产图片]
	 * @return [type] [description]
	 */
	function propertyImg(){
		$uploadImg = $this->image->upload();	
		$imgInfo = getimagesize($uploadImg['filePath']);
		$width = $imgInfo[0];
		//$sourceImageheight = $imgInfo[1];
		if($width<900){//直接输出
			$res['data'] = $uploadImg['filePath'];
			$this->cResponse($res);
		}
		$thumbImg = $this->image->thumb(array('file'=>$uploadImg['filePath'],'width'=>900));
		$res['data'] = $thumbImg['filePath'];
		$this->cResponse($res);
	}
	/**
	 * [文字图片]
	 * @return [type] [description]
	 */
	function textImage(){
		$text = $_GET['text'];
		if($text){			
			echo $this->image->textImage(array('text'=>$this->gycrypt->decrypt($text)));
		}
		
	}
}