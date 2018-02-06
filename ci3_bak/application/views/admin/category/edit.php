<?php 
$this->load->view('admin/header');
?>

<div class="breadcrumbContainer">
    <ul class="breadcrumb"><li class="active">添加分类</li></ul>       
</div>
<form id="ci3Form" method="post">
<table class="table table-striped table-bordered" style="width: 100%;" id="tag_table">
    <tr >
        <td><label>名称:</label></td>
        <td><input type='text' name="name" class='form-control' id="name" value="<?=$dataModel['name']?>">
        <?php 
            echo html_hidden(['name'=>'id','value'=>$dataModel['id']]);   
            echo html_hidden(['name'=>'type','value'=>$categoryType]); 
        ?>
        </td>
    </tr>
    <tr >
        <td><label>排序:</label></td>
        <td>
        <?php 
            echo html_text(['value'=>$dataModel['sort_id'],'name'=>'sort_id']);
        ?>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2">
            <button type="button" class="btn btn-default backBtn">返回</button> 
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id="saveBtn" class="btn btn-primary">保存</button> 
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
        var name = $('#name').val();
        if(!name){
            $.common.alert({'message':'名称不能为空'});
            return false;
        }
        $.post("<?=base_url('admin/category/save');?>",$('#ci3Form').serialize(),function(dt){
            $.common.alert(dt);
            $.common.location("<?=ci3_url('admin/category/index',['type'=>$categoryType])?>");
        })
        return false;       
    })
}) 
</script>    