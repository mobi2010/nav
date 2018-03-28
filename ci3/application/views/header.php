<?php 
    $commonParams = $initData['commonParams'];

    $htmlTitle = $htmlTitle ? $htmlTitle : "iav18"; 
    $htmlKeywords = $htmlKeywords ? $htmlKeywords :  "iav18"; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="<?=$htmlKeywords;?>" />
    <title><?=$htmlTitle;?></title>

    <link href="/assets/common/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/common/css/site.css" rel="stylesheet">

    <script src="/assets/common/js/jquery.js"></script>
    <script src="/assets/common/js/common.js"></script>

</head>

<style>
body{
    background-color:#eee;
}

.current{
    color:red;
    font-weight:bold;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
}) 
</script> 

<body style="background:#eee">
<script type="text/javascript">
$(document).ready(function(){
    //$.common.init();
    $('.searchBtn').click(function(){
        var keyWord = $('#keyWord').val()
        var url = "<?=ci3_url('index')?>?w="+keyWord
        window.location.href = url;
    })
}) 
</script>    
<div class="breadcrumbContainer" >
    <ul class="breadcrumb" style="line-height:3em;background: #fff;padding: 1em 3.5em;color:#999999">
        <a style="text-indent:-9999px;width:12em;background: url(/assets/common/images/logo.png) center no-repeat;display: inline-block;" href="<?=ci3_url('index')?>">iav18</a>

        <span style="display: inline-block;float: right;">
            <?php 
            echo html_text(['id'=>'keyWord','value'=>$keyWord,'style'=>'display:inline-block;width:10em;height:2.5em;']);
            echo "&nbsp;";
            echo html_button(['style'=>'line-height:1em;','class'=>'btn btn-success searchBtn','value'=>'Search']);
            ?>
        </span> 
        <span style="display: inline-block;float: right;">
        <?php 

        $identity = ci3_getcookie('identity');
        if($identity){
            $id = $this->aes->decrypt($identity);
            $memberRow = $this->memberModel->getInfo($id);
        }
        if(empty($memberRow)){
            echo html_a(['href'=>ci3_url('member/signin'),'text'=>'Sign in']);
            echo "&nbsp;|&nbsp;";
            echo html_a(['href'=>ci3_url('member/signup'),'text'=>'Sign up']);
        }else{

            if($memberRow['status'] == 1){//被冻结
                ci3_delcookie('identity');
                redirect('index');
            }

            echo html_a(['href'=>ci3_url('member/account/profile'),'text'=>html_img(['src'=>$memberRow['avatar_url'],'height'=>'30em'])]);
        }
        
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        ?>
        </span>
        <span style="display: inline-block;float: right;">
        <?php 
        foreach ($commonParams['menuDataFront'] as $key => $value) {
            $menuParams = ['href'=>ci3_url($value['uri']),'text'=>$value['title']];
            $menuParams['class'] = '';
            if(!$_GET['i']){
                $menuParams['class'] = $uriEntity['uri_string'] == $value['uri'] ? 'current' : '';
            }
            $htmlNav[] = html_a($menuParams);
        }

        

        $categoryData = $this->categoryModel->getKv();
        foreach ($categoryData as $key => $value) {
            $i = ci3_encrypt($key);
            $menuParams = ['href'=>ci3_url('index',['i'=>$i]),'text'=>$value];
            $menuParams['class'] = '';
            if($_GET['i']){
                $menuParams['class'] = $_GET['i'] == $i ? 'current' : '';
            }

            $htmlNav[] = html_a($menuParams);
        }

        foreach ($commonParams['menuDataEnd'] as $key => $value) {
            $menuParams = ['href'=>ci3_url($value['uri']),'text'=>$value['title']];
            $menuParams['class'] = '';
            if(!$_GET['i']){
                $menuParams['class'] = $uriEntity['uri_string'] == $value['uri'] ? 'current' : '';
            }
            $htmlNav[] = html_a($menuParams);
        }

        echo implode($htmlNav,'&nbsp;&nbsp;/&nbsp;&nbsp;').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        ?>
        </span>
        
    </ul>       
</div>
<div class="container" style="padding: 8px; padding-bottom: 40px;width: 95%;">
    