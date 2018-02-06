<?php 
    $audioParams = $initData['audioParams'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>育儿微课_育儿视频-育儿大师</title>
    <meta name="keywords" content="育儿微课,育儿视频" />
    <meta name="description" content="育儿微课是第一个为新生代妈妈提供母婴专家育儿知识的微视频服务，面向全网会员征集各种孕育难题，由专家亲身参与视频拍摄，为广大妈妈网友解决各种孕育难题。" />
    <meta name="applicable-device" content="pc">
    <link rel="alternate" media="only screen and（max-width: 640px）" href="http://yuerdashi.3uol.com/home/index/?cid=0">
    <link rel="stylesheet" type="text/css" href="/assets/video/css/iconfont.css">
    <link rel="stylesheet" type="text/css" href="/assets/video/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/video/css/video.css" />
    <link rel="stylesheet" type="text/css" href="/assets/video/css/video1.1.css">

</head>
<body>
<div class="header-warp">
    <div class="header">
        <h1><a href="">育儿大师 - 宝宝有问题，专家来帮您</a></h1>
        <ul>
            <?php 
            foreach ($audioParams['menuData'] as $key => $value) {
                $menuParams = ['href'=>ci3_url($value['uri']),'text'=>$value['title']];
                $menuParams['class'] = strpos($audioParams['navIndex'],$value['uri']) === false ? '' : 'current';
                echo '<li>'.html_a($menuParams).'</li>';
            }
            ?>
        </ul>
    </div>
</div>