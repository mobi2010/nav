<?php 
$this->load->view('admin/header');
$adminParams = $initData['adminParams'];
?>


<form id="ci3Form" enctype="multipart/form-data" action="<?=ci3_url('admin/person/save')?>" method="post">
<table class="table table-striped table-bordered" style="width: 100%;" id="tag_table">
    <tr >
        <td><label>Name:</label></td>
        <td><?=html_text(['name'=>'name','value'=>$dataModel['name']])?>
        <?php 
            echo html_hidden(['name'=>'id','value'=>$dataModel['id']]);   
        ?>
        </td>
    </tr>
    
    <tr >
        <td><label>Avatar:</label></td>
        <td class='tr-avatar'>
        <?php        
            $personAvatar = $dataModel['personAvatar'];    
            foreach ($personAvatar as $key => $value) {
                $body = html_img(['src'=>$value['image_url']]);
                $body .= html_button(['name'=>'avatarDelBtn','value'=>'Delete','class'=>'avatarDelBtn','data-id'=>$value['id']]); 
                echo html_div(['body'=>$body,'id'=>'div_avatar_'.$value['id']]);
            }

            echo html_file(['name'=>'Avatar[]']);
            echo html_button(['name'=>'avatarCloneBtn','value'=>'Clone']);
        ?>
        </td>
    </tr>

    <tr >
        <td><label>Bust:</label></td>
        <td><?=html_text(['name'=>'bust','value'=>$dataModel['bust']])?></td>
    </tr>

    <tr >
        <td><label>Waist:</label></td>
        <td><?=html_text(['name'=>'waist','value'=>$dataModel['waist']])?></td>
    </tr>

    <tr >
        <td><label>Hips:</label></td>
        <td><?=html_text(['name'=>'hips','value'=>$dataModel['hips']])?></td>
    </tr>

    <tr >
        <td><label>Hobby:</label></td>
        <td><?=html_text(['name'=>'hobby','value'=>$dataModel['hobby']])?></td>
    </tr>
    

    <tr >
        <td><label>Introduction:</label></td>
        <td><?=html_textarea(['name'=>'introduction','value'=>$dataModel['introduction']])?></td>
    </tr>
    <tr >
        <td><label>Birthday:</label></td>
        <td><?php 
        $birthday = $dataModel['birthday'] ? date("Y-m-d",$dataModel['birthday']) : null;
        echo html_text(['name'=>'birthday','value'=>$birthday,'onClick'=>"WdatePicker({dateFmt:'yyyy-MM-dd'})"]);
        ?></td>
    </tr>
    <tr >
        <td><label>Gender:</label></td>
        <td><?=html_select(['name'=>'gender','selected'=>$dataModel['gender'],'options'=>$adminParams['gender']]);?></td>
    </tr>


    <tr >
        <td><label>Identity:</label></td>
        <td>
            <?php  
            $personIdentity = $dataModel['personIdentity'];
            foreach ($identityTagData as $id => $name) {
                $ckb['name'] = 'identity[]';
                $ckb['checked'] =  $personIdentity[$id] ? 'checked' : null;
                $ckb['text'] = $name;
                $ckb['value'] = $id;
                echo html_checkbox($ckb);
            }
            
            ?>
                
        </td>
    </tr>

    <tr >
        <td><label>Region:</label></td>
        <td><?=html_select(['name'=>'region','selected'=>$dataModel['region'],'options'=>$adminParams['region']]);?></td>
    </tr>
    <tr >
        <td><label>Status:</label></td>
        <td>
        <?=html_select(['name'=>'status','selected'=>$dataModel['status'],'options'=>$adminParams['status']]);?>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2">
            <button type="button" class="btn btn-default backBtn">Back</button> 
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" id="saveBtn" class="btn btn-primary">Save</button> 
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
        $('#ci3Form').submit();
        return false;       
    })

    $('#avatarCloneBtn').click(function(){
        $('.tr-avatar').append('<?=html_file(['name'=>'Avatar[]'])?>')

    })

    $('.avatarDelBtn').click(function(){
        if(!confirm('Delete?')){return false;}
        id = $(this).attr('data-id')
        $.post("<?=base_url('admin/person/delavatar');?>",{'id':id},function(dt){
            $('#div_avatar_'+id).remove()
        })
        return false;  
    })
}) 
</script>    
<script language="javascript" type="text/javascript" src="/assets/plugins/My97DatePicker/WdatePicker.js"></script>
