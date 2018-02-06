<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 加密算法的秘钥配置
$localParams['cryptoSecretKey'] =  [
        'normal' => [
            'key'    => 'KEYAES0123456789',
            // 初始化向量
            'iv'     => '192.168.1.102.ci'//16位
        ]
    ];

//分类
$localParams['categoryType'] =  [1=>'视频',2=>'音频'];

//菜单
$localParams['menuData'] = [
		['title'=>'首页','uri'=>'index'],
		['title'=>'视频','uri'=>'video'],
		['title'=>'音频','uri'=>'audio'],
		['title'=>'文章','uri'=>'article'],
	];

//导航索引
$localParams['navIndex'] = 'audio';
return $localParams;