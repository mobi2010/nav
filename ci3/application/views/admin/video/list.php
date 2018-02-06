<?php 
$this->load->view('admin/header');
?>
    

<div class="breadcrumbContainer">
    <ul class="breadcrumb"><li class="active">分类管理</li></ul>       
</div>


<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">关键词：</label>
        </td> 
        <td>
            <input type="text" id="title" class="form-control" name="title" value="<?=$title?>">
        </td>
    </tr>
    <tr>
        <th colspan="4" class="text-center">
            <a href='<?=ci3_url('admin/video/edit')?>' type="button" id='addBtn' class="btn btn-success">创建</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id='searchBtn'class="btn btn-default">查询</button>
        </th>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>图片</th>
        <th>分类</th>
        <th>更新时间</th>
        <th>操作</th>
    </tr>
    <?php 
        if(!empty($dataModel)){
            foreach ($dataModel as $key => $value) {
                $tdBody = html_a(['href'=>ci3_url('admin/video/edit',['id'=>$value['id']]),'text'=>'修改','class'=>'edit btn btn-primary btn-xs']);
                $tdBody .= str_repeat('&nbsp;',4);
                $tdBody .= html_a(['text'=>'删除','data-value'=>$value['id'],'class'=>'deleteBtn btn btn-danger btn-xs']);
                
                $td = html_td(['body'=>$value['id']]);
                $td .= html_td(['body'=>$value['title']]);
                $td .= html_td(['body'=>html_img(['src'=>$value['image_url']])]);
                $td .= html_td(['body'=>$categoryData[$value['category_id']]]);
                $td .= html_td(['body'=>date("Y-m-d H:i:s",$value['update_time'])]);
                $td .= html_td(['body'=>$tdBody]);
                echo html_tr(['body'=>$td]);
            }
        }
    ?>
</table>
<?php
    $pageData['totalCount'] = $totalCount;
    $this->load->view('admin/page',$pageData);
    $this->load->view('admin/footer');
?>
<script type="text/javascript">
$(document).ready(function() {
    $('#searchBtn').click(function(){
        var title = $('#title').val();
        var url = "<?=ci3_url('admin/video/index')?>?title="+title;
        $.common.location(url);
        return false;
    })

    $('.deleteBtn').click(function(){
        if(!confirm('确定删除?')){return false;}
        var id = $(this).attr('data-value');
        $.post("<?=ci3_url('admin/video/delete')?>",{'id':id},function(dt){
            $.common.alert(dt);
            $.common.location("<?=ci3_url('admin/video/index',['type'=>$videoType])?>");
        })
    })
})
</script> 
