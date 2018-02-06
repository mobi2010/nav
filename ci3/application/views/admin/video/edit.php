<?php 
$this->load->view('admin/header');
?>
<script src="/assets/plugins/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/assets/plugins/uploadify/uploadify.css">
<div class="breadcrumbContainer">
    <ul class="breadcrumb"><li class="active">添加分类</li></ul>       
</div>
<form id="ci3Form" enctype="multipart/form-data" action="<?=ci3_url('admin/video/save')?>" method="post">
    <table class="table table-striped table-bordered" style="width: 100%;" id="tag_table">
        <tr >
            <td><label>标题:</label></td>
            <td>
            <?=html_text(['name'=>'title','value'=>$dataModel['title']]);?>
            </td>
        </tr>
        <tr >
            <td><label>摘要:</label></td>
            <td>
            <?=html_textarea(['name'=>'abstract','value'=>$dataModel['abstract'],"rows"=>"5"]);?>
            </td>
        </tr>
        <tr >
            <td><label>分类:</label></td>
            <td>
            <?=html_select(['name'=>'category_id','selected'=>$dataModel['category_id'],'options'=>$categoryData]);?>
            </td>
        </tr>
        <tr >
            <td><label>图片:</label></td>
            <td>
            <?php
            if($dataModel['image_url']) {
                echo html_img(['src'=>$dataModel['image_url']]);
            }
            echo html_hidden(['name'=>'id','value'=>$dataModel['id']]);   
            echo html_hidden(['name'=>'image_url','value'=>$dataModel['image_url']]);    
            echo html_file(['name'=>'Filedata']);
            ?>
            </td>
        </tr>
        <tr >
            <td><label>视频地址:</label></td>
            <td>
            <?=html_text(['name'=>'video_url','value'=>$dataModel['video_url']]);?>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <?php 
                    echo html_button(['class'=>'btn btn-default backBtn','value'=>'返回']);
                    echo str_repeat("&nbsp",4);
                    echo html_button(['id'=>'saveBtn','class'=>'btn btn-primary','value'=>'保存']);
                ?>
            </td>
        </tr> 
    </table>
</form>
<?php    
$this->load->view('admin/footer');
?>    
<script type="text/javascript">
$(document).ready(function(){
    $('#saveBtn').click(function(){
        var title = $('#title').val();
        if(!title){
            $.common.alert({'message':'标题不能为空'});
            return false;
        }
        var abstract = $('#abstract').val();
        if(!abstract){
            $.common.alert({'message':'描述不能为空'});
            return false;
        }
        var image_url = $('#image_url').val();
        var Filedata = $('#Filedata').val();
        if(!image_url && !Filedata){
            $.common.alert({'message':'图片不能为空'});
            return false;
        }
        var video_url = $('#video_url').val();
        if(!video_url){
            $.common.alert({'message':'视频地址不能为空'});
            return false;
        }
        $('#ci3Form').submit();
        return false;       
    })
}) 
</script>    