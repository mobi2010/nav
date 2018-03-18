<?php 
$this->load->view('admin/header');
?>
<form id="ci3Form" method="post" action="<?=base_url('admin/article/batch');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">Title：</label>
        </td> 
        <td>
            <input type="text" id="title" class="form-control" name="title" value="<?=$title?>">
        </td>
        <td>
            <label class="control-label">Tag：</label>
        </td> 
        <td>
            <?php 
                $tagModel = ["--ALL--"]+$tagModel;
                echo html_select(['name'=>"tag_id",'selected'=>$tag_id,'options'=>$tagModel]);
            ?>
        </td>
        <td>
            <label class="control-label">Member Id：</label>
        </td> 
        <td>
            <input type="text" id="member_id" class="form-control" name="member_id" value="<?=$member_id?>">
        </td>
    </tr>
    <tr>
        <th colspan="10" class="text-center">
            <a href='<?=ci3_url('admin/article/edit')?>' type="button" id='addBtn' class="btn btn-success">Create</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id='searchBtn'class="btn btn-default">Select</button>
        </th>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Member ID</th>
        <th>Operate</th>
    </tr>
    <?php 
        if(!empty($dataModel)){
            foreach ($dataModel as $key => $value) {
                $tdBody = html_a(['href'=>ci3_url('admin/article/edit',['id'=>$value['id']]),'text'=>'修改','class'=>'edit btn btn-primary btn-xs']);
                $tdBody .= str_repeat('&nbsp;',4);
                $tdBody .= html_a(['href'=>ci3_url('admin/article/edit',['id'=>$value['id'],'action'=>'copy']),'text'=>'复制','class'=>'edit btn btn-warning btn-xs']);
                $tdBody .= str_repeat('&nbsp;',4);
                $tdBody .= html_a(['text'=>'删除','data-value'=>$value['id'],'class'=>'deleteBtn btn btn-danger btn-xs']);
                
                $td = html_td(['body'=>html_checkbox(['class'=>'ckbOne','data-name'=>$value['name'],'name'=>'ckbOption[]','value'=>$value['id'],'text'=>$value['id']])]);;
                $td .= html_td(['body'=>html_a(['target'=>"_blank",'href'=>ci3_url('article/detail',['id'=>$value['id']]),'text'=>$value['title']])]);

                $td .= html_td(['body'=>html_a(['href'=>ci3_url('admin/article/index',['category_id'=>$value['category_id']]),'text'=>$value['category_id']])]);
                $td .= html_td(['body'=>html_a(['href'=>ci3_url('admin/member',['member_id'=>$value['member_id']]),'text'=>$value['member_id']])]);
                $td .= html_td(['body'=>$tdBody]);
                echo html_tr(['body'=>$td]);
            }
            $tdBody = html_checkbox(['name'=>'ckbAll','text'=>'All']);
            $tdBody .= str_repeat('&nbsp;',4);
            $tdBody .= html_a(['date-type'=>'delete','text'=>'Delete','class'=>'batchBtn btn btn-danger btn-xs']);
            $td = html_td(['body'=>$tdBody,'colspan'=>6]);
            echo html_tr(['body'=>$td]);   
        }
    ?>
</table>
</form>
<?php
    $pageData['totalCount'] = $totalCount;
    $pageData['pageSize'] = $pageSize;
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
            if(!confirm('确定删除?')){return false;}
            $.post("<?=base_url('admin/article/batch');?>?type="+type,$('#ci3Form').serialize(),function(dt){
                $.common.alert(dt);
                $.common.refresh();
            }) 
        }
        return false;
    })


    $('#searchBtn').click(function(){
        var title = $('#title').val();
        var tag_id = $('#tag_id').val();
        var member_id = $('#member_id').val();
        var url = "<?=ci3_url('admin/article/index')?>?title="+title+"&tag_id="+tag_id+"&member_id="+member_id;
        $.common.location(url);
        return false;
    })

    $('.deleteBtn').click(function(){
        if(!confirm('确定删除?')){return false;}
        var id = $(this).attr('data-value');
        $.post("<?=ci3_url('admin/article/delete')?>",{'id':id},function(dt){
            $.common.alert(dt);
            $.common.location("<?=ci3_url('admin/article/index',['type'=>$articleType])?>");
        })
    })
})
</script> 
