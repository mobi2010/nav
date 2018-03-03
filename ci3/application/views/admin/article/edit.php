<script>     
    var del_tag = function(id){
        var article_id = "<?=$dataModel['id']?$dataModel['id']:0;?>";
        $.post("<?=base_url('admin/article/deltag');?>",{'tag_id':id,"article_id":article_id},function(dt){
            //$.common.alert(dt);
            $('.span-tag-'+id).remove();
        })
    }
</script>    
<?php 
$this->load->view('admin/header');
?>
<script type="text/javascript" charset="utf-8" src="/assets/plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/assets/plugins/ueditor/ueditor.all.min.js"></script>

<form id="ci3Form" enctype="multipart/form-data" action="<?=ci3_url('admin/article/save')?>" method="post">
    <table class="table table-striped table-bordered" style="width: 100%;" id="tag_table">
        <tr >
            <td><label>Title:</label></td>
            <td>
            <?=html_text(['name'=>'title','value'=>$dataModel['title']]);?>
            </td>
        </tr>

        <tr >
            <td><label>Cover Image:</label></td>
            <td>
            <?php
            if($dataModel['cover_image']) {
                echo html_img(['src'=>$dataModel['cover_image']]);
            }
            echo html_hidden(['name'=>'id','value'=>$dataModel['id']]);   
            echo html_hidden(['name'=>'cover_image','value'=>$dataModel['cover_image']]);    
            echo html_file(['name'=>'Filedata']);
            ?>
            </td>
        </tr>
        <tr >
            <td><label>Abstract:</label></td>
            <td>
            <?=html_text(['name'=>'abstract','value'=>$dataModel['abstract']]);?>
            </td>
        </tr>
        <tr >
            <td><label>Tag:</label></td>
            <td>
            <?php 
            echo html_a(['class'=>'btn btn-success tagBtn','text'=>'Select Tag']);
            $tags = $dataModel['tags'];
            $body = null;
            if(!empty($tags)){
                foreach ($tags as $key => $value) {
                    $tagOne = html_a(['text'=>"[{$key}:{$value}]",'class'=>'delTag','onclick'=>"del_tag({$key})"]);
                    $tagOne .= html_hidden(['name'=>'tag[]','value'=>$key]);
                    $body .= html_span(['body'=>$tagOne,'class'=>'span-tag-'.$key]);
                }
            }
            
            echo html_div(['id'=>'select_tag','body'=>$body]);

            ?>
            </td>
        </tr>
        <tr >
            <td><label>Content:</label></td>
            <td>
            <script id="editor" type="text/plain" style="width:100%;height:300px;">
            <?=$dataModel['content'];?>
            </script>
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
<?php    
$this->load->view('admin/footer');
?>    
<script type="text/javascript">
$(document).ready(function(){
    //ue editor
    var ue = UE.getEditor('editor');

    $('#saveBtn').click(function(){
        var title = $('#title').val();
        if(!title){
            $.common.alert({'message':'标题不能为空'});
            return false;
        }
        
        var content = UE.getEditor('editor').getContent();

        if(!content){
            $.common.alert({'message':'内容不能为空'});
            return false;
        }
        $('#ci3Form').submit();
        return false;       
    })

    //字幕
    $('.tagBtn').click(function(){
        var v = $(this).attr('data-value');
        var d = dialog({
            title: "title",
            url : '<?=ci3_url('admin/tag/index',['source'=>'article'])?>',
            width:800,
            zIndex:2030,
            onclose: function(){
            }
        });
        d.show();
    });
    //$('.delTag').off().on('click',del_tag)
}) 
</script>    