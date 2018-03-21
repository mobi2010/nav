<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$navData['Codec'] = ['title'=>"Codec",'sub'=>[
		['title'=>'Json Format','uri'=>'site/tools/index',"type"=>'jf'],
		['title'=>'Base64 Encode','uri'=>'site/tools/index',"type"=>'be'],
		['title'=>'Base64 Decode','uri'=>'site/tools/index',"type"=>'bd'],
		['title'=>'GBK => UTF-8','uri'=>'site/tools/index',"type"=>'gb2u'],
		['title'=>'UTF-8 => GBK','uri'=>'site/tools/index',"type"=>'u2gb'],
		['title'=>'Unix => Date','uri'=>'site/tools/index',"type"=>'u2d'],
		['title'=>'Date => Unix','uri'=>'site/tools/index',"type"=>'d2u'],
		['title'=>'Md5','uri'=>'site/tools/index',"type"=>'md5'],
		['title'=>'Sha1','uri'=>'site/tools/index',"type"=>'sha1'],
		['title'=>'Url Encode','uri'=>'site/tools/index',"type"=>'ue'],
		['title'=>'Url Decode','uri'=>'site/tools/index',"type"=>'ud'],
		['title'=>'ASCII => Unicode','uri'=>'site/tools/index',"type"=>'au'],
		['title'=>'Unicode => ASCII','uri'=>'site/tools/index',"type"=>'ua'],
		['title'=>'Unicode => CN','uri'=>'site/tools/index',"type"=>'uc'],
		['title'=>'CN => Unicode','uri'=>'site/tools/index',"type"=>'cu'],
	]
];


$navData['VideoDownload'] = ['title'=>"Video Download",'sub'=>[
		['title'=>'微博视频下载','uri'=>'site/tools/video',"type"=>'weibo'],
		['title'=>'秒拍视频下载','uri'=>'site/tools/video',"type"=>'miaopai'],
		['title'=>'Facebook视频下载','uri'=>'site/tools/video',"type"=>'facebook'],
		['title'=>'Weibo','uri'=>'site/tools/video',"type"=>'weibo'],
	]
];

return $navData;