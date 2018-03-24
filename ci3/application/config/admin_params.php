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
$adminParams['gender'] =  [0=>'Female',1=>'Male',2=>'Secret'];
//region
$adminParams['region'] =  [0=>'Unknown',1=>'Japan',2=>'America',3=>'China'];

//source
$adminParams['source'] =  [0=>'Foreign',1=>'Local'];


//菜单
$adminParams['menuData'] = [
		'content'=>['title'=>'Content','sub'=>
			[	
				['title'=>'Category','sub'=>
					[
						['title'=>'Category List','uri'=>'admin/category'],
					]
				],
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
				],
			]
		],
		'member' => ['title'=>'Member','sub'=>
			[
				['title'=>'Member','sub'=>
					[
						['title'=>'Member List','uri'=>'admin/member'],
					]
				],	
				['title'=>'Comment','sub'=>
					[
						['title'=>'Comment List','uri'=>'admin/comment'],
					]
				]
			]
		],
		'site' => ['title'=>'Site','sub'=>
			[
				['title'=>'Site','sub'=>
					[
						['title'=>'Feedback','uri'=>'admin/feedback'],
					]
				],
				['title'=>'Nav','sub'=>
					[
						['title'=>'Nav category','uri'=>'admin/nav/category'],
						['title'=>'Nav list','uri'=>'admin/nav/index'],
						['title'=>'Nav data','uri'=>'admin/nav/data'],
					]
				]
			]
		]
		
	];

return $adminParams;