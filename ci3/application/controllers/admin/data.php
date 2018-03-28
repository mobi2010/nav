<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Admin_Controller.php');


class Data extends Admin_Controller {
	function __construct($params = array())
	{
		parent::__construct();
		
	}
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function javbusmember(){

		$this->load->view('/admin/data/javbusmember',$data);
	}


	public function javbusmembersave(){

		// $params['url'] = trim($_POST['url']);
		// $html = $this->curlUtils->get($params);
		//$html = file_get_contents('./data/javbus/star.html');
		$url = trim($_POST['url']); 
		$html = file_get_contents($url);
		if($html){
			preg_match('/avatar-box(.*?)waterfall/is',$html,$matche);
			
			preg_match('/<div class="photo-info">(.*?)<\/div>/is',$matche[0],$starInfo);
			preg_match('/<span class="pb10">(.*?)<\/span>/is',$starInfo[0],$starName);

			$username = ci3_string_filter(str_replace(" ","",$starName[1]));

			preg_match_all('/<p>(.*?)<\/p>/is',$starInfo[0],$biographyInfo);
			foreach ($biographyInfo[1] as $key => $value) {
				if(strstr($value,'Age')){
					continue;
				}
				$biographyArr[] = ci3_string_filter($value);
			}
			$biography = implode("\n",$biographyArr);
			if($_FILES['Filedata']['tmp_name']){
				$uploadImg = $this->image->upload();
				// $thumbImg = $this->image->thumb(array('file'=>$uploadImg['filePath'],'width'=>80,'height'=>80,'bgcolor'=>'white'));
				// $avatar_url = $thumbImg['filePath'];
				$avatar_url = $uploadImg['filePath'];
			}
		
			$memberParams['username'] = $username;
			$memberParams['nickname'] = ci3_string_filter($_POST['nickname']);
			$memberParams['password'] = $username."@javbus";
			$memberParams['email'] = $username."@javbus.com";
			$memberParams['avatar_url'] = $avatar_url;
			$memberParams['gender'] = 0;
			$memberParams['biography'] = $biography;
			$memberParams['ip'] = $_SERVER['REMOTE_ADDR'];
			$memberParams['source'] = 2;
			$id = $this->memberModel->save($memberParams);
			echo "member_id:".$id;
		}else{
			exit("error");
		}
	}
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function javbusarticle()
	{
		$this->load->view('/admin/data/javbusarticle',$data);
	}
	/**
	 * [index]
	 * @return [type] [description]
	 */
	public function javbusarticlesave()
	{
		// $params['url'] = "https://www.javbus.com/en/star/2jv";
		// $info = $this->curlUtils->get($params);
		//$html = file_get_contents('./data/javbus/detail.html');


		if($_FILES['Filedata']['tmp_name']){
			$uploadImg = $this->image->upload();
			// $thumbImg = $this->image->thumb(array('file'=>$uploadImg['filePath'],'width'=>160,'height'=>120,'bgcolor'=>'white'));
			$image_url = $uploadImg['filePath'];
		}

		$url = trim($_POST['url']); 
		$html = file_get_contents($url);
		if($html){
			preg_match('/<div class="container">(.*?)<div id="star-div">/is',$html,$articleInfo);

			preg_match('/<h3>(.*?)<\/h3>/is',$articleInfo[0],$title);

			preg_match('/ID:<\/span>(.*?)<\/p>/is',$articleInfo[0],$matche);
			if($matche[1]){
				$abstract[] = "ID: ".ci3_string_filter($matche[1]);
			}

			preg_match('/Release Date:<\/span>(.*?)<\/p>/is',$articleInfo[0],$matche);
			if($matche[1]){
				$abstract[] = "Release Date: ".ci3_string_filter($matche[1]);
			}

			preg_match('/Length:<\/span>(.*?)<\/p>/is',$articleInfo[0],$matche);
			if($matche[1]){
				$abstract[] = "Length: ".ci3_string_filter($matche[1]);
			}

			preg_match('/Studio:<\/span>(.*?)<\/p>/is',$articleInfo[0],$matche);
			if($matche[1]){
				$abstract[] = "Studio: ".ci3_string_filter($matche[1]);
			}

			preg_match('/Label:<\/span>(.*?)<\/p>/is',$articleInfo[0],$matche);
			if($matche[1]){
				$abstract[] = "Label: ".ci3_string_filter($matche[1]);
			}

			preg_match('/Genre:<\/p>(.*?)<\/p>/is',$articleInfo[0],$matche);
			if($matche[1]){
				preg_match_all('/<span class="genre">(.*?)<\/span>/is',$matche[1],$matche);
				foreach ($matche[1] as $key => $value) {
					$genreArr[] = ci3_string_filter($value);
				}
				$genre = implode("; ",$genreArr);
				$abstract[] = "Genre: ".$genre;
			}

			preg_match_all('/<li>(.*?)<\/li>/is',$articleInfo[0],$matche);

			if($matche[1]){
				foreach ($matche[1] as $key => $value) {
					$idolsArr[] = ci3_string_filter($value);
				}
				$idols = implode("; ",$idolsArr);
				$abstract[] = "Idols: ".$idols;
			}

			$abstract = implode("<br/>",$abstract);



			$member_id = (int)$_POST['member_id'];
			$tags = [];
			if($_POST['article_id']){
				$dataModel = $this->articleModel->getInfo($_POST['article_id']);
				$member_id = $dataModel['member_id'];
				$tags = $dataModel['tags'];
			}


			$data['category_id'] = 1;
			$data['title'] = ci3_string_filter($title[1]);
			$data['abstract'] = '';
			$data['cover_image'] = $image_url;
			$data['content'] = "<p>".$abstract."</p>";
			$data['video_url'] = '';
			$data['hits'] = rand(10,100);
			$data['member_id'] = $member_id;//rand(1,20);
			$article_id = $this->articleModel->save($data);
			echo "article_id:".$article_id;

			$params['tags'] = $tags;
			$params['article_id'] = $article_id;
			$this->articleModel->addArticleTags($params);
		}else{
			exit("error");
		}
	}
}		