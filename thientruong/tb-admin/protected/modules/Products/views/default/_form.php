<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php if($form->errorSummary($model)){ ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $form->errorSummary($model); ?>
            </div>
        <?php } ?>
	
        <div style="overflow: hidden;">
            <!-- FORM CONTENT LEFT -->
            <div class="form-content-left">
                <div class="control-group">
                        <?php echo $form->labelEx($model,'pro_title',array('style'=>'float:left;')); ?>
                    <a href="#" onclick="js:$('#pro-title-en').slideToggle();" class="label-en">Dịch sang tiếng anh</a><br>
                        <?php echo $form->textField($model,'pro_title',array('size'=>60,'maxlength'=>255,'class'=>'span6')); ?>
                </div>

                <div class="control-group" id="pro-title-en" style="display: none;">
                        <?php echo $form->labelEx($model,'pro_titleen',array('style'=>'float:left;')); ?>
                    <a href="#" onclick="js:$('#pro-title-en').slideToggle(); return false;" class="label-en">(Hide)</a><br>
                        <?php echo $form->textField($model,'pro_titleen',array('size'=>60,'maxlength'=>255,'class'=>'span6')); ?>
                </div>

                <div class="control-group">
                        <?php echo $form->labelEx($model,'pro_cateidarr'); ?>
                                    <?php
                            $this->widget('ext.select2.ESelect2',array(
                                    'model'=>$model,
                                    'attribute'=>'pro_cateidarr',
                                    'data'=> Categoriesp::model()->getArrayCateByParent(),
                                    'htmlOptions'=>array(
                                        'style'=>'width:556px;',
                                        'placeholder'=>'Select danh mục'
                                    ),
                            ));
                            
                        ?>   
                </div>
                <div class="control-group">
                        <?php echo $form->checkBox($model, 'pro_typical',array('class'=>'control')); ?> <span class="control-label">Tiêu biểu</span>
                </div>

                <div class="control-group">
                        <?php echo $form->labelEx($model,'pro_status'); ?>
                        <?php echo $form->dropDownList($model,'pro_status',  TBApplication::ArrStatus()); ?>
                </div>
                
                <div class="control-group">
                        <?php echo $form->labelEx($model,'pro_price'); ?>
                        <?php echo $form->textField($model,'pro_price',array('size'=>10,'maxlength'=>10)); ?>
                </div>
                
            </div>
            <!-- END FORM CONTENT RIGHT -->
            
            
            
            <!-- #### FORM CONTENT LEFT -->
            <div class="form-content-right">
                <div class="control-group">
                        <?php echo $form->labelEx($model,'pro_images'); ?>
                        <?php echo $form->fileField($model,'pro_images',array('size'=>60,'maxlength'=>255)); ?>
                    <?php 
                        $src = YII::app()->baseUrl.'/uploads/'.$model->pro_images;
                        echo CHtml::image($src, 'images', array('width'=>'100'));
                    ?>
                </div>
                <div class="control-group">
                    <?php echo CHtml::label('Thêm nhiều ảnh','files'); ?>
                    <?php
                            $this->widget('CMultiFileUpload', array(
                               'name'=>'files',
                               'accept'=> 'png|jpg|git|jpeg',
                               'options'=>array(
                                  // 'onFileSelect'=>'function(e, v, m){ alert("onFileSelect - "+v) }',
                                  // 'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
                                  // 'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
                                  // 'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
                                  // 'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
                                  // 'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
                               ),
                               'denied'=>'File is not allowed',
                               'max'=>30, // max 10 files
                            ));
                        if($model->pro_id){?>
                            <div id="content-document"></div>
                        <?php } ?>
                </div>


<!--                <div class="control-group">
                        <?php //echo $form->labelEx($model,'pro_discountprice'); ?>
                        <?php //echo $form->textField($model,'pro_discountprice',array('size'=>10,'maxlength'=>10)); ?>
                </div>-->
            </div>
            <!-- END FORM CONTENT RIGHT -->
        </div>
        
 <div class="control-group">
                        <?php echo $form->labelEx($model,'pro_summary',array('style'=>'float:left;')); ?>
                        <a href="#" onclick="js:$('#pro-summary-en').slideToggle(); $('html, body').animate({ scrollTop: 300 }, 'slow');" class="label-en">Dịch sang tiếng anh</a><br>
                        <?php
