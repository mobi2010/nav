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



//菜单
$localParams['menuData'] = [
		['title'=>'Home','uri'=>'index'],
		//['title'=>'Tag','uri'=>'tag'],
	];
//导航索引
$localParams['navIndex'] = 'index';
return $localParams;