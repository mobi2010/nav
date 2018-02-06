<?php 
$this->load->view('admin/header');
?>
    

<div class="breadcrumbContainer">
    <ul class="breadcrumb"><li class="active">分类管理</li></ul>       
</div>

<form id="ci3Form" method="post" action="<?=base_url('admin/category/batch');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">关键词：</label>
        </td> 
        <td>
            <input type="text" id="name" class="form-control" name="name" value="<?=$name?>">
        </td>
    </tr>
    <tr>
        <th colspan="4" class="text-center">
            <a href='<?=ci3_url('admin/category/edit',['type'=>$categoryType])?>' type="button" id='addBtn' class="btn btn-success">创建</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id='searchBtn'class="btn btn-default">查询</button>
        </th>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>排序</th>
        <th>操作</th>
    </tr>
    <?php 
        foreach ($dataModel as $key => $value) {
            echo '<tr>';
            echo html_td(['body'=>html_checkbox(['name'=>'ckbOption[]','value'=>$value['id'],'text'=>$value['id']])]);
            echo html_td(['body'=>$value['name']]);
            echo html_td(['body'=>html_text(['value'=>$value['sort_id'],'size'=>1,'name'=>"sort_id[{$value['id']}]"])]);
            echo "<td>";
            echo '<a class="edit btn btn-primary btn-xs" href="'.ci3_url('admin/category/edit',['id'=>$value['id']]).'" >修改</a>';
            echo str_repeat('&nbsp;',4);
            echo '<button class="deleteBtn btn btn-danger btn-xs" data-url="'.ci3_url('admin/category/delete',['id'=>$value['id']]).'" >删除</button></td></tr>';
        }
        $tdBody = html_checkbox(['name'=>'ckbAll','text'=>'全选']);
        $tdBody .= str_repeat('&nbsp;',4);
        $tdBody .= html_a(['date-type'=>'update','text'=>'更新','class'=>'batchBtn btn btn-primary btn-xs']);
        $td .= html_td(['body'=>$tdBody,'colspan'=>4]);
        echo html_tr(['body'=>$td]);     
    ?>
    
</table>
</form>
<?php
    $pageData['totalCount'] = $totalCount;
    $this->load->view('admin/page',$pageData);
    $this->load->view('admin/footer');
?>
<script type="text/javascript">
$(document).ready(function() {
    checkAll.init({'allBtn':'ckbAll','oneName':'ckbOption'});  
    $('.batchBtn').click(function(){
        var type = $(this).attr('date-type');
        if($("input[name='ckbOption[]']:checked").length == 0){
            $.common.alert({"message":"请选择"});
        }else{
            $.post("<?=base_url('admin/category/batch');?>?type="+type,$('#ci3Form').serialize(),function(dt){
                $.common.alert(dt);
                $.common.refresh();
            }) 
        }
        return false;
    })

    $('#searchBtn').click(function(){
        var name = $('#name').val();
        var url = "<?=ci3_url('admin/category/index',['type'=>$categoryType])?>&name="+name;
        $.common.location(url);
        return false;
    })

    $('.deleteBtn').click(function(){
        if(!confirm('确定删除?')){return false;}
        var url = $(this).attr('data-url');
        $.get(url,function(dt){
            $.common.alert(dt);
            $.common.location("<?=ci3_url('admin/category/index',['type'=>$categoryType])?>");
        })
    })
})
</script> 