//                            $this->widget('application.extensions.cleditor.ECLEditor', array(
//                                'model'=>$model,
//                                'attribute'=>'pro_summary', //Model attribute name. Nome do atributo do modelo.
//                                'options'=>array(
//                                    'width'=>'550',
//                                    'height'=>200,
//                                    'useCSS'=>true,
//                                ),
//                                'value'=>$model->pro_summary, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
//                            ));
                            $this->widget('ext.ckeditor.CKEditorWidget',array(
                                                                "model" => $model,                 # Data-Model
                                                                "attribute"=> 'pro_summary',          # Attribute in the Data-Model
                                                                "defaultValue" => $model->pro_summary,     # Optional

                                                                # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
                                                                    "config" => array(
                                                                                "height"=>"250px",
                                                                                "width"=>"100%",
                                                                                "toolbar"=>"Basic",
                                                                                        "autoUpdateElement" => true
                                                                    ),

                                                                #Optional address settings if you did not copy ckeditor on application root
                                                                /**
                                                      "ckEditor"=>Yii::app()->basePath."/../ckeditor/ckeditor.php",
                                                                # Path to ckeditor.php
                                                                "ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
                                                                # Realtive Path to the Editor (from Web-Root)
                                                                **/
                                                        ));
                        ?>
                </div>

                <div class="control-group" id="pro-summary-en" style="display: none">
                        <?php echo $form->labelEx($model,'pro_summaryen',array('style'=>'float:left')); ?>
                        <a href="#" onclick="js:$('#pro-summary-en').slideToggle(); return false;" class="label-en">(Hide)</a><br>
                        <?php
