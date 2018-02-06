<?php
/**
 * 文件类
 * @author zsc <zuoshichao@getarts.cn> 
 * @version (1.0) 2013/12/11
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File {
	public $uploadFilePath = './tmp';//上传图片地址
	public $fileExt;//允许的文件格式
	public $fileSize;//字节，默认10M
	public function __construct()
    {
    	$this->fileExt = array('.jpg','.png','.jpeg','.gif','.bmp');
    	$this->fileSize = 10*1024*1024;
    }    
    /**
     * [文件名]
     * @param  [type] $filename [description]
     * @return [type]           [description]
     */
    private function fileName($filename=null){
    	if($filename){return $filename;}
    	$mics = explode(' ', microtime());
		return $mics[1].str_replace('0.', '', $mics[0]);
    }
    /**
     * [上传的文件路径]
     * @param  [type]  $filepath [description]
     * @param  boolean $isdata   [description]
     * @return [type]            [description]
     */
    private function filePath($filepath=null,$isdata=true){
    	$filepath .= $isdata ? '/'.date('Y').'/'.date('m').'/'.date('d').'/' : null;
    	return $filepath;
    }    
     /**
     * [文件访问路径]
     * @param  [type]  $filepath [description]
     * @param  boolean $isdata   [description]
     * @return [type]            [description]
     */
    private function fileUri($filePath){
		return 'http://'.$_SERVER['HTTP_HOST'].substr($filePath,1);
    } 
    /**
     * [文件后缀]
     * @param  [type] $file [description]
     * @return [type]       [description]
     */
    private function fileExt($file){
    	$str = strtolower(strrchr($file,'.'));
        return $str;
    }
    /**
     * [普通上传-本地服务器]
     * @param  array  $params [description]
     * fileName //[选填] 要生成图片名，默认时间戳
     * fileKey  //[选填] file控件名，默认Filedata
     * fileExt  //[选填]允许的图片格式，默认array('.jpg','.png','.jpeg')
     * @return [type]         [description]
     * error 0 成功 1 错误
     * msg 描述
     * filePath 文件路径
     * width  宽
     * height 高
     */
    function upload($params=array()){    
    	$fileKey = $params["fileKey"] ? $params["fileKey"] : 'Filedata';    			
		$fileSize = $_FILES[$fileKey]['size'];//文件大小
		if($fileSize > $this->fileSize){
	    	$res['msg'] = '文件过大!';
			return $res;
	    }
		$tempFile = $_FILES[$fileKey]['tmp_name'];//临时文件		
		$uploadFileName = $_FILES[$fileKey]['name'];//上传的文件名				
	    $fileExtStr = $this->fileExt($uploadFileName); //文件.jpg 后缀
	  //  $fileExt = empty($params['fileExt']) ? $this->fileExt : $params['fileExt'];//允许的文件格式		
	  //   if(!in_array($fileExtStr, $fileExt)){
	  //   	$res['msg'] = $fileExt.'文件不合法!'.$fileExtStr;
			// return $res;
	  //   }
	    //文件路径
	    $filePath = $this->filePath($this->uploadFilePath);
	    //尝试创建目标文件夹，如果它不存在，
		if(!is_dir($filePath)) {
			if(!mkdir($filePath,0777,true)){
				$res['msg'] = "The destination directory could not be created.";
				return $res;
			}
		}
		//文件名称		
		$fileName = $this->fileName($params['fileName']).$fileExtStr;
		$filePath .= $fileName;
	    if(move_uploaded_file($tempFile,$filePath)){
	    	$res['status'] = 200;	
	    	$res['filePath'] = $this->fileUri($filePath);	    	
	    	$res['msg'] = '上传成功';    	
	    }else{
	    	$res['status'] = 500;	
	    	$res['msg'] = '上传失败';	
	    }
	    $res['fileName'] = $uploadFileName;
		return $res;

    }
    
	/**
	 * [通过二进制创建图片]
	 * @return [type] [description]
	 */
	function cImgByByte($params=array()) {
		$byteFile = $params['byteFile'];
		$res['status'] = 403;
		$fileTypes = array(
			255216 	=> '.jpg',
		 	7173 	=> '.gif',
		 	6677 	=> '.bmp',
		 	13780	=> '.png'
		);
		$bin = substr($byteFile, 0,2); 
		$strInfo = unpack("C2chars", $bin);
		$typeCode = intval($strInfo['chars1'].$strInfo['chars2']);

		if(!isset($fileTypes[$typeCode])){
		 	$res['msg'] = 'Illegal file';
		 	return $res;
		}
			
		$filePath = $this->filePath($this->uploadFilePath);			
		if(!is_dir($filePath)) {
			if(!mkdir($filePath,0777,true)){
				$res['msg'] = "The destination directory could not be created.";
				return $res;
			}
		}
		
		$cfile = $filePath.$this->fileName().$fileTypes[$typeCode];
		$upload = file_put_contents($cfile, $byteFile);
		if(!$upload){
			$res['msg'] = "Upload Failed";
			return $res;
		}
		$filesize = filesize($cfile);
        if($filesize > 10*1024*1024){
            $res['msg'] = 'File is less than 10M';
            return $res;
        }
        $res['status'] = 200;
		$res['data'] = $cfile;
		$res['msg'] = 'Success';		
		return $res;
	}
}