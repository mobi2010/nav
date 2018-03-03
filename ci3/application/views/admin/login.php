<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CMS</title>
    <link href="/assets/common/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/common/css/site.css" rel="stylesheet">
    <script src="/assets/common/js/jquery.js"></script>
    <script src="/assets/common/js/common.js"></script>
</head>
<body>

<div class="admin-login"  style="width:340px; height:auto;margin: 120px auto 0;">
    <h1>NAV-CMS</h1>
        <div class="form-group field-adminloginform-username required">
            <label class="control-label" for="adminloginform-username">Username:</label>
            <input type="text" id="uname" value="" class="form-control" name="Login[username]">

            <div class="help-block"></div>
        </div>        
        <div class="form-group field-adminloginform-password required">
            <label class="control-label" for="adminloginform-password">Password:</label>
            <input type="password" id="upwd" class="form-control" name="Login[password]">

            <div class="help-block"></div>
        </div>  
        <div class="form-group">
            <button id="loginBtn" type="submit" class="btn btn-primary">Login</button>        
        </div>
</div><!-- admin-login -->

</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        var verify = function(){
            var uname = $('#uname').val();
            var upwd = $('#upwd').val();
            if(!uname){alert('Account not null');return;}
            if(!upwd){alert('Password not null');return;}

            $.post('<?=base_url("admin/login/checked");?>',{'uname':uname,'upwd':upwd},function(dt){
                if(dt['code'] == 0){
                    $.common.location('<?=base_url("admin/index");?>');
                }else{
                    alert(dt.message);
                }
            })
            
        }

        $('#upwd').focus(function(){
            $(document).unbind('keyup').bind('keyup',function(e){
                if(e.keyCode == 13){
                    verify();
                }            
            })
        }) 

        $('#loginBtn').click(function(){
            verify();
            return false;
        })
    })
</script>   