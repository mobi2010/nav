<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 加密算法的秘钥配置
$adminParams['cryptoSecretKey'] =  [
        'normal' => [
            'key'    => 'KEYAES0123456789',
            // 初始化向量
            'iv'     => '192.168.1.102.ci'//16位
        ]
    ];

//分类
$adminParams['tagType'] =  [1=>'Identity'];

//状态
$adminParams['status'] =  [0=>'Active',1=>'Inactive'];

//性别
$adminParams['gender'] =  [0=>'Female',1=>'Male'];
//region
$adminParams['region'] =  [0=>'Unknown',1=>'Japan',2=>'America',3=>'China'];


//菜单
$adminParams['menuData'] = [
		'content'=>['title'=>'Content Management','sub'=>
			[	
				['title'=>'Tag','sub'=>
					[
						['title'=>'Tag List','uri'=>'admin/tag'],
						['title'=>'Tag Type','uri'=>'admin/tagtype'],
					]
				],
				['title'=>'Article','sub'=>
					[
						['title'=>'Article Add','uri'=>'admin/article/edit'],
						['title'=>'Article List','uri'=>'admin/article'],
					]
				]
			]
		]
	];

return $adminParams;