//                            $this->widget('application.extensions.cleditor.ECLEditor', array(
//                                'model'=>$model,
//                                'attribute'=>'pro_summaryen', //Model attribute name. Nome do atributo do modelo.
//                                'options'=>array(
//                                    'width'=>'550',
//                                    'height'=>200,
//                                    'useCSS'=>true,
//                                ),
//                                'value'=>$model->pro_summaryen, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
//                            ));
                                $this->widget('ext.ckeditor.CKEditorWidget',array(
                                                                "model" => $model,                 # Data-Model
                                                                "attribute"=> 'pro_summaryen',          # Attribute in the Data-Model
                                                                "defaultValue" => $model->pro_summaryen,     # Optional

                                                                # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
                                                                    "config" => array(
                                                                                "height"=>"200px",
                                                                                "width"=>"100%",
                                                                                "toolbar"=>"Basic",
                                                                                        "autoUpdateElement" => true
                                                                    ),

                                                                #Optional address settings if you did not copy ckeditor on application root
                                                                /**
                                                      "ckEditor"=>Yii::app()->basePath."/../ckeditor/ckeditor.php",
                                                                # Path to ckeditor.php
                                                                "ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
                                                                # Realtive Path to the Editor (from Web-Root)
                                                                **/
                                                        ));
                        ?>
                </div>
        
	<div class="control-group">
		<?php echo $form->labelEx($model,'pro_content',array('style'=>'float:left;')); ?>
            <a href="#" onclick="js:$('#pro-content-en').slideToggle(); return false;" class="label-en">Dịch sang tiếng anh</a><br>
               <?php
                        $this->widget('ext.ckeditor.CKEditorWidget',array(
                                                                "model" => $model,                 # Data-Model
                                                                "attribute"=> 'pro_content',          # Attribute in the Data-Model
                                                                "defaultValue" => $model->pro_content,     # Optional

                                                                # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
                                                                    "config" => array(
                                                                                "height"=>"250px",
                                                                                "width"=>"100%",
                                                                                "toolbar"=>"Basic",
                                                                                        "autoUpdateElement" => true
                                                                    ),

                                                                #Optional address settings if you did not copy ckeditor on application root
                                                                /**
                                                      "ckEditor"=>Yii::app()->basePath."/../ckeditor/ckeditor.php",
                                                                # Path to ckeditor.php
                                                                "ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
                                                                # Realtive Path to the Editor (from Web-Root)
                                                                **/
                                                        ));
                ?> 
	</div>

        <div class="control-group" id="pro-content-en" style="display: none;">
		<?php echo $form->labelEx($model,'pro_contenten',array('style'=>'float:left')); ?>
               <a href="#" onclick="js:$('#pro-content-en').slideToggle(); return false;" class="label-en">(Hide)</a><br>
               <?php 
                        $this->widget('ext.ckeditor.CKEditorWidget',array(
                                                                "model" => $model,                 # Data-Model
                                                                "attribute"=> 'pro_contenten',          # Attribute in the Data-Model
                                                                "defaultValue" => $model->pro_contenten,     # Optional

                                                                # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
                                                                    "config" => array(
                                                                                "height"=>"250px",
                                                                                "width"=>"100%",
                                                                                "toolbar"=>"Basic",
                                                                                        "autoUpdateElement" => true
                                                                    ),

                                                                #Optional address settings if you did not copy ckeditor on application root
                                                                /**
                                                      "ckEditor"=>Yii::app()->basePath."/../ckeditor/ckeditor.php",
                                                                # Path to ckeditor.php
                                                                "ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
                                                                # Realtive Path to the Editor (from Web-Root)
                                                                **/
                                                        ));
                ?> 
	</div>

        <div class="control-group">
		<?php echo $form->labelEx($model,'pro_specifications',array('style'=>'float:left;')); ?>
            <a href="#" onclick="js:$('#pro-spec-en').slideToggle(); return false;" class="label-en">Dịch sang tiếng anh</a><br>
                <?php 
                            $this->widget('ext.ckeditor.CKEditorWidget',array(
                                                                "model" => $model,                 # Data-Model
                                                                "attribute"=> 'pro_specifications',          # Attribute in the Data-Model
                                                                "defaultValue" => $model->pro_specifications,     # Optional

                                                                # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
                                                                    "config" => array(
                                                                                "height"=>"250px",
                                                                                "width"=>"100%",
                                                                                "toolbar"=>"Basic",
                                                                                        "autoUpdateElement" => true
                                                                    ),

                                                                #Optional address settings if you did not copy ckeditor on application root
                                                                /**
                                                      "ckEditor"=>Yii::app()->basePath."/../ckeditor/ckeditor.php",
                                                                # Path to ckeditor.php
                                                                "ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
                                                                # Realtive Path to the Editor (from Web-Root)
                                                                **/
                                                        ));
                ?> 
	
	</div>
        
	<div class="control-group"  id="pro-spec-en" style="display: none;">
		<?php echo $form->labelEx($model,'pro_specificationsen',array('style'=>'float:left;')); ?>
            <a href="#" onclick="js:$('#pro-spec-en').slideToggle(); return false;" class="label-en">(hide)</a><br>
                <?php
                $this->widget('ext.ckeditor.CKEditorWidget',array(
                                                                "model" => $model,                 # Data-Model
                                                                "attribute"=> 'pro_specificationsen',          # Attribute in the Data-Model
                                                                "defaultValue" => $model->pro_specificationsen,     # Optional

                                                                # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
                                                                    "config" => array(
                                                                                "height"=>"250px",
                                                                                "width"=>"100%",
                                                                                "toolbar"=>"Basic",
                                                                                        "autoUpdateElement" => true
                                                                    ),

                                                                #Optional address settings if you did not copy ckeditor on application root
                                                                /**
                                                      "ckEditor"=>Yii::app()->basePath."/../ckeditor/ckeditor.php",
                                                                # Path to ckeditor.php
                                                                "ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
                                                                # Realtive Path to the Editor (from Web-Root)
                                                                **/
                                                        ));
                ?> 
	
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
    viewDocumentEntity();
    function viewDocumentEntity(){
        $('#content-document').load('<img src="<?php echo YII::app()->baseUrl ?>/images/loading.gif" />');
        $('#content-document').load('<?php echo $this->createUrl('/Documents/default/viewDocumentEntity',array('entity'=>'product','entity_id'=>$model->pro_id)) ?>');
    }
</script>