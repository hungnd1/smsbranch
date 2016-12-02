<?php
/* @var $this MembersController */
/* @var $dataProvider CActiveDataProvider */

?>
<div id="lb-container-header">
    <div style="margin-left: -10px" class="lb-header-right">
        <h3>Thành viên</h3>
    </div>
    <div class="lb-header-left">
        <?php
            $disable = "style=\"display:none;\" readonly";
            if(Members::model()->getRoleSystem()!= Members::THANHVIEN_KHACHHANGADMIN && Members::model()->getRoleSystem()!=Members::THANHVIEN_KHACHHANGDAILY && Members::model()->getRoleSystem()!=Members::THANHVIEN_KHACHHANGDAILYCAPDUOI)
            {
                $this->widget('bootstrap.widgets.TbButton',array(
                            'label'=>'Thêm thành viên',
                            'type'=>'none',
                            'size'=>'normal',
                            'encodeLabel'=>false,
                            'icon'=>'icon-plus',
                            'buttonType'=>'link',
                            'url'=>$this->createUrl('create'),
                ));
                $disable="";
            }
        ?>
    </div>
</div>

<br>
<?php if(Members::model()->getRoleSystem()!=Members::KHACHHANG_ADMIN)
{?>
<div style="margin-top: 0px;">
    <h3>Khách hàng của tôi</h3>
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'gridview-members-my',
	'dataProvider'=>$modelAll->search(),
	'type'=>'striped bordered condensed',
        'template'=>"{items}{pager}",
        'columns'=>array(
            array(
                'header'=>'STT',
                'type'=>'raw',
                'name'=>'pr_primary_key',
                'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            ),
            array(
                'header'=>'Tài khoản',
                'type'=>'raw',
                'name'=>'pr_username',
                'value'=>'$data->pr_username',
            ),
            array(
                'header'=>'Tên thành viên',
                'type'=>'raw',
                'value'=>'\'<a href="\'.YII::app()->createUrl("Members/default/view",array("id"=>$data->pr_primary_key)).\'">\'.$data->memberProfile->pr_member_profile_display_name.\'</a>\'',
            ),
            array(
                'header'=>'Email',
                'type'=>'raw',
                'name'=>'pr_member_email',
                'value'=>'$data->pr_member_email',
            ),
            array(
                'header'=>'Quyền',
                'type'=>'raw',
                'name'=>'role.pr_roles_name',
                'value'=>'$data->role->pr_roles_name',
            ),
           array(
                'header'=>'Actions',
                'headerHtmlOptions'=>array('style'=>'text-align:center;width:120px'),
                'htmlOptions'=>array('style'=>'text-align:center'),
                'type'=>'raw',
                'value'=>'($data->pr_member_status) ? '
                . '\'<a href="#" id="member_delete" '.$disable.' onclick="ajaxDeleteMember(\'.$data->pr_primary_key.\',0);return false;" data-original-title="Xóa" rel="tooltip" title><i class="icon-trash"></i></a>
                    <a href="#" id="member_delete" '.$disable.' onclick="ajaxClockMember(\'.$data->pr_primary_key.\',0,0)" data-original-title="Mở" rel="tooltip" title><i class="icon-ok-circle"></i></a>\''
                . ': \'<a href="#" id="member_delete" '.$disable.' onclick="ajaxDeleteMember(\'.$data->pr_primary_key.\',0);return false;" data-original-title="Xóa" rel="tooltip" title><i class="icon-trash"></i></a>
                    <a href="#" id="member_delete" '.$disable.' onclick="ajaxClockMember(\'.$data->pr_primary_key.\',1,0)" data-original-title="Khóa" rel="tooltip" title><i class="icon-lock"></i></a>\'',
            ),
//            array(
//                'header'=>'',
//                'type'=>'raw',
//                'value'=>'\'<a href="\'.YII::app()->createUrl("site/loginLowerLevel",array("id"=>$data->pr_primary_key)).\'">Đăng nhập</a>\'',
//            ),
        ),
));
}
?>
</div>
<?php if(Members::model()->getRoleSystem()==Members::ADMIN)
{?>
<h3>Thành viên trong hệ thống</h3>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'gridview-members',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
        'template'=>"{items}{pager}",
        'columns'=>array(
            array(
                'header'=>'STT',
                'type'=>'raw',
                'name'=>'pr_primary_key',
                'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            ),
            array(
                'header'=>'Tài khoản',
                'type'=>'raw',
                'name'=>'pr_username',
                'value'=>'$data->pr_username',
            ),
            array(
                'header'=>'Tên thành viên',
                'type'=>'raw',
                'value'=>'\'<a href="\'.YII::app()->createUrl("Members/default/view",array("id"=>$data->pr_primary_key)).\'">\'.$data->memberProfile->pr_member_profile_display_name.\'</a>\'',
            ),
            array(
                'header'=>'Email',
                'type'=>'raw',
                'name'=>'pr_member_email',
                'value'=>'$data->pr_member_email',
            ),
            array(
                'header'=>'Quyền',
                'type'=>'raw',
                'name'=>'role.pr_roles_name',
                'value'=>'$data->role->pr_roles_name',
            ),
            array(
                'header'=>'Actions',
                'headerHtmlOptions'=>array('style'=>'text-align:center;width:120px'),
                'htmlOptions'=>array('style'=>'text-align:center'),
                'type'=>'raw',
                'value'=>'($data->pr_member_status) ? '
                . '\'<a href="#" id="member_delete" '.$disable.' onclick="ajaxDeleteMember(\'.$data->pr_primary_key.\',1);return false;" data-original-title="Xóa" rel="tooltip" title><i class="icon-trash"></i></a>
                    <a href="#" id="member_delete" '.$disable.' onclick="ajaxClockMember(\'.$data->pr_primary_key.\',0,1)" data-original-title="Mở" rel="tooltip" title><i class="icon-ok-circle"></i></a>\''
                . ': \'<a href="#" id="member_delete" '.$disable.' onclick="ajaxDeleteMember(\'.$data->pr_primary_key.\',1);return false;" data-original-title="Xóa" rel="tooltip" title><i class="icon-trash"></i></a>
                    <a href="#" id="member_delete" '.$disable.' onclick="ajaxClockMember(\'.$data->pr_primary_key.\',1,1)" data-original-title="Khóa" rel="tooltip" title><i class="icon-lock"></i></a>\'',
            ),
//            array(
//                'header'=>'',
//                'type'=>'raw',
//                'value'=>'\'<a href="\'.YII::app()->createUrl("site/loginLowerLevel",array("id"=>$data->pr_primary_key)).\'">Đăng nhập</a>\'',
//            ),
        ),
));
}
?>
<script type="text/javascript">
    function ajaxDeleteMember(member_id,gridview_id)
    {
        $.ajax({
            type:'POST',
            url:'<?php echo $this->createUrl('delete'); ?>',
            beforeSend: function(){
                if(confirm('Bạn có chắc muốn xóa thành viên này không?'))
                    return true;
                return false;
            },
            data:{member_id:member_id},
            success: function(data){
                var responseJSON = jQuery.parseJSON(data);
                if(responseJSON.error)
                    alert(responseJSON.error);
                else
                {
                    if(gridview_id==0)
                        $.fn.yiiGridView.update('gridview-members-my');
                    else
                        $.fn.yiiGridView.update('gridview-members');
                }
            },
        });
    }
    function ajaxClockMember(member_id,status_id,gridview_id)
    {
        $.ajax({
            type:'POST',
            url:'<?php echo $this->createUrl('clockMember'); ?>',
            beforeSend: function(){
                //code;
            },
            data:{member_id:member_id,status_id:status_id},
            success: function(data){
                var responseJSON = jQuery.parseJSON(data);
                if(gridview_id==0)
                    $.fn.yiiGridView.update('gridview-members-my');
                else
                    $.fn.yiiGridView.update('gridview-members');
                if(responseJSON.status=="clock")
                    alert('Khóa thành công.');
                else
                    alert('Mở khóa thành công');
            }
        });
    }
</script>