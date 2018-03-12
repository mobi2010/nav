<?php 
$this->load->view('account/header',$data);
$commonParams = $initData['commonParams'];

?>  
<table class="table table-striped table-hover">
    
    <?php 
        if(!empty($dataModel)){
            foreach ($dataModel as $key => $value) {
                $m = ci3_encrypt($value['member_id']);
                //$tdBody = html_a(['data-value'=>$m,'text'=>'Follow-','class'=>'unfollowBtn btn btn-danger btn-xs']);
                

                $username = $value['username'];
                $memberBody = html_a(['href'=>ci3_url('member/profile/index',['m'=>$m]),'text'=>html_img(['src'=>$value['avatar_url'],'width'=>'30'])])."&nbsp;";
                $memberBody .= html_a(['href'=>ci3_url('member/profile/index',['m'=>$m]),'text'=>$username,'style'=>'color:#999999']);

                $td = html_td(['body'=>$memberBody]);

                $td .= html_td(['body'=>date("Y-m-d H:i:s",$value['insert_time'])]);
                //$td .= html_td(['body'=>$tdBody]);
                echo html_tr(['body'=>$td]);
            }
        }
    ?>
</table>
<?php 

$pageData['totalCount'] = $totalCount;
$pageData['pageSize'] = $pageSize;
$this->load->view('page',$pageData);

?>


<script type="text/javascript">
$(document).ready(function(){

    $('.unfollowBtn').click(function(){
        var m = $(this).attr('data-value');
        if(!confirm('Unfollow?')){return false;}
        $.post("<?=ci3_url('member/profile/unfollow')?>",{'m':m},function(dt){
            if(dt['code'] !=0){
                $.common.alert(dt);
            }else{
                $.common.refresh();
            }
            
        })
    })

}) 
</script>    


<?php 
$this->load->view('account/footer',$data);
?>