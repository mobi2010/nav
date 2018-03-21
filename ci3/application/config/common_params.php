<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 加密算法的秘钥配置
$localParams['cryptoSecretKey'] =  [
        'normal' => [
            'key'    => 'KEYAES0123456789',
            // 初始化向量
            'iv'     => '192.168.1.102.ci'//16位
        ]
    ];

$localParams['gender'] =  [0=>'Female',1=>'Male',2=>'Secret'];

$localParams['memberMenu'] =  [
	['title'=>'Profile','uri'=>'member/account/profile'],
	['title'=>'Post','uri'=>'member/account/post'],
    ['title'=>'Follow','uri'=>'member/account/follow'],
    ['title'=>'Fans','uri'=>'member/account/fans'],
    ['title'=>'Sign Out','uri'=>'member/account/signout'],
];


$localParams['footer'] =  [
    ['title'=>'feedback','uri'=>'site/feedback','image'=>'/assets/common/images/feedback.jpg'],
    ['title'=>'weibo','url'=>'https://weibo.com/navbus','image'=>'/assets/common/images/weibo.jpg'],
    ['title'=>'facebook','url'=>'https://facebook.com/','image'=>'/assets/common/images/facebook.jpg'],
    ['title'=>'wechat','url'=>'https://wechat.com/','image'=>'/assets/common/images/wechat.jpg'],
];
//菜单
$localParams['menuDataFront'] = [
		['title'=>'Home','uri'=>'index'],
];
$localParams['menuDataEnd'] = [
        ['title'=>'Follow','uri'=>'index/follow'],
        ['title'=>'Navigation','uri'=>'site/navigation'],
    ];    
//导航索引
$localParams['navIndex'] = 'index';
return $localParams;