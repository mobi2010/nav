<?php 
$this->load->view('account/header',$data);
$commonParams = $initData['commonParams'];

?>  
<style type="text/css">
.tips{
    color:#999;
    font-size: .5em;
}

</style>


<script type="text/javascript" charset="utf-8" src="/assets/plugins/ueditor_client/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/assets/plugins/ueditor_client/ueditor.all.min.js"></script>

<form id="ci3Form" enctype="multipart/form-data" action="<?=ci3_url('member/account/postsave')?>" method="post">
    <table class="table" style="width: 100%;" id="tag_table">
        <?php 
        echo html_hidden(['name'=>'id','value'=>$dataModel['id']]);   
        ?>
        <tr >
            <td align="right"><label>Title<font color="#FF0000">*</font></label></td>
            <td>
            <?=html_text(['name'=>'title','value'=>$dataModel['title']]);?>
            </td>
        </tr>
<!-- 
        <tr >
            <td align="right"><label>Cover Image</label></td>
            <td>
            <?php
            // if($dataModel['cover_image']) {
            //     echo html_img(['src'=>$dataModel['cover_image']]);
            // }
            
            // echo html_hidden(['name'=>'cover_image','value'=>$dataModel['cover_image']]);    
            // echo html_file(['name'=>'Filedata']);
            ?>
            </td>
        </tr> -->
        <tr >
            <td align="right"><label>Abstract</label></td>
            <td>
            <?=html_text(['name'=>'abstract','value'=>$dataModel['abstract']]);?>
            </td>
        </tr>
        <tr >
            <td align="right"><label>Tag</label></td>
            <td>
            <?php 
            if(empty($dataModel['tags'])){
                $tags = [];
            }else{
                $tags = ci3_array_values($dataModel['tags']);
            }
             
            
            for($i=0;$i<5;$i++){
                echo html_text(['name'=>'tags[]','value'=>$tags[$i],'style'=>'width:8em;display: inline-block;'])."&nbsp;&nbsp;";
            }

            echo "<label class='tips'>(Up to five tag.)</label>";
            ?>
            </td>
        </tr>
        <tr >
            <td align="right"><label>Content<font color="#FF0000">*</font></label></td>
            <td>
            <script id="editor" type="text/plain" style="width:100%;height:300px;">
            <?=$dataModel['content'];?>
            </script>
            </td>
        </tr>
        <tr >
            <td align="right"><label>Category<font color="#FF0000">*</font></label></td>
            <td>
            <?=html_select(['name'=>'category_id','selected'=>$dataModel['category_id'],'options'=>$categoryData]);?>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <?php 
                    echo html_button(['class'=>'btn btn-default backBtn','value'=>'Back']);
                    echo str_repeat("&nbsp",4);
                    echo html_button(['id'=>'saveBtn','class'=>'btn btn-primary','value'=>'Save']);
                ?>
            </td>
        </tr> 
    </table>
</form>





<script type="text/javascript">
$(document).ready(function(){

    //ue editor
    var ue = UE.getEditor('editor');

    $('#saveBtn').click(function(){
        var title = $('#title').val();
        if(!title){
            $.common.alert({'message':'Please enter the title'});
            return false;
        }
        
        var content = UE.getEditor('editor').getContent();

        if(!content){
            $.common.alert({'message':'Please enter the title content'});
            return false;
        }
        $('#ci3Form').submit();
        return false;       
    })
    $('.backBtn').click(function(){
        window.history.back();return false;
    })

}) 
</script>    


<?php 
$this->load->view('account/footer',$data);
?>