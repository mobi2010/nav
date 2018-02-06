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
$adminParams['categoryType'] =  [1=>'视频',2=>'音频'];

//菜单
$adminParams['menuData'] = [
		'index'=>['title'=>'分类管理','sub'=>
			[
				['title'=>'视频','sub'=>
					[
						['title'=>'分类管理','uri'=>'admin/category','params'=>['type'=>1]],
					]
				],
				['title'=>'音频','sub'=>
					[
						['title'=>'分类管理','uri'=>'admin/category','params'=>['type'=>2]],
					]
				],
				['title'=>'文章','sub'=>
					[
						['title'=>'文章管理','uri'=>'admin/category','params'=>['type'=>3]],
					]
				],
			]
		],
		'content'=>['title'=>'内容管理','sub'=>
			[
				['title'=>'视频管理','sub'=>
					[
						['title'=>'添加视频','uri'=>'admin/video/edit'],
						['title'=>'视频列表','uri'=>'admin/video'],
					]
				],
				['title'=>'音频管理','sub'=>
					[
						['title'=>'添加音频','uri'=>'admin/audio/edit'],
						['title'=>'音频列表','uri'=>'admin/audio'],
					]
				],
				['title'=>'文章管理','sub'=>
					[
						['title'=>'添加文章','uri'=>'admin/article/edit'],
						['title'=>'文章列表','uri'=>'admin/article'],
					]
				],
			]
		]
	];

return $adminParams;