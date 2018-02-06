<?php
/**
 * 第三方互联api
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connectapi {
	public $connectApiPath;
	public $connectApiInfo;
	public $hostUrl;
	//public $apiInfo;
	public function __construct()
    {
    	$this->connectApiPath = APPPATH.'third_party/connect';
        $this->connectApiInfo = $this->apiConfig();
        $this->hostUrl = 'http://'.$_SERVER['HTTP_HOST'].'/login/callback/';
    }
    /**
     * [获取用户双向关注的用户ID列表，即互粉UID列表 ]
     * @return [type] [description]
     */
    function friends_bilateral_ids($params=array()){
    	$tp = $params['tp'];
		$this->includeFile($tp);
		$data = array();
		$res = array();
		$json = json_decode($params['json']);
		switch ($tp) {
			case 'wbsina'://新浪微博
				$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token'] );
				$res = $c->oauth->get('friendships/friends/bilateral/ids',array('uid'=>$params['uid'])); // done
				break;		
			case 'connectqq'://腾讯互联				
				$data['openid'] = $params['uid'];
				$data['reqnum'] = 30;
				$data['startindex'] = 0;
				$c = new ConnectqqSaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
				$info = $c->get_fanslist($data);	
				if($info['data'] && !empty($info['data']['info'])){
					foreach ($info['data']['info'] as $key => $value) {
						$res[] = $value['openid'];
					}
				}
				break;
			case 'renren'://人人
				$c = new RenrenSaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
				$info = $c->friend_list(array('userId'=>$params['uid'],'access_token'=>$params['access_token']));
				if(!empty($info['response'])){
					foreach ($info['response'] as $key => $value) {
						$res[] = $value['id'];
					}
				}
				break;	
			case 'wbsohu'://搜狐微博
				$c = new WbsohuSaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
				$info  = $c->friends(); 
				if(!empty($info)){
					foreach ($info as $key => $value) {
						$res[] = $value['id'];
					}
				}
				break;	
			case 'wb163'://网易微博
				$tblog = new TBlog(CONSUMER_KEY, CONSUMER_SECRET,ACCESS_TOKEN,ACCESS_TOKEN_SECRET);
                $info = $tblog->friends($params['userid']);  
                if($info['users'] && !empty($info['users'])){
                	foreach ($info['users'] as $key => $value) {
                		$res[] = $value['id'];
                	}
                }
                break;	
			default:
				# code...
				break;
		}
		return $res;
    }    
    /**
     * [获取用户发布的微博]
     * @return [type] [description]
     */
    function user_timeline($params=array()){
    	$tp = $params['tp'];
		$this->includeFile($tp);
		$data = array();
		$res = array();
		$json = json_decode($params['json']);
		switch ($tp) {
			case 'wbsina'://新浪微博
				$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token'] );
				$info = $c->oauth->get('statuses/user_timeline'); // done
				if(!empty($info['total_number'])){
					foreach ($info['statuses'] as $key => $value) {
						$infomat = array();
						$infomat['addtime'] = strtotime($value['created_at']);
						$infomat['text'] = $value['text'];
						if($value['pic_urls']){
							foreach ($value['pic_urls'] as $pkey => $pvalue) {
								$file = strrchr($pvalue['thumbnail_pic'],'/');
								$infomat['pictures'][] = array(
									'http://ww1.sinaimg.cn/large'.$file,
									'http://ww1.sinaimg.cn/bmiddle'.$file,
									'http://ww1.sinaimg.cn/thumbnail'.$file								
									);
							}
						}
						$infomat['userid'] = $value['user']['id'];
						$infomat['name'] = $value['user']['screen_name'];
						$infomat['avatar'] = array(
							$value['user']['profile_image_url'],
							$value['user']['avatar_large'],
							$value['user']['avatar_hd']
							);
						$res[] = $infomat;
					}
				}				
				break;
			case 'connectqq'://腾讯互联				
				
				break;
			case 'douban'://豆瓣
			    $c = new DoubanSaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
				$info = $c->get_shou_list($params['userid']);
				if(!empty($info)){
					foreach ($info as $key => $value) {
						$infomat = array();
						$infomat['text'] = $value['text'];
						$infomat['addtime'] = strtotime($value['created_at']);
						$infomat['userid'] = $value['user']['uid'];
						$infomat['name'] = $value['user']['screen_name'];
						if(!empty($value['attachments'])){
							foreach ($value['attachments'] as $akey => $avalue) {
								if(!empty($avalue['media'])){
									foreach ($avalue['media'] as $mkey => $mvalue) {
										$file = strrchr($mvalue['src'],'/');
										$infomat['pictures'][] = array(
											'http://img3.douban.com/view/status/raw/public'.$file,
											'http://img3.douban.com/view/status/median/public'.$file,
											'http://img3.douban.com/view/status/ismall/public'.$file,
											'http://img3.douban.com/view/status/small/public'.$file
											);
									}
								}

							}
						}

						$infomat['avatar'] = array($value['user']['small_avatar'],$value['user']['large_avatar']);
						$res[] = $infomat;
					}
				}
				break;
			case 'wbsohu'://搜狐微博
				$c = new WbsohuSaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
			    $data = array();
				$info  = $c->oauth->get( 'statuses/user_timeline', $data ); // done
				if(!empty($info)){
					foreach ($info as $key => $value) {
						$infomat = array();
						$infomat['addtime'] = strtotime($value['created_at']);
						$infomat['text'] = $value['text'];
						$infomat['pictures'][] = array(
									$value['original_pic'],
									$value['middle_pic'],
									$value['small_pic']									
									);
						$infomat['userid'] = $value['user']['id'];
						$infomat['name'] = $value['user']['screen_name'];
						$infomat['avatar'] = array(
							$value['user']['profile_image_url']
							);
						$res[] = $infomat;
					}
				}	
				break;
			case 'renren'://人人
				$c = new RenrenSaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
				$data['access_token'] = $params['access_token'];
				$data['feedType'] = 'ALL'; 
				$info = $c->feed_list($data);
				if(!empty($info['response'])){
					foreach ($info['response'] as $key => $value) {
						$infomat = array();
						$infomat['addtime'] = strtotime($value['time']);
						$infomat['text'] = $value["message"].$value['resource']['content'];
						if(!empty($value['attachment'])){
							foreach ($value['attachment'] as $pkey => $pvalue) {
								$pics = array($pvalue['rawImageUrl'],$pvalue['orginalUrl']);
								$infomat['pictures'][] = $pics;
							}
						}						
						$infomat['userid'] = $value['sourceUser']['id'];
						$infomat['name'] = $value['sourceUser']['name'];
						if(!empty($value['sourceUser']['avatar'])){
							foreach ($value['sourceUser']['avatar'] as $akey => $avalue) {
								$infomat['avatar'][] =  $avalue['url'];
							}
						}
						$res[] = $infomat;
					}
				}

				break;	
			case 'wb163'://网易微博
				$tblog = new TBlog(CONSUMER_KEY, CONSUMER_SECRET,ACCESS_TOKEN,ACCESS_TOKEN_SECRET);
                $uid = $params['userid'];
                $info = $tblog->user_timeline_uid($uid);  
                if(!empty($info)){
                	foreach ($info as $key => $value) {
						$infomat = array();
						$infomat['addtime'] = strtotime($value['created_at']);
						$infomat['text'] = $value["text"];											
						$infomat['userid'] = $value['user']['id'];
						$infomat['name'] = $value['user']['name'];
						$infomat['avatar'] = array($value['user']['profile_image_url']);
						$res[] = $infomat;
					}
				} 
				break;
			case 'facebook'://
				$facebook = new Facebook(array(
						  'appId'  => WB_AKEY,
						  'secret' => WB_SKEY
						));
				$res = $facebook->api("/me/post");
				break;	
			case 'twitter':
				$tparams = $json['access_token'];
				$c = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $tparams['oauth_token'], $tparams['oauth_token_secret']);
				$data = array();
				$res  = $c->get('statuses/user_timeline', $data); // done
				break;							
			default:
				# code...
				break;
		}
		return $res;
    }
    /**
     * [发微博]
     * @return [type] [description]
     */
    function update($params=array()){
		$tp = $params['tp'];
		$this->includeFile($tp);
		$data = array();
		$json = json_decode($params['json']);
		switch ($tp) {
			case 'wbsina'://新浪微博
				$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
			    $status = $params['text'];
			    if($params['image']){
				    $pic = '@'.$params['image'];
					$res = $c->upload($status,$pic);
				}else{
					$res = $c->update($status);
				}				
				break;
			case 'connectqq'://腾讯互联				
				$data['comment'] = $params['text'];
				$data['title'] = $params['title'];
				$data['summary'] = $params['summary'];
				$data['images'] = $params['image'];
				$data['site'] = $params['site'];
				$data['fromurl'] = $params['fromurl'];
				$data['openid'] = $params['userid'];
				$c = new ConnectqqSaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
				$res = $c->add_share($data);
				break;
			case 'douban'://豆瓣
			    $c = new DoubanSaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
			    $data['text'] = $params['text'];
			    $params['image'] && $data['image'] = '@'.$params['image'];
				$res = $c->add_shuo($data);
				break;
			case 'wbsohu'://搜狐微博
				$c = new WbsohuSaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
			    $status = urlencode($params['text']); 
				if($params['image']){
				    $pic = $params['image'];
					$res = $c->upload($status,$pic);
				}else{
					$res = $c->update($status);
				}
				break;
			case 'renren'://人人
				$c = new RenrenSaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token']);
				preg_match('/\( 来源:(.*?) \)/', $params['text'], $matches);
				$targetUrl = $matches[1] ? $matches[1] : 'http://getarts.cn/';
			    $data['access_token'] = $params['access_token'];
			    $data['message'] = '分享内容';
				$data['title'] = '无标题';
				$data['description'] = $params['text'];
				$data['targetUrl'] = $targetUrl;
				$data['actionTargetUrl'] = 'http://getarts.cn/';
				$data['imageUrl'] = $params['image'];
				$data['subtitle'] = '';
				$data['actionName'] = '';
				$res  = $c->feed_put($data); 
				break;	
			case 'wb163'://网易微博
				$tblog = new TBlog(CONSUMER_KEY, CONSUMER_SECRET,ACCESS_TOKEN,ACCESS_TOKEN_SECRET);
                $status = $params['text'];
                if($params['image']){
				    $image = '@'.$params['image'];
					$res = $tblog->upload($status,$image);
				}else{
					$res = $tblog->update($status);
				}
				break;
			case 'facebook'://
				$facebook = new Facebook(array(
						  'appId'  => WB_AKEY,
						  'secret' => WB_SKEY
						));
				$data['message'] = $params['text'];
				$data['actions']['name'] = '概艺网';
				$data['actions']['link'] = 'http://getarts.cn/';				 
				$res = $facebook->api('/me/feed/', 'post', $data);
				break;	
			case 'twitter':
				$tparams = $json['access_token'];
				$c = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, 
					$tparams['oauth_token'], $tparams['oauth_token_secret']);
				$data['status'] = $params['text'];
			    $data['pic'] = '@'.$params['image'];
				$res = $c->post('statuses/update', $data);
				break;							
			default:
				# code...
				break;
		}
		return $res;
    }
    /**
     * [回调地址]
     * @param  [type]   $tp [description]
     * @return function     [description]
     */
	public function callback($tp){
		$callback_url =  $this->hostUrl.$tp.'.html';
		$this->includeFile($tp);
		$res = array();
		switch ($tp) {
			case 'wbsina'://新浪微博
				//array(4) { ["access_token"]=> string(32) "2.001ATCNCV21f9Dfadaefd5da0cW1Ed" ["remind_in"]=> string(9) "157679999" ["expires_in"]=> int(157679999) ["uid"]=> string(10) "2024946184" } 
				$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
				if (isset($_REQUEST['code'])) {
					$keys = array();
					$keys['code'] = $_REQUEST['code'];
					$keys['redirect_uri'] = $callback_url;
					$token = $o->getAccessToken( 'code', $keys );	
					$res['type'] = 0;
					$res['token'] = $token['access_token'];	
					$res['uid'] = $token['uid'];	
					$res['json'] = $token;
					$_SESSION['token'] = $token;
					$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token']);
					$userInfo = $c->show_user_by_id($token['uid']);
					$res['names'] = $userInfo['screen_name'];
					$res['avatar'] = $userInfo['avatar_large'];
				}				
				break;
			
			case 'connectqq'://腾讯互联
			//array(4) { ["access_token"]=> string(32) "F3C0A2AAB84042617453EABB5FBEF87F" ["expires_in"]=> string(7) "7776000" ["refresh_token"]=> string(32) "26070DB612C18BAE67EE4FBF2E730CC7" ["openid"]=> string(32) "5F3C23CEDAA1FA510C12D56498DE05B0" } 
				$o = new ConnectqqSaeTOAuthV2( WB_AKEY , WB_SKEY );
				if (isset($_REQUEST['code'])) {
					$keys = array();
					$keys['code'] = $_REQUEST['code'];
					$keys['redirect_uri'] = $callback_url;
					$token = $o->getAccessToken( 'code', $keys );
					$res['type'] = 1;
					$res['token'] = $token['access_token'];	
					$res['uid'] = $token['openid'];	
					$res['json'] = $token;
					$c = new ConnectqqSaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token']);
					$userInfo = $c->get_user_info(array('openid'=>$token['openid']));
					$res['names'] = $userInfo['nickname'];
					$res['avatar'] = $userInfo['figureurl_qq_2'];
				}				
				break;
			case 'douban'://豆瓣
			//array(5) { ["access_token"]=> string(32) "7eaf01eea9a409df7c0d05cbfcec1d9d" ["douban_user_name"]=> string(6) "fonyer" ["douban_user_id"]=> string(8) "75723435" ["expires_in"]=> int(604800) ["refresh_token"]=> string(32) "666c6f9bb5c63a0e33454ed32152ae2a" } 
				$o = new DoubanSaeTOAuthV2( WB_AKEY , WB_SKEY );
				if (isset($_REQUEST['code'])) {
					$keys = array();
					$keys['code'] = $_REQUEST['code'];
					$keys['redirect_uri'] = $callback_url;
					$token = $o->getAccessToken( 'code', $keys );	

					$res['type'] = 3;
					$res['token'] = $token['access_token'];	
					$res['uid'] = $token['douban_user_id'];	
					$res['json'] = $token;		
					$c = new DoubanSaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token']);
					$userInfo = $c->get_user_info($token['douban_user_id']);
					$res['names'] = $userInfo['name'];
					$res['avatar'] = $userInfo['large_avatar'];						
				}
				break;
			case 'wbsohu'://微博搜狐
			//array(3) { ["access_token"]=> string(30) "d9ae86cc9a79f17f5834eb9b73c6b8" ["expires_in"]=> string(7) "2592000" ["refresh_token"]=> string(30) "a4ac3a68da4b666be6ca97f43185e2" } 
				$o = new WbsohuSaeTOAuthV2( WB_AKEY , base64_encode(WB_SKEY) );
				if (isset($_REQUEST['code'])) {
					$keys = array();
					$keys['code'] = $_REQUEST['code'];
					$keys['redirect_uri'] = $callback_url;
					$token = $o->getAccessToken( 'code', $keys );
					$c = new WbsohuSaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token'] );
					$userInfo = $c->show_user_by_id();
					$res['type'] = 6;
					$res['token'] = $token['access_token'];	
					$res['uid'] = $userInfo['id'];
					$res['json'] = $token;
					$res['names'] = $userInfo['screen_name'];
					$res['avatar'] = $userInfo['profile_image_url'];		
				}
				break;
			case 'renren'://人人
			//object(AccessToken)#21 (5) { ["type"]=> string(3) "MAC" ["accessToken"]=> string(65) "239297|2.8A4oE2lJYDrrXPuoZC6ARf3a3UCuvUFF.370952768.1375348754832" ["refreshToken"]=> NULL ["macKey"]=> string(32) "eb434b6dea654451a8b313acc9470159" ["macAlgorithm"]=> string(10) "hmac-sha-1" } 
				$o = new RenrenSaeTOAuthV2( WB_AKEY , WB_SKEY );
				if (isset($_REQUEST['code'])) {
					$keys = array();
					$keys['code'] = $_REQUEST['code'];
					$keys['redirect_uri'] = $callback_url;
					$token = $o->getAccessToken( 'code', $keys );	
					$res['type'] = 2;
					$res['token'] = $token['access_token'];	
					$res['uid'] = $token['user']['id'];	
					$res['json'] = $token;
					$_SESSION['token'] = $token;
					$c = new RenrenSaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token']);			
					$userInfo = $c->get_user_info(array('access_token'=>$token['access_token'],'userId'=>$token['user']['id']));
					$res['names'] = $userInfo['response']['name'];
					$res['avatar'] = $userInfo['response']['avatar'][3]['url'];		
				}
				break;
			case 'wb163'://网易微博
				//array(2) { ["oauth_token"]=> string(32) "fd7bd1e2938c0cac8eeda7adf0f84c79" ["oauth_token_secret"]=> string(32) "381c53bbebb22c26191f76ba6c20224a" } 
				$oauth = new OAuth( CONSUMER_KEY, CONSUMER_SECRET , $_SESSION['request_token']['oauth_token'] , $_SESSION['request_token']['oauth_token_secret']  );
				$token = $oauth->getAccessToken(  $_REQUEST['oauth_token'] );
				$tblog = $tblog = new TBlog(CONSUMER_KEY, CONSUMER_SECRET,ACCESS_TOKEN,ACCESS_TOKEN_SECRET);

				$userInfo = $tblog ->verify_credentials();
				$res['type'] = 7;
				$res['token'] = $token['oauth_token'];
				$res['uid'] = $userInfo['id'];
				$res['json'] = $token;
				$res['names'] = $userInfo['name'];
				$res['avatar'] = $userInfo['profile_image_url'];		
				break;
			case 'facebook':	
			    //array(3) { ["fb_210122152487526_state"]=> string(32) "f67c06a609c65b0ec642b283ba87e63a" ["oauth_token"]=> NULL ["oauth_token_secret"]=> NULL }			
				//var_dump($_SESSION);
				// array(2) {
				//   ["token"]=>
				//   array(4) {
				//     ["access_token"]=>
				//     string(32) "2.001ATCNCJ7kuLD3cee84ec6cKLv8xC"
				//     ["remind_in"]=>
				//     string(6) "128298"
				//     ["expires_in"]=>
				//     int(128298)
				//     ["uid"]=>
				//     string(10) "2024946184"
				//   }
				//   ["fb_450530445058029_state"]=>
				//   string(32) "71e027a22ac0331419aa896f33521017"
				// }
				$facebook = new Facebook(array(
						  'appId'  => WB_AKEY,
						  'secret' => WB_SKEY
						));
				$token = $_SESSION;
				$user = $facebook->getUser();
				$res['type'] = 4;
				$res['token'] = $token["token"]['access_token'];
				$res['uid'] = $token["token"]['uid'];
				$res['json'] = $token;
				break;
			case 'twitter':
				//array(2) { ["access_token"]=> array(4) { ["oauth_token"]=> string(50) "1856496744-eWD2qQZXdK6zgcsdAxExKlPTpt9J52wOhGK2udt" ["oauth_token_secret"]=> string(40) "UyX3fQltyV009rTpHlCMZDr97Dl5JkccZOE97vx4" ["user_id"]=> string(10) "1856496744" ["screen_name"]=> string(13) "unselfish2012" } ["status"]=> string(8) "verified" } 
				$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
				$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
				$_SESSION['access_token'] = $access_token;
				unset($_SESSION['oauth_token']);
				unset($_SESSION['oauth_token_secret']);
				$_SESSION['status'] = 'verified';

				$res['type'] = 5;
				$res['token'] = $_SESSION['access_token']['oauth_token'];
				$res['uid'] = $_SESSION['access_token']['user_id'];
				$res['json'] = $token;

				break;	
			default:
				# code...
				break;
		}
		$res['json'] = json_encode($res['json']);
		return $res;
		
	}
	/**
	 * [authorize description]
	 * @return [type] [description]
	 */
	public function authorize($tp){
		$callback_url =  $this->hostUrl.$tp.'.html';
		$this->includeFile($tp);		
		switch ($tp) {			
			case 'wbsina'://新浪微博
				$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
				$url = $o->getAuthorizeURL($callback_url);
				break;
			case 'connectqq'://腾讯互联
				$o = new ConnectqqSaeTOAuthV2( WB_AKEY , WB_SKEY );
				$url = $o->getAuthorizeURL($callback_url);
				break;
			case 'douban'://豆瓣
				$o = new DoubanSaeTOAuthV2( WB_AKEY , WB_SKEY );
				$url = $o->getAuthorizeURL($callback_url);
				break;
			case 'wbsohu'://搜狐微博
				$o = new WbsohuSaeTOAuthV2( WB_AKEY , WB_SKEY );
				$url = $o->getAuthorizeURL($callback_url);
				break;
			case 'renren'://人人
				$o = new RenrenSaeTOAuthV2( WB_AKEY , WB_SKEY );
				$url = $o->getAuthorizeURL($callback_url);
				break;
			// case 'renren'://人人
			// 	$rennClient = new RennClient ( APP_KEY, APP_SECRET );
			// 	$rennClient->setDebug ( DEBUG_MODE );
			// 	$state = uniqid ( 'renren_', true );
			// 	// 得认证授权的url
			// 	$url = $rennClient->getAuthorizeURL ( $callback_url, 'code', $state );	
			// 	break;	
			case 'wb163'://网易微博
				$oauth = new OAuth(CONSUMER_KEY, CONSUMER_SECRET);
				$_SESSION['request_token'] = $request_token = $oauth->getRequestToken();
				$url = $oauth->getAuthorizeURL( $request_token['oauth_token'], $callback_url);
				break;
			case 'facebook'://
				$facebook = new Facebook(array(
						  'appId'  => WB_AKEY,
						  'secret' => WB_SKEY
						));
				$fbprarms['callback_url'] = $callback_url;
				$fbprarms['scope'] = 'email,publish_stream';
				$url = $facebook->getLoginUrl($fbprarms);
				break;	
			case 'twitter':
				$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
				$request_token = $connection->getRequestToken($callback_url);
				$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
				$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
				$url = $connection->getAuthorizeURL($token);
				break;							
			default:
				# code...
				break;
		}
	
		return $url;
	}
	
	/**
	 * [includeFile description]
	 * @param  [type] $tp [description]
	 * @return [type]     [description]
	 */
	public function includeFile($tp){
		$apiInfo =  $this->connectApiInfo[$tp];
		if($apiInfo){//引入类文件
			foreach ($apiInfo['apis'] as $key => $value) {
				require_once($this->connectApiPath.$value);
			}
		}
	}
	/**
	 * [接口和数据对应关系]
	 * @return [type] [description]
	 */
	function apiRelation($flip=false){
		$config = array(
				0 => 'wbsina',
				1 => 'connectqq',
				2 => 'renren',
				3 => 'douban',
				4 => 'facebook',
				5 => 'twitter',
				6 => 'wbsohu',
				7 => 'wb163'
			);
		$config = $flip ? array_flip($config) : $config;
		return $config;
	}
	/**
	 * [apiInfo description]
	 * @return [type] [description]
	 */
	function apiConfig(){
		return array(
        	'wbsina' => array(
        		'title'=>'新浪微博',
        		'apis'=>array('/wbsina/config.php','/wbsina/saetv2.ex.class.php'),
        		'ourl'=>'http://weibo.com',
        		'ico'=>'sinaIco',
        		'class'=>'weibo'
        		),
        	// 'facebook' => array(
        	// 	'title'=>'Facebook',
        	// 	'apis'=>array('/facebook/config.php','/facebook/src/facebook.php'),
        	// 	'class'=>'facebook'
        	// 	),
        	'connectqq' => array(
        		'title'=>'qq帐号',
        		'apis'=>array('/connectqq/config.php','/connectqq/saetv2.ex.class.php'),
        		'ourl'=> 'http://qzone.qq.com/',
        		'ico'=>'ttBlogIco',
        		'class'=>'qq'
        		),
        	// 'twitter' => array(
        	// 	'title'=>'Twitter',
        	// 	'apis'=>array('/twitter/config.php','/twitter/twitteroauth/twitteroauth.php'),
        	// 	'class'=>'twitter'
        	// 	),
        	'renren' => array(
        		'title'=>'人人帐号',
        		'apis'=>array('/renren/config.php','/renren/saetv2.ex.class.php'),
        		'ourl'=> 'http://renren.com/',
        		'ico'=>'renrenIco',
        		'class'=>'renren'
        		),
        	// 'wbsohu' => array(
        	// 	'title'=>'搜狐微博',
        	// 	'apis'=>array('/wbsohu/config.php','/wbsohu/saetv2.ex.class.php'),
        	// 	'ourl'=> 'http://t.sohu.com',
        	// 	'ico'=>'sohuIco',
        	// 	'class'=>'sohu'
        	// 	),
        	'douban' => array(
        		'title'=>'豆瓣帐号',
        		'apis'=>array('/douban/config.php','/douban/saetv2.ex.class.php'),
        		'ourl'=> 'http://www.douban.com/',
        		'ico'=>'doubanIco',
        		'class'=>'douban'
        		),        	        	
        	// 'wb163' => array(
        	// 	'title'=>'网易微博',
        	// 	'apis'=>array('/wb163/config.php','/wb163/api/tblog.class.php'),
        	// 	'ourl'=> 'http://t.163.com',
        	// 	'ico'=>'wangyiIco',
        	// 	'class'=>'wangyi'
        	// 	)
        );
	}
	/**
	 * [数据关系]
	 * @return [type] [description]
	 */
	function dataRelation($data){
		$config = $this->apiRelation();
		$apiConfig = $this->apiConfig();
		if(!empty($data)){
			foreach ($data as $key => $value) {
				$type = $config[$value['type']];
				!is_array($apiConfig[$type]) && $apiConfig[$type] = array();
				$membersThird[$type] = $value + $apiConfig[$type];
			}
		}else{
			$membersThird = array();
		}
		return $membersThird;
	}
	/**
     * [刷新token]
     * @param  [type]   $tp [description]
     * @return function     [description]
     */
	public function refreshToken($params){
		$tp = $params['tp'];
		$callback_url =  $this->hostUrl.$tp.'.html';
		$this->includeFile($tp);
		$res = array();
		switch ($tp) {
			case 'wbsina'://新浪微博
			$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $params['access_token'] );
			$info = $c->oauth->post( 'statuses/upload_pic', array('pic'=>'http://www.baidu.com/img/bdlogo.gif'), true );
			var_dump($info);
				// $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
				// $keys['redirect_uri'] = $callback_url;
				// $keys['refresh_token'] = $params['refresh_token'];
				// $token = $o->getAccessToken( 'token', $keys );	
				// var_dump($token);		
				break;
			case 'douban'://豆瓣
				$o = new DoubanSaeTOAuthV2( WB_AKEY , WB_SKEY );
				$keys = array();
				//$keys['code'] = $params['code'];
				$keys['redirect_uri'] = $callback_url;
				$keys['refresh_token'] = $params['refresh_token'];
				$token = $o->getAccessToken( 'token', $keys );	
				return $token; 
				
				break;
			
			case 'renren'://人人
			//object(AccessToken)#21 (5) { ["type"]=> string(3) "MAC" ["accessToken"]=> string(65) "239297|2.8A4oE2lJYDrrXPuoZC6ARf3a3UCuvUFF.370952768.1375348754832" ["refreshToken"]=> NULL ["macKey"]=> string(32) "eb434b6dea654451a8b313acc9470159" ["macAlgorithm"]=> string(10) "hmac-sha-1" } 
				$o = new RenrenSaeTOAuthV2( WB_AKEY , WB_SKEY );
				if (isset($_REQUEST['code'])) {
					$keys = array();
					$keys['code'] = $_REQUEST['code'];
					$keys['redirect_uri'] = $callback_url;
					$token = $o->getAccessToken( 'code', $keys );	
					$res['type'] = 2;
					$res['token'] = $token['access_token'];	
					$res['uid'] = $token['user']['id'];	
					$res['json'] = $token;
					$_SESSION['token'] = $token;
					$c = new RenrenSaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token']);			
					$userInfo = $c->get_user_info(array('access_token'=>$token['access_token'],'userId'=>$token['user']['id']));
					$res['names'] = $userInfo['response']['name'];
					$res['avatar'] = $userInfo['response']['avatar'][3]['url'];		
				}
				break;			
		}
		$res['json'] = json_encode($res['json']);
		return $res;
		
	}
}