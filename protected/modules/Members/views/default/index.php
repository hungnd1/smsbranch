<?php
/* @var $this MembersController */
/* @var $dataProvider CActiveDataProvider */
/* @var $model Members */

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
        <?php if(Members::model()->getRoleSystem()== Members::KHACHHANG_ADMIN || Members::model()->getRoleSystem()==Members::KHACHHANG_DAILY || Members::model()->getRoleSystem()==Members::KHACHHANGDAILY_CAPDUOI){ ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'htmlOptions' => array('onclick' => 'create()'),
            'type' => 'primary',
            'label' => 'Cấu hình tài khoản',
        ));
        ?>
        <?php } ?>
    </div>
</div>
<br>
<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal')
); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div>

<div class="modal-body">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'members-form',
        'type'=>'horizontal',
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
    )); ?>
    <div class="row" style='float:left;margin-left:57px;margin-bottom: 20px;'>
        <?php echo $form->checkBox($model,'is_fix', array('id'=>'checkbox1','value' => 'Y', 'uncheckvalue'=>'N')); ?>
        <?php echo '<span for="label" style="margin-bottom:5px;font-size: 0.9em;font-weight: bold;">Cho phép thành viên sửa điểm của tất cả cac môn trong lớp</span><br />'; ?>
        <?php echo $form->error($model,'is_fix'); ?>
    </div>

    <div class="row" style='float:left;;margin-left:5px'>
        <?php echo $form->textFieldRow($model,'number_sms',array('id'=>'number_sms')); ?>
        <?php echo $form->error($model,'number_sms'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>

<div class="modal-footer">
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
            'type' => 'primary',
            'label' => 'Thay đổi',
            'url' => '#',
            'htmlOptions' => array('onclick' => 'refresh()'),
        )
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
            'label' => 'Hủy',
            'url' => '#',
            'htmlOptions' => array('data-dismiss' => 'modal'),
        )
    ); ?>
</div>

<?php $this->endWidget(); ?>

<?php if(Members::model()->getRoleSystem()!=Members::KHACHHANG_ADMIN)
{?>
<div style="margin-top: 0px;">
    <h3>Khách hàng của tôi</h3>
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'gridview-members-my',
	'dataProvider'=>$modelAll->search(),
	'type'=>'striped bordered condensed',
        'summaryText' => "Hiển thị {start}-{end} của {count} kết quả",
        'emptyText'=>'Không tìm thấy kết quả phù hợp!',
        'template'=>"{items}{pager}",
        'columns'=>array(
            array(
                'header'=>'html',
                'id'=>'state_id',
                'class'=>'CCheckBoxColumn',
                'selectableRows' => '50',
                'selectableRows'=>2,
                'value'=>'$data->pr_primary_key',
                'headerTemplate'=>'<label>{item}<span></span></label>',
                'htmlOptions'=>array('style'=>'width: 20px'),
            ),
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
                'header'=>'Số tin tối đa',
                'type'=>'raw',
                'name'=>'number_sms',
                'value'=>'$data->number_sms',
            ),
            array(
                'header'=>'Cấu hình sửa điểm',
                'type'=>'raw',
                'name'=>'is_fix',
                'value'=>'$data->is_fix == 0 ? "Được sửa điểm" : "Không được sửa điểm"',
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
<script>
    function create(){
        var cboxes = document.getElementsByName('state_id[]');
        var len = cboxes.length;
        var arr = [];
        for (var i=0; i<len; i++) {
            if(cboxes[i].checked) {
                arr.push(cboxes[i].value);
            }
        }
        if(arr.length == 0){
            alert('Bạn chưa chọn tài khoản nào');
            return;
        }else{
            $('#myModal').modal('show');
        }
    }
</script>

<script>
    function refresh() {
        var is_fix = 0;
        var cboxes = document.getElementsByName('state_id[]');
        var len = cboxes.length;
        var arr = [];
        for (var i=0; i<len; i++) {
            if(cboxes[i].checked) {
                arr.push(cboxes[i].value);
            }
        }
        $("#checkbox1").attr("checked") ? is_fix = 1 : is_fix = 0 ;
        var number_sms = $("#number_sms").val() ? $("#number_sms").val() : 0;
        $.ajax({
            type:'POST',
            url:'<?php echo $this->createUrl('updateMember'); ?>',
            beforeSend: function(){
                //code;
            },
            data:{number_sms:number_sms,is_fix:is_fix,arr_member:arr},
            success: function(data){
                var responseJSON = jQuery.parseJSON(data);
                if(responseJSON.status=="ok"){
                    alert('Cập nhật thành công.');
                    location.reload();
                }
                else{
                    alert('Cập nhật thất bại');
                }
            }
        });

    }

</script>