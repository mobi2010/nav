<?php 
$this->load->view('admin/header');
$adminParams = $initData['adminParams'];

?>
    



<form id="ci3Form" method="post" action="<?=base_url('admin/person/batch');?>">

<table class="table table-bordered table-hover">
    <tr>
        <td>
            <label class="control-label">Name：</label>
        </td> 
        <td>
            <input type="text" id="name" class="form-control" name="name" value="<?=$name?>">
        </td>
    </tr>
    <tr>
        <th colspan="4" class="text-center">
            <a href='<?=ci3_url('admin/person/edit',['type'=>$tagType])?>' type="button" id='addBtn' class="btn btn-success">Create</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id='searchBtn'class="btn btn-default">Search</button>
        </th>
    </tr>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <?php 
        if($source == 'images'):

        ?>
        <th>Name</th>
        <th>Avatar</th>
        <th>status</th>
        <th>Operate</th>
        <?php 
        else:
        ?>
        <th>ID</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>birthday</th>
        <th>bust</th>
        <th>waist</th>
        <th>hips</th>
        <th>hobby</th>
        <th>region</th>
        <th>status</th>
        <th>Operate</th>
        <?php 
        endif;
        ?>
    </tr>
    <?php 
        if($source == 'images'){
            foreach ($dataModel as $key => $value) {
                echo '<tr>';
                echo html_td(['body'=>$value['name']]);
                $image = empty($value['personAvatar']) ? "" : html_img(['src'=>$value['personAvatar'][0]['image_url'],'width'=>'100px']);
                echo html_td(['body'=>$image]);

                echo html_td(['body'=>$adminParams['status'][$value['status']]]);
                echo "<td>";
                echo html_a(['data-id'=>$value['id'],'data-name'=>$value['name'],'text'=>'Select','class'=>'selectBtn btn btn-primary btn-xs']);
                echo '</td></tr>';
            }
        }else{
            foreach ($dataModel as $key => $value) {
                echo '<tr>';
                echo html_td(['body'=>html_checkbox(['name'=>'ckbOption[]','value'=>$value['id'],'text'=>$value['id']])]);
                echo html_td(['body'=>$value['name']]);
                $image = empty($value['personAvatar']) ? "" : html_img(['src'=>$value['personAvatar'][0]['image_url'],'width'=>'100px']);
                echo html_td(['body'=>$image]);

                echo html_td(['body'=>date("Y-m-d",$value['birthday'])]);
                echo html_td(['body'=>$value['bust']]);
                echo html_td(['body'=>$value['waist']]);
                echo html_td(['body'=>$value['hips']]);
                echo html_td(['body'=>$value['hobby']]);
                echo html_td(['body'=>$adminParams['region'][$value['region']]]);
                echo html_td(['body'=>$adminParams['status'][$value['status']]]);
                echo "<td>";
                echo '<a class="edit btn btn-primary btn-xs" href="'.ci3_url('admin/person/edit',['id'=>$value['id']]).'" >Edit</a>';
                echo str_repeat('&nbsp;',4);
                echo '<button class="deleteBtn btn btn-danger btn-xs" data-url="'.ci3_url('admin/person/delete',['id'=>$value['id']]).'" >Delete</button></td></tr>';
            }
            $tdBody = html_checkbox(['name'=>'ckbAll','text'=>'All']);
            $tdBody .= str_repeat('&nbsp;',4);
            $tdBody .= html_a(['date-type'=>'update','text'=>'Update','class'=>'batchBtn btn btn-primary btn-xs']);
            $td .= html_td(['body'=>$tdBody,'colspan'=>20]);
            echo html_tr(['body'=>$td]); 
        }            
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
            $.post("<?=base_url('admin/tag/batch');?>?type="+type,$('#ci3Form').serialize(),function(dt){
                $.common.alert(dt);
                $.common.refresh();
            }) 
        }
        return false;
    })

    $('#searchBtn').click(function(){
        var name = $('#name').val();
        var url = "<?=ci3_url('admin/person/index',['source'=>$source])?>&name="+name;
        $.common.location(url);
        return false;
    })

    $('.deleteBtn').click(function(){
        if(!confirm('确定删除?')){return false;}
        var url = $(this).attr('data-url');
        $.get(url,function(dt){
            $.common.alert(dt);
            $.common.location("<?=ci3_url('admin/tag/index',['type'=>$tagType])?>");
        })
    })

    //radio操作
    $('.selectBtn').click(function(){
        var obj = {};
        obj.person_id = $(this).attr('data-id');
        obj.name = $(this).attr('data-name');

        $("#select_person", window.parent.document).html('');
        html = "["+obj.name+":"+obj.person_id+"]\n\
                        <input type='hidden' name='person_id' value='"+obj.person_id+"'/>"
        $("#select_person", window.parent.document).html(html); 
    });
})
</script> 
