<?php
/**
 * 图片类
 * @author zsc <zuoshichao@pinery.cn> 
 * @version (1.0) 2013/12/11
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image {
	public $uploadImagePath = './assets/iv/images/original';//上传图片地址
	public $cropImagePath = './assets/iv/images/crop';//切图图片地址
	public $thumbImagePath = './assets/iv/images/thumb';//缩略图地址
	public $fileExt;//允许的文件格式
	public $fileSize;//字节，默认10M
	public function __construct()
    {
    	$this->fileExt = array('.jpg','.png','.jpeg','.gif','.bmp');
    	$this->fileSize = 10*1024*1024;
    }
    /**
     * 扩展信息
     */
    private function expand($file){
		list($width,$height) = getimagesize($file);
		$res['width'] = $width;
		$res['height'] = $height;
		return $res;
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
     * [源文件地址]
     * @param  [type]  $filepath [description]
     * @param  boolean $isdata   [description]
     * @return [type]            [description]
     */
    private function imageFilePath($filepath){
    	if($imagePath = strstr($filepath, '/tmp')){
    		$filepath = '.'.$imagePath;
    	}
    	return $filepath;
    }
    /**
     * [显示的图片路径]
     * @return [type] [description]
     */
    private function imagePath($filePath){
		return 'http://'.$_SERVER['HTTP_HOST'].substr($filePath,1);
    }
    /**
     * [文件后缀]
     * @param  [type] $file [description]
     * @return [type]       [description]
     */
    private function fileExt($file){
    	$str = strtolower(strrchr($file,'.'));
    	$str = stripos($str,'!') ? strstr($str, '!', true) : $str;
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
    function mutilUpload($params=array()){    
    	$res['error'] = 1;
    	$fileKey = $params["fileKey"] ? $params["fileKey"] : 'Filedata';    			
		$fileSizeArr = $_FILES[$fileKey]['size'];//文件大小
		foreach ($fileSizeArr as $index => $fileSize) {


			if($fileSize > $this->fileSize){
		    	$res['msg'] = '文件过大!';
				return $res;
		    }
			$tempFile = $_FILES[$fileKey]['tmp_name'][$index];//临时文件		
			$uploadFileName = $_FILES[$fileKey]['name'][$index];//上传的文件名		
			$fileExt = empty($params['fileExt']) ? $this->fileExt : $params['fileExt'];//允许的文件格式		
		    $fileExtStr = $this->fileExt($uploadFileName); //文件.jpg 后缀
		    if(!in_array($fileExtStr, $fileExt)){
		    	$res['msg'] = '文件不合法!'.$fileExtStr;
				return $res;
		    }
		    //文件路径
		    $filePath = $this->filePath($this->uploadImagePath);
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
			//$res = $this->expand($tempFile);
		    if(move_uploaded_file($tempFile,$filePath)){
		    	$res['error'] = 0;	
		    	$res['filePath'] = $this->imagePath($filePath);	    	
		    	$res['msg'] = '上传成功';    	
		    }else{
		    	$res['msg'] = '上传失败';	
		    }
		    $res['fileName'] = $uploadFileName;
		    $data[] = $res;
		}
		
		return $data;

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
    	$res['error'] = 1;
    	$fileKey = $params["fileKey"] ? $params["fileKey"] : 'Filedata';    			
		$fileSize = $_FILES[$fileKey]['size'];//文件大小
		if($fileSize > $this->fileSize){
	    	$res['msg'] = '文件过大!';
			return $res;
	    }
		$tempFile = $_FILES[$fileKey]['tmp_name'];//临时文件		
		$uploadFileName = $_FILES[$fileKey]['name'];//上传的文件名		
		$fileExt = empty($params['fileExt']) ? $this->fileExt : $params['fileExt'];//允许的文件格式		
	    $fileExtStr = $this->fileExt($uploadFileName); //文件.jpg 后缀
	    if(!in_array($fileExtStr, $fileExt)){
	    	$res['msg'] = '文件不合法!'.$fileExtStr;
			return $res;
	    }
	    //文件路径
	    $filePath = $this->filePath($this->uploadImagePath);
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
		//$res = $this->expand($tempFile);
	    if(move_uploaded_file($tempFile,$filePath)){
	    	$res['error'] = 0;	
	    	$res['filePath'] = $this->imagePath($filePath);	    	
	    	$res['msg'] = '上传成功';    	
	    }else{
	    	$res['msg'] = '上传失败';	
	    }
	    $res['fileName'] = $uploadFileName;
		return $res;

    }
    /**
	 * [缩图]
	 * @param  array  $params [description]
	 * file 	        [必填]源图片
	 * height           [必填]要生成图片的高
	 * width            [必填]要生成图片的宽	
	 * scale            [选填]按比例缩图，默认true
	 * bgcolor			[选填]背景颜色,(white,black,gray)，默认原图
	 * @return [type]         [description]
	 */
	function thumb($params=array()){
		$res['error'] = 1;
		$createImagePath = $this->filePath($this->thumbImagePath); //存放图片路径
		$sourceImage = $this->imageFilePath($params['file']);//源图片
		$width = intval($params['width']);//宽
		$height = intval($params['height']);//高		
		$bgcolor = $params['bgcolor'];
		$src_x = 0; //设定载入图片要载入的区域x坐标
		$src_y = 0; //设定载入图片要载入的区域y坐标
		$dst_x = 0; //设定需要载入的图片在新图中的x坐标
		$dst_y = 0; //设定需要载入的图片在新图中的y坐标
		$scale = $params['scale'] == 'false' ? false : true;//按比例
		// if(!$width || !$height){
		// 	$res['msg'] = 'Some of the required parameters are missing.';
		// 	return $res;
		// }
		//验证GD库
		if(! extension_loaded('gd')){
			$res['msg'] =  "The GD extension is not installed on the server.";
			return $res;
		}

		//确保源文件存在
		// if(!file_exists($sourceImage)) {
		// 	$res['msg'] =  "The source image file could not be found.";
		// 	return $res;
		// }

		//尝试创建目标文件夹，如果它不存在，
		if(!is_dir($createImagePath)) {
			if(!mkdir($createImagePath,0777,true)){
				$res['msg'] =  "The destination directory could not be created.";
				return $res;
			}
		}

		//确保目标文件夹是可写的
		if(!is_writable($createImagePath)){
			$res['msg'] = "The server does not have permission to write in the destination folder.";
			return $res;
		}

		//要创建的文件名和后缀
		$extension = $this->fileExt($sourceImage); 
		$fileExt = empty($params['fileExt']) ? $this->fileExt : $params['fileExt'];//允许的文件格式		
	  //   if(!in_array($extension, $fileExt)){
	  //   	$res['msg'] = '文件不合法!';
			// return $res;
	  //   }

		$thumb = $this->fileName() . $extension;

		//要创建的文件和路径
		$target_file = $createImagePath . $thumb;
		//源图片信息
		$info = @getimagesize($sourceImage);
		if(!$info){
			return false;
		}
		$sourceImageWidth = $info[0];
		$sourceImageheight = $info[1];
		if(!$info){
			$res['msg'] = "The file type is not supported.";
			return $res;
		}

		//我们使用GD库加载图像，使用文件扩展名来选择合适的功能
		// 返回一图像标识符，代表了从给定的文件名取得的图像
		switch($info[2]) {
			case IMAGETYPE_GIF:
				if(!$source_image = @imagecreatefromgif($sourceImage)){					
					$res['msg'] = "Could not open GIF file.";
					return $res;
				}
				break;
			case IMAGETYPE_PNG:
				if(!$source_image = @imagecreatefrompng($sourceImage)){
					$res['msg'] = "Could not open PNG file.";
					return $res;
				}
				break;
			case IMAGETYPE_JPEG:
				if(!$source_image = @imagecreatefromjpeg($sourceImage)){
					$res['msg'] = "Could not open JPG file.";
					return $res;
				}
				break;
			default:
				$res['msg'] = "The file type is not supported.";
				return $res;
				break;
		}
		if($scale == false){//比例
			$dest_width = $width;
			$dest_height = $height;		
		}else{
			//计算基于所选择的区域和最小值的新的大小		
			// if($sourceImageWidth > $sourceImageheight) {//宽大于高
			// 	$dest_width = $width;
			// 	$dest_height = round($sourceImageheight*$width/$sourceImageWidth);
			// 	$dst_y = $bgcolor ? round(($height-$dest_height)/2) : $dst_y;
			// } else {//高大于宽
			// 	$dest_width = round($sourceImageWidth*$height/$sourceImageheight);
			// 	$dest_height = $height;
			// 	$dst_x = $bgcolor ? round(($width-$dest_width)/2) : $dst_x;
			// }		
			if(($width/$sourceImageWidth) < ($height/$sourceImageheight)) {//定宽
				$dest_width = $width;
				$dest_height = round($sourceImageheight*$width/$sourceImageWidth);
				$dst_y = $bgcolor ? round(($height-$dest_height)/2) : $dst_y;
			} else {//定高
				$dest_width = round($sourceImageWidth*$height/$sourceImageheight);
				$dest_height = $height;
				$dst_x = $bgcolor ? round(($width-$dest_width)/2) : $dst_x;
			}	
		}		
		if($bgcolor){//背景颜色
			//$dest_image = imagecreate($width,$height);			
			$dest_image = imagecreatetruecolor($width,$height);
			if($bgcolor == 'black'){//黑
				$imgbgcolor = imagecolorallocate($dest_image, 0, 0, 0);
			}elseif($bgcolor == "gray"){//灰
				$imgbgcolor = imagecolorallocate($dest_image, 200, 200, 200);
			}else{//白
				$imgbgcolor = imagecolorallocate($dest_image, 255, 255, 255);
			}		
			imagefill($dest_image, 0, 0, $imgbgcolor);//填充颜色
		}else{
			//我们产生上述计算的大小的新图像对象
			if(!$dest_image = imagecreatetruecolor($dest_width, $dest_height)){
				$res['msg'] = "Could not create new image from source file.";
				return $res;
			}
			//保持透明GIF和PNG
			if($info[2]==IMAGETYPE_GIF||$info[2]==IMAGETYPE_PNG){
				if($info[2]==IMAGETYPE_PNG){			
					imageAntiAlias($dest_image,true);//对线段和多边形启用快速画图抗锯齿方法
				}
				//imagecolorallocatealpha的行为和 imagecolorallocate() 相同，但多了一个额外的透明度参数 alpha，其值从 0 到 127。0 表示完全不透明，127 表示完全透明。
				$color = imagecolorallocatealpha($dest_image, 0, 0, 0,127); 	
				//将 image 图像中的透明色设定为 color
				imagecolortransparent($dest_image, $color);
				imagealphablending($dest_image, false);// 允许在真彩色图像上使用两种不同的绘画模式
				imagesavealpha($dest_image, true);//设置标记以在保存 PNG 图像时保存完整的 alpha 通道信息（与单一透明色相反）
			}
		}
		//拷贝图像
		if(!imagecopyresampled($dest_image, $source_image, $dst_x, $dst_y, $src_x, $src_y, $dest_width, $dest_height, $sourceImageWidth, $sourceImageheight)){
			$res['msg'] = "Could not crop the image with the provided coordinates.";
			return $res;
		}

		//生成图片
		$quality = 80;//范围从 0（最差质量，文件更小）到 100（最佳质量，文件最大）。默认为 IJG 默认的质量值（大约 75）。 
		switch($info[2]) {
			case IMAGETYPE_GIF:
				if(!imagegif($dest_image, $target_file)){
					$res['msg'] = "Could not save GIF file.";
					return $res;
				}
				break;
			case IMAGETYPE_PNG:
				if(!imagepng($dest_image, $target_file, max(9 - floor($quality/10),0))){
					$res['msg'] = "Could not save PNG file.";
					return $res;
				}
				break;
			case IMAGETYPE_JPEG:
				if(!imagejpeg($dest_image, $target_file, $quality)){
					$res['msg'] = "Could not save JPG file.";
					return $res;
				}
				break;
		}
		//释放与 image 关联的内存
		imagedestroy($dest_image);
		imagedestroy($source_image);
		$res['error'] = 0;
		$res['filePath'] = $this->imagePath($target_file);
		$res['msg'] = "success";
		$res['width'] = $dest_width;
		$res['height'] = $dest_height;
		$res['fileName'] = $params['fileName'];
		return $res;
	}
	/**
	 * [切图]
	 * @param  array  $params [description]
	 * file 	        [必填]源图片
	 * height           [必填]要生成图片的高
	 * width            [必填]要生成图片的宽
	 * top 			    [选填]top偏移,默认0
	 * left			    [选填]left偏移,默认0
	 * maxWidth			[选填]最大宽度,默认width值
	 * maxHeight		[选填]最大高度,默认height值
	 * @return [type]         [description]
	 */
	function crop($params=array()){
		$res['error'] = 1;
		$createImagePath = $this->filePath($this->cropImagePath); //存放图片路径
		$sourceImage = $this->imageFilePath($params['file']);//源图片
		$top = isset($params['top']) ? intval($params['top']) : 0;//top 偏移
		$left = isset($params['left']) ? intval($params['left']) : 0;//left 偏移
		$width = intval($params['width']);//宽
		$height = intval($params['height']);//高
		$maxWidth = isset($params['maxWidth']) ? intval($params['maxWidth']) : $width;//最大宽
		$maxHeight = isset($params['maxHeight']) ? intval($params['maxHeight']) : $height;//最大高		


		if(!$width || !$height){
			$res['msg'] = 'Some of the required parameters are missing.';
			return $res;
		}	
		//验证GD库
		if(! extension_loaded('gd')){
			$res['msg'] =  "The GD extension is not installed on the server.";
			return $res;
		}

		//确保源文件存在
		if(!file_exists($sourceImage)) {
			$res['msg'] =  "The source image file could not be found.";
			return $res;
		}

		//尝试创建目标文件夹，如果它不存在，
		if(!is_dir($createImagePath)) {
			if(!mkdir($createImagePath,0777,true)){
				$res['msg'] =  "The destination directory could not be created.";
				return $res;
			}
		}

		//确保目标文件夹是可写的
		if(!is_writable($createImagePath)){
			$res['msg'] = "The server does not have permission to write in the destination folder.";
			return $res;
		}

		//要创建的文件名和后缀
		$extension = $this->fileExt($sourceImage); 
		$fileExt = empty($params['fileExt']) ? $this->fileExt : $params['fileExt'];//允许的文件格式		
	    if(!in_array($extension, $fileExt)){
	    	$res['msg'] = '文件不合法!';
			return $res;
	    }

		$thumb = $this->fileName() . $extension;

		//要创建的文件和路径
		$target_file = $createImagePath . $thumb;
		//源图片信息
		$info = getimagesize($sourceImage);
		if(!$info){
			$res['msg'] = "The file type is not supported.";
			return $res;
		}

		//我们使用GD库加载图像，使用文件扩展名来选择合适的功能
		// 返回一图像标识符，代表了从给定的文件名取得的图像
		switch($info[2]) {
			case IMAGETYPE_GIF:
				if(!$source_image = imagecreatefromgif($sourceImage)){					
					$res['msg'] = "Could not open GIF file.";
					return $res;
				}
				break;
			case IMAGETYPE_PNG:
				if(!$source_image = imagecreatefrompng($sourceImage)){
					$res['msg'] = "Could not open PNG file.";
					return $res;
				}
				break;
			case IMAGETYPE_JPEG:
				if(!$source_image = imagecreatefromjpeg($sourceImage)){
					$res['msg'] = "Could not open JPG file.";
					return $res;
				}
				break;
			default:
				$res['msg'] = "The file type is not supported.";
				return $res;
				break;
		}

		//计算基于所选择的区域和最小值的新的大小
		if($width > $height) {
			$dest_width = $maxWidth;
			$dest_height = round($maxWidth*$height/$width);
		} else {
			$dest_width = round($maxHeight*$width/$height);
			$dest_height = $maxHeight;
		}

		//我们产生上述计算的大小的新图像对象
		if(!$dest_image = imagecreatetruecolor($dest_width, $dest_height)){
			$res['msg'] = "Could not create new image from source file.";
			return $res;
		}

		//保持透明GIF和PNG
		if($info[2]==IMAGETYPE_GIF||$info[2]==IMAGETYPE_PNG){
			if($info[2]==IMAGETYPE_PNG){			
				//imageAntiAlias($dest_image,true);//对线段和多边形启用快速画图抗锯齿方法
			}
			//imagecolorallocatealpha的行为和 imagecolorallocate() 相同，但多了一个额外的透明度参数 alpha，其值从 0 到 127。0 表示完全不透明，127 表示完全透明。
			$color = imagecolorallocatealpha($dest_image, 0, 0, 0,127); 	
			//将 image 图像中的透明色设定为 color
			imagecolortransparent($dest_image, $color);
			imagealphablending($dest_image, false);// 允许在真彩色图像上使用两种不同的绘画模式
			imagesavealpha($dest_image, true);//设置标记以在保存 PNG 图像时保存完整的 alpha 通道信息（与单一透明色相反）
		}

		//拷贝图像
		if(!imagecopyresampled($dest_image, $source_image, 0, 0, $left, $top, $dest_width, $dest_height, max($width, $maxWidth), max($height, $maxHeight))){
			$res['msg'] = "Could not crop the image with the provided coordinates.";
			return $res;
		}

		//生成图片
		$quality = 80;//范围从 0（最差质量，文件更小）到 100（最佳质量，文件最大）。默认为 IJG 默认的质量值（大约 75）。 
		switch($info[2]) {
			case IMAGETYPE_GIF:
				if(!imagegif($dest_image, $target_file)){
					$res['msg'] = "Could not save GIF file.";
					return $res;
				}
				break;
			case IMAGETYPE_PNG:
				if(!imagepng($dest_image, $target_file, max(9 - floor($quality/10),0))){
					$res['msg'] = "Could not save PNG file.";
					return $res;
				}
				break;
			case IMAGETYPE_JPEG:
				if(!imagejpeg($dest_image, $target_file, $quality)){
					$res['msg'] = "Could not save JPG file.";
					return $res;
				}
				break;
		}
		//释放与 image 关联的内存
		imagedestroy($dest_image);
		imagedestroy($source_image);
		$res['error'] = 0;
		$res['filePath'] = $this->imagePath($target_file);
		$res['msg'] = "success";
		$res['width'] = $dest_width;
		$res['height'] = $dest_height;
		$res['fileName'] = $params['fileName'];
		return $res;
	}
     /**
      * [又拍云-上传]
      * @param  array  $params [description]
      * $params['file'] 	//[选填]图片文件,默认$_FILES[$fileKey]['tmp_name']
      * $params['fileExt']  //[选填]允许的图片格式，默认array('.jpg','.png','.jpeg')
      * $params['fileName'] //[选填]图片名称，带后缀，默认时间戳
      * fileKey 			//[选填] file控件名，默认Filedata
      * $params['fileKey'] 	//[选填] file控件名，默认Filedata
      * @return [array]         [description]
      * $res['error'] //0成功1错误
      * $res['msg']   //描述
      * $res['filePath']  //新的文件路径
      */
    function ypyUpload($params=array()){
    	$res = null;
    	$res['error'] = 1;
    	$fileKey = $params["fileKey"] ? $params["fileKey"] : 'Filedata';
    	require_once(APPPATH.'third_party/upyun.class.php');
    	try {
    		if($params['file']){//图片文件
    			$tempFile = $this->imageFilePath($params['file']);
    			$uploadFileName = $params['fileName'] ? $params['fileName'] : $tempFile;
    			$fileSize = filesize($tempFile);
    		}else{
			    $tempFile = $_FILES[$fileKey]['tmp_name'];
			    $uploadFileName = $_FILES[$fileKey]['name'];
			    $fileSize = $_FILES[$fileKey]['size'];//文件大小
		    }

		    if($fileSize > $this->fileSize){
		    	$res['msg'] = '文件过大!';
		    	return $res;
		    }		    
		    $fileExt = empty($params['fileExt']) ? $this->fileExt : $params['fileExt'];
		    $fileExtStr = $this->fileExt($uploadFileName); //.jpg 后缀
		    if(!in_array($fileExtStr, $fileExt)){
		    	$res['msg'] = '文件不合法!';
		    	return $res;
		    }
		    //$res = $this->expand($tempFile);
			$upyun = new UpYun('pinery', 'pinery', 'mobi2010');
		    $fh = fopen($tempFile, 'rb');
		    //文件名称
			$fileName = $this->fileName($params['fileName']).$fileExtStr;
		    $filePath = $this->filePath().$fileName;
		    $rsp = $upyun->writeFile($filePath, $fh, True);   // 上传图片，自动创建目录
		    fclose($fh);
		    if($rsp){
		    	$res['error'] = 0;
		    	$res['msg'] = "上传成功";
		    	$res['filePath'] = "http://pinery.b0.upaiyun.com".$filePath;		    	
	    	}else{
	    		$res['msg'] = "上传失败";
	    	}
	    	
		}catch(Exception $e) {
		    $res['msg'] = $e->getCode().'-'.$e->getMessage();
		}
		$res['fileName'] = $uploadFileName;
    	return $res;
    }
    /**
     * [又拍云删除文件接口]
     * $file 
     * 		string http://pinery.b0.upaiyun.com//demo/sample_thumb_2.jpeg
     * 		array(
     * 			'http://pinery.b0.upaiyun.com//demo/sample_thumb_2.jpeg',
     * 		 	'http://pinery.b0.upaiyun.com//demo/sample_thumb_2.jpeg',
     * 		) 
     * @return [type] [description]
     * error 1错误，0成功
     * msg 描述
     * errorFiles array('demo/sample_thumb_2.jpeg'=>'描述')
     */
    function ypyDeleteFile($file){
    	$res['error'] = 1;
    	if(is_array($file)){
    		foreach ($file as $key => $val) {
    			$flag = $this->_ypyDeleteFile($val);
    			if($flag != "true"){
    				$res['errorFiles'][$val] =  $flag;
    			}
    		}
    		if($res['errorFiles']){
    			$res['msg'] = 'errorFiles';
    		}else{
    			$res['error'] = 0;
    			$res['msg'] = 'success';
    		}
    	}else{
    		$flag = $this->_ypyDeleteFile($file);
    		if($flag == 'true'){
    			$res['error'] = 0;
    			$res['msg'] = 'success';
    		}else{
    			$res['error'] = 1;
    			$res['msg'] = $flag;
    		}
    	}
    	return $res;
    }
    /**
     * [又拍云删除文件]
     * @param  [string] $file [description]
     * @return [string]       [description]
     */
    private function _ypyDeleteFile($file){
    	require_once(APPPATH.'third_party/upyun.class.php');
    	$file = str_replace('http://pinery.b0.upaiyun.com', '', $file);    	
    	try {
    		$upyun = new UpYun('pinery', 'pinery', 'mobi2010');
    		$res = $upyun->deleteFile($file); 
    		if($res == true || $res == 'NULL' || is_null($res)){
    			$res = 'true';
    		}
    	}catch(Exception $e) {
		    $res = $e->getCode().'-'.$e->getMessage();
		}
		return $res;
    }
    /**
     * [图片rgb分析]
     * @param  [type] $params [description]
     * $params['file'] 		//[必填]图片文件
     * $params['height'] 	//[选填]生成分析图片的高,默认3
     * $params['width'] 	//[选填]生成分析图片的宽,默认3
     * @return [array]         [description]
     * $res['rgb'] 		array 	array(123,1324,1234)
     * $res['rgb16'] 	string 	FAF123
     */
    public function imageRgb($params){
		if (!$params['file']) {return false;}
		$thumbPara['file'] = $params['file'];
		$thumbPara['height'] = intval($params['height']) ? $params['height'] : 3;
		$thumbPara['width'] = intval($params['width']) ? $params['width'] : 3;
		$thumbInfo = $this->thumb($thumbPara);	
		if(!$thumbInfo || !$thumbInfo['filePath']){
			return false;
		}
		$imageFile = $thumbInfo['filePath'];
		$imageInfo = @getimagesize($imageFile);
		$width = $imageInfo[0];
		$height = $imageInfo[1];
		if(!$width || !$height) {return false;}
		switch($imageInfo[2]) {
			case 1:
				$handleImage = imagecreatefromgif($imageFile);
				break;
			case 2:	
				$handleImage = imagecreatefromjpeg($imageFile);
				break;	
			case 3:
				$handleImage = imagecreatefrompng($imageFile);
				break;					
		}
		$res = array();
		for ($x2=1; $x2<=$width; $x2++) {
			for ($y2=1; $y2<=$height; $y2++) {
				$rgb = imagecolorat($handleImage, $x2, $y2);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;
				$rgb16 = $this->rgb10Torgb16($r, $g, $b);
				$res[$rgb16] = array('rgb'=>array($r,$g,$b),'rgb16'=>$rgb16);
			}
		}
		return $res;
	}
	/**
     * [颜色rgb转hsl]     
     */
	public function rgbToHsl($r, $g, $b){
	    $r /= 255;
	    $g /= 255;
	    $b /= 255;
	    $max = max($r, $g, $b);
	    $min = min($r, $g, $b);
	    $h = $s = $l = ($max + $min) / 2;
	    if($max == $min){
	        $h = $s = 0; 
	    }else{
	        $d = $max - $min;
	        $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
	        switch($max){
	            case $r: $h = ($g - $b) / $d + ($g < $b ? 6 : 0); break;
	            case $g: $h = ($b - $r) / $d + 2; break;
	            case $b: $h = ($r - $g) / $d + 4; break;
	        }
	        $h /= 6;
	    }
	    return array($h, $s, $l);
	}
	/**
     * [hsl 转 rgb 规则]     
     */
	private function hue2rgb($p, $q, $t){
	    if($t < 0) {
	        $t += 1;
	    }elseif($t > 1) {
	        $t -= 1;
	    }

	    if($t < 1/6){
	        $p = $p + ($q - $p) * 6 * $t;
	    }elseif($t < 1/2){
	        $p = $q;
	    }elseif($t < 2/3){
	        $p = $p + ($q - $p) * (2/3 - $t) * 6;
	    }
	    return round($p*255);
	}
	/**
     * [颜色hsl转rgb]     
     */
	public function hslToRgb($h, $s, $l){
	    if($s == 0){
	        $r = $g = $b = $l;
	    }else{
	        $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
	        $p = 2 * $l - $q;
	        $r = $this->hue2rgb($p, $q, $h + 1/3);
	        $g = $this->hue2rgb($p, $q, $h);
	        $b = $this->hue2rgb($p, $q, $h - 1/3);
	    }
	    return array($r, $g, $b);
	}
	/**
     * [hsl反色规则]     
     */
	public function gyHslRule($h, $s, $l){
	    if ($s>0.5 && $l>0.5) {
	        $res['title'] = array($h, $s-0.5, 0.8);
	        $res['text'] = array($h, $s-0.5, 0.7);
	        $res['link'] = array($h, $s-0.5, $l-0.5);
	    } elseif($s>0.5 && $l<=0.5) {
	        $res['title'] = array($h, $s-0.5, 1);
	        $res['text'] = array($h, $s-0.5, 0.8);
	        $res['link'] = array($h, $s-0.5, $l+0.5);
	    } elseif($s<=0.5 && $l>0.5) {
	        $res['title'] = array($h, $s+0.5, 0.1);
	        $res['text'] = array($h, $s+0.5, 0.2);
	        $res['link'] = array($h, $s+0.5, $l-0.5);
	    } elseif($s<=0.5 && $l<0.5) {
	        $res['title'] = array($h, $s+0.5, 1);
	        $res['text'] = array($h, $s+0.5, $l+0.5);
	        $res['link'] = array($h, $s+0.5, $l+0.5);
	    }
	    return $res;
	}
	/**
     * [rgb10转rgb16]     
     */
	public function rgb10Torgb16($r, $g, $b){
	    $rgb16 = strtoupper( $r>15 ? dechex($r) : '0'.dechex($r));
	    $rgb16 .= strtoupper( $g>15 ? dechex($g) : '0'.dechex($g));
	    $rgb16 .= strtoupper( $b>15 ? dechex($b) : '0'.dechex($b));
	    return $rgb16;
	}
	/**
	 * [概艺规则转换]
	 * @param  [type] $rgb [description]
	 * @return [type]      [description]
	 */
	public function getGyRgb($rgb,$debug=false){
		$res = array();
		$debugs['rgb'] = $rgb;
		$debugs['hsl'] = $hsl = $this->rgbToHsl($rgb[0],$rgb[1],$rgb[2]);
		$gyHslRule = $this->gyHslRule($hsl[0],$hsl[1],$hsl[2]);		
		if(!empty($gyHslRule)){
			foreach ($gyHslRule as $skey => $sval) {
				$debugs[$skey.'-hsl'] = $sval; 
				$debugs[$skey.'-rgb'] = $hslToRgb = $this->hslToRgb($sval[0],$sval[1],$sval[2]);
				$debugs[$skey.'-rgb16'] = $res[] = $rgb10Torgb16 = $this->rgb10Torgb16($hslToRgb[0],$hslToRgb[1],$hslToRgb[2]);
			}
		}
		if($debug){
			var_dump($debugs);
		}
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
			
		$filePath = $this->filePath($this->uploadImagePath);			
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
	 /**
      * [又拍云-上传-基础版]
      * @param  array  $params [description]
      * $params['file'] 	//[选填]图片文件,默认$_FILES[$fileKey]['tmp_name']
      * @return [array]         [description]
      * $res['filePath']  //新的文件路径
      */
    function ypyUploadBase($params=array()){    	
    	require_once(APPPATH.'third_party/upyun.class.php');
    	try {
    		$file = $params['file'];
    		
		    $fileExtStr = $this->fileExt($file); //.jpg 后缀
		   
			$upyun = new UpYun('pinery', 'pinery', 'mobi2010');
		    $fh = fopen($file, 'rb');
		    //文件名称
			$fileName = $this->fileName($params['fileName']).$fileExtStr;
		    $filePath = $this->filePath().$fileName;
		    $rsp = $upyun->writeFile($filePath, $fh, True);   // 上传图片，自动创建目录
		    fclose($fh);
		    $res['status'] = 200;
		    $res['msg'] = "上传成功";
		    $res['filePath'] = "http://pinery.b0.upaiyun.com".$filePath;
	    	$res['sourceFile'] = $file;
		}catch(Exception $e) {
			$res['status'] = 503;
		    $res['msg'] = $e->getCode().'-'.$e->getMessage();
		}
    	return $res;
    }
    //遍历目录
	function iteralDirs($path){
	    $filearr = array();
	    foreach (glob($path.'\*') as $file){
	        if(is_dir($file)){
	            $filearr = array_merge($filearr,$this->iteralDirs($file));
	        }else{
	            $filearr[] = $file;
	        }
	    }
	    return $filearr;
	}
	/**
	 * [文字图片]
	 * @param  array  $argv [description]
	 * @return [type]       [description]
	 */
	function textImage($argv=array()){
		$text = $argv['text'];//内容
		if(!$text){return false;}
		//画布宽
		$width = $argv['width'] ? $argv['width'] : 10*strlen(preg_replace('/[\x{4e00}-\x{9fa5}]/iu', '00', $text))+1;
		$height = $argv['height'] ? $argv['height'] : 18;//画布高
		$y2 = $argv['y2'] ? $argv['y2'] : $width;//矩形纵坐标
		$x2 = $argv['x2'] ? $argv['x2'] : $height;//矩形横坐标
		$size = $argv['size'] ? $argv['size'] : 12;//字体大小
		$left = $argv['left'] ? $argv['left'] : 1;//字符中点靠左
		$top = $argv['top'] ? $argv['top'] : 6;//字符中点靠下
		$border = $argv['border'];//边框
		// 设置内容类型标头 —— 这个例子里是 image/jpeg
		header('Content-Type: image/jpeg');
		$image = imagecreate($width,$height);//创建画布
		$img_x = imagesx($image);//所代表的图像的宽度
		$img_y = imagesy($image);//所代表的图像的高度
		$color = ImageColorAllocate($image,254,114,3);//为一幅图像分配黑色
		$white = ImageColorAllocate($image,255,255,255);//为一幅图像分配白色	
		ImageFilledRectangle($image,0,0,$y2,$x2,$white);//画一个矩形白色背景并填充
		if($border){			
		    ImageRectangle($image,0,0,$img_x-1,$img_y-1,$color);//红边不填充
		}
		imagettftext($image,$size,0,$left, $img_y/2+($top), $color, './style/img/msyh.ttf', $text);//用 TrueType 字体向图像写入文本
		// $textcolor = imagecolorallocate($image, 0, 0, 255);
		// imagestring($image,2,50,30,$text,$textcolor);//水平地画一行字符串		
		// imagegif($image);//以 GIF 格式将图像输出到浏览器或文件		
		imagejpeg($image);// 输出图像
		ImageDestroy($image);// 关闭之前使用的图片缓冲
	}
	/**
	 * [读文件]
	 * @param  [type] $fname [description]
	 * @return [type]        [description]
	 */
	function readFile($filename){    
		$handle = fopen($filename, "rb");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
	 	return $contents;
	}
	/**
	 * [下载图片]
	 * @return [type] [description]
	 */
	function wget($params){
		$file = $params['file'];
		$fileExtStr = $this->fileExt($file); //.jpg 后缀
		$fileExt = empty($params['fileExt']) ? $this->fileExt : $params['fileExt'];//允许的文件格式		
		$res['status'] = 403;
		if(!in_array($fileExtStr, $fileExt)){
	    	$res['msg'] = $fileExt.'文件不合法!'.$fileExtStr;
			return $res;
	    }
		$byteFile = file_get_contents($file);			
		$filePath = $this->filePath($this->uploadImagePath);			
		if(!is_dir($filePath)) {
			if(!mkdir($filePath,0777,true)){
				$res['msg'] = "The destination directory could not be created.";
				return $res;
			}
		}
		
		$cfile = $filePath.$this->fileName().$fileExtStr;
		$upload = file_put_contents($cfile, $byteFile);
		if(!$upload){
			$res['msg'] = "Download Failed";
			return $res;
		}

        $res['status'] = 200;
		$res['data'] = $cfile;
		$res['msg'] = 'Success';		
		return $res;		
	}
}