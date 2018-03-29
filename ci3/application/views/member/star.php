<?php 
$this->load->view('header',$data);

?>  
<style type="text/css">


.title{
    margin-top:1em; 
    font-size:large; 
    font-weight:bold; 
    color:#FFFFFF;
    background-color:#337ab7;
    padding: .5em 1em;
    width: 10em;
    overflow: hidden;
    clear: both;
}
.member-info{
    font-weight:bold; 
    display:inline-block;
    margin: 1em 2em 0px 0px;
    background-color:#FFFFFF;
    padding: .5em;
    text-align: center;
}

.member-avatar{
    display: block;
}
.member-name{
    margin-top: .5em;
    text-align: center;
    width: 8em;
    overflow:hidden;
    display:inline-block;
    height: 1.5em;
}
.nickname:hover{
    color: red;
}

</style>
<div class="nav">
<?php 
echo html_div(['body'=>'Female','class'=>'title']);
$subHtml = null;
foreach ($dataModel as $key => $value) {
    $url = ci3_url('member/profile/index',['m'=>ci3_encrypt($value['id'])]);

    $avatarBody = html_a(['href'=>$url,'text'=>html_img(['src'=>$value['avatar_url'],'height'=>'100px'])]);
    $memberBody = html_div(['body'=>$avatarBody,'class'=>'member-avatar']);
    $nicknameBody = html_a(['href'=>$url,'text'=>$value['nickname'].'波多野結衣','class'=>'nickname']);
    $memberBody .= html_div(['body'=>$nicknameBody,'class'=>'member-name']);

    $subHtml .= html_div(["body"=>$memberBody,'class'=>'member-info']);

    
}
echo html_div(['body'=>$subHtml]);


echo html_div(['body'=>'Male','class'=>'title']);

?>
</div>

<?php 
$pageData['totalCount'] = $totalCount;
$pageData['pageSize'] = $pageSize;
$this->load->view('page',$pageData);
?>

<script type="text/javascript">
$(document).ready(function(){


}) 
</script>    


<?php 
$this->load->view('footer',$data);
?>