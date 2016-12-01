<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
            $translate = Translate::model()->search();

            $translate=new Translate('search');
            $translate->unsetAttributes();  // clear any default values
            if(isset($_GET['Translate']))
                    $translate->attributes=$_GET['Translate'];
            TBApplication::render($this, 'index', array(
                'translate'=>$translate
            ));
	}
        
        public function actionUpdateSystem() {
            if($_POST['titlepage_id'])
            {
                $model = Systems::model()->findByPk($_POST['titlepage_id']);
                $model->sys_value = $_POST['titlepage_value'];
                $model->save();

                $model = Systems::model()->findByPk($_POST['email_id']);
                $model->sys_value = $_POST['email_value'];
                $model->save();
                
                $model = Systems::model()->findByPk($_POST['day_id']);
                $model->sys_value = $_POST['day_value'];
                $model->save();
                
                $model = Systems::model()->findByPk($_POST['time_id']);
                $model->sys_value = $_POST['time_value'];
                $model->save();
                
                $model = Systems::model()->findByPk($_POST['currency_id']);
                $model->sys_value = $_POST['currency_value'];
                $model->save();
                
                $model = Systems::model()->findByPk($_POST['lang_id']);
                $model->sys_value = $_POST['lang_value'];
                $model->save();
                
                $model = Systems::model()->findByPk($_POST['check_comment_id']);
                $model->sys_value = $_POST['lang_value'];
                $model->save();
            }
           
        }
        
        function actionAddLineTranslate()
        {
            $tranlateModel = new Translate();
            if(isset($_POST['translate_en']) && isset($_POST['translate_vn']))
            {
                $tranlateModel->lb_tranlate_en = $_POST['translate_en'];
                $tranlateModel->lb_translate_vn = $_POST['translate_vn'];
                if($tranlateModel->save())
                    echo json_encode (array('status'=>'success'));
                else 
                    echo json_encode (array('status'=>'failed'));
            }
        }
        
        function actionDeleteLineTranslate($id)
        {
            $translateModel = Translate::model()->findByPk($id);

            if($translateModel->delete())
                echo json_encode (array('status'=>'success'));
            else 
                echo json_encode (array('status'=>'failed'));
        }
	public function actionAjaxUpdateField()
	{
		if (isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value']))
		{
			$id = $_POST['pk'];
			$attribute = $_POST['name'];
			$value = $_POST['value'];
	
			// get model
			$model = Translate::model()->findByPk($id);
			// update
			$model->$attribute = $value;
			return $model->save();
		}
	
		return false;
	}
}