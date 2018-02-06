<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CMS</title>
    <link href="/assets/admin/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/admin/css/site.css" rel="stylesheet">
</head>
<body style="margin: 0px; padding-top: 51px;" scroll="no">
    <nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Edu-CMS</a>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1" class="navbar-nav navbar-right nav">
                    <?php 
                        $menuData = $initData['adminParams']['menuData'];
                        $submenuData = $menuData[$index];
                        foreach ($menuData as $key => $value) {
                            echo $key == $index ? '<li class="active">' : '<li>';
                            echo '<a href="'.ci3_url('admin/index/index',['i'=>base64_encode($key)]).'">'.$value['title'].'</a></li>';
                        }
                    ?>
                    <li>
                        <form action="<?=base_url('admin/login/logout')?>" method="post">
                        <input type="hidden" name="_csrf" value="TkRjZG0xNE0ALDAiHBxcGCsuJTs9QAJ7FHMzETllBBorI1EjIVlWAw=="><button type="submit" class="btn btn-link">Logout (admin)</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <table id="containerTable" class="table border" style="height: 95%; padding: 0px; margin: 0px;">
        <tr>
            <td class="leftMenu" style="vertical-align: top; pading: 0px; margin: 0px;width:160px;background: whiteSmoke;vertical-align: top;">
                <?php 
                    foreach ($submenuData['sub'] as $key => $value) {
                        echo '<div class="tbox">';
                        echo '<div class="hd">';
                        echo '<h3>'.$value['title'].'</h3>';
                        echo '</div>';
                        echo '<div class="bd">';
                        echo '<ul>';
                        foreach ($value['sub'] as $key2 => $value2) {
                            echo '<li><a href="'.ci3_url($value2['uri'],$value2['params']).'" target="mainFrame">'.$value2['title'].'</a></li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                    }

                ?>
                
            </td>
            <td class="mainContent" style="vertical-align: top; padding: 0px; margin: 0px;">
                <iframe  id="mainFrame" name="mainFrame" width="100%" frameborder="0" scrolling="yes" 
                    src="<?=base_url('admin/index/welcome')?>" onLoad="iFrameHeight()"></iframe>
 
            </td>
        </tr>
    </table>
    
    <script src="/assets/admin/js/jquery.js"></script>
<script src="/assets/admin/js/yii.js"></script>
<script src="/assets/admin/js/bootstrap.js"></script></body>
</html>
<script type="text/javascript" language="javascript">
function iFrameHeight() 
{
    var contentHeight = document.body.scrollHeight-70;
    
//  console.log(contentHeight);
    
    var ifm= document.getElementById("mainFrame");
    ifm.height = contentHeight;
}
$(function(){
    $('.navbar-brand').css("marginLeft", "-80px");


    //平台、设备和操作系统  
    var system ={  
        win : false,  
        mac : false,  
        xll : false  
    };  
    //检测平台  
    var p = navigator.platform;    
      
    /**var sUserAgent = navigator.userAgent.toLowerCase(); 
    alert(sUserAgent);*/  
      
    system.win = p.indexOf("Win") == 0;  
    system.mac = p.indexOf("Mac") == 0;  
    system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);  
    //跳转语句  
    if(system.win||system.mac||system.xll){//转向后台登陆页面  
         
    }else{  
        //修改手机样式
        $('nav').height(40);
        $('#w0-collapse').height(40); 
        $('#w0 .container .navbar-brand').remove();
        $('#w1 li').css({ "height":"40px;", "width":"8%", "overflow":"hidden" });
        $('#w1 li a').css({ "height":"10px;", "overflow":"hidden" });
    } 
});
</script>