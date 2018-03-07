<?php 
$this->load->view('header',$data);
$commonParams = $initData['commonParams'];

?>  
<style type="text/css">
.table{

    background-color:#fff;
}

.feedback-q{
}

.feedback-a{
    color:#CCCCCC;
}
.table tr:hover{
    background-color:#FFFFCC;
}
</style>
<table class="table">
    <tr >
        <td colspan="3" class="text-right">
            <?php 
            echo html_text(['name'=>'content']);

            ?>
                
        </td>
        <td>
            <?php 
            echo html_button(['value'=>'Feedback','class'=>'btn btn-success feedbackBtn']);

            ?>
                
        </td>
    </tr> 
    <?php 
        if(!empty($dataModel)){
            foreach ($dataModel as $key => $value) {
                $content = "<div class='feedback-q'>Q:".$value['content']."</div>";
                if($value['reply_content']){
                    $content .= "<div class='feedback-a'>A:".$value['reply_content']."</div>";
                }
                
                $tdBody = html_td(['body'=>$content,"class"=>"text-left"]);
                if($value['member_id']){
                    $memberModel = $this->memberModel->getInfo($value['member_id']);
                    $tdBody .= html_td(["body"=>html_a(['href'=>ci3_url('member/profile/index',['m'=>ci3_encrypt($value['member_id'])]),'text'=>$memberModel['username']]),"class"=>"text-center"]); 
                }else{
                    $tdBody .= html_td(["body"=>'guest',"class"=>"text-center"]); 
                }
    
                

                $tdBody .= html_td(['body'=>ci3_time($value['insert_time']),"class"=>"text-center"]);


                if($value['member_id'] && $value['member_id'] == $member_id){
                    $tdBody .= html_td(["body"=>html_a(['text'=>'Delete','data-value'=>ci3_encrypt($value['id']),'class'=>'deleteBtn btn btn-danger btn-xs']),"class"=>"text-center"]);
                }else{
                    $tdBody .= html_td(["body"=>"","class"=>"text-center"]);
                }
                echo html_tr(['body'=>$tdBody]);
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

    $('.feedbackBtn').click(function(){
        var content = $('#content').val();
        $.post("<?=ci3_url('site/feedback/save')?>",{'content':content},function(dt){
            $('#content').val("");
            $.common.refresh();
        })
        return false;
    })

    $('.deleteBtn').click(function(){
        if(!confirm('Deletions?')){return false;}
        var id = $(this).attr('data-value');
        $.post("<?=ci3_url('site/feedback/delete')?>",{'i':id},function(dt){
            $.common.refresh();
        })
    })

}) 
</script>    


<?php 
$this->load->view('footer',$data);
?>