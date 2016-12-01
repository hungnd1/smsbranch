<?php

class DefaultController extends Controller
{
    
        public function filters()
        {
            return array(
                'accessControl',
            );
        }
        
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
        public function accessRules()
        {
            return array(
                array('allow',
                    'actions'=>array('index'),
                    'users'=>array('@'),
                ),
                array('allow',
                    'actions'=>array('DeleteLineSystemValueKey','AddLineSystemValueKey','AddLineRoles','DeleteLineRoles',
                            'UpdateLineStatusRoles','UpdateLineSystemValueKey','UpdateLineRoles'),
                    'users'=>array('@'),
                ),
                array('deny', // deny all users
                    'users'=>array('*'),
               ),
            );
        }
	public function actionIndex()
	{
                $systemValueModel=new PrSystemValueKey('search');
                $rolesModel = new PrRoles('search');
		$this->render('index',array(
                        'systemValueModel'=>$systemValueModel,
                        'rolesModel'=>$rolesModel,
                ));
	}
//        public function actionAjaxViewSystemLookupValue()
//        {
//            $model = PrSystemValueKey::model()->findAll();
//            $this->render('_form_system_lookup_value', array(
//                    'model'=>$model,
//            ));
//        }
        public function actionAddLineSystemValueKey()
        {
            $model = new PrSystemValueKey;
            if($_POST['pr_system_title']!="" && $_POST['pr_system_value_key']!="")
            {
                $model->pr_system_title=$_POST['pr_system_title'];
                $model->pr_system_value_key=$_POST['pr_system_value_key'];
                echo $model->save();
            }
        }
        public function actionDeleteLineSystemValueKey($id)
        {
            $model = PrSystemValueKey::model()->findByPk($id);
            echo $model->delete();
        }
        public function actionUpdateLineSystemValueKey()
        {
            if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value']))
            {
                $id = $_POST['pk'];
                $attribute = $_POST['name'];
                $value = $_POST['value'];
                
                $model = PrSystemValueKey::model()->findByPk($id);
                $model->$attribute = $value;
                echo $model->save();
            }
        }
        public function actionAddLineRoles()
        {
            $model = new PrRoles();
            if(isset($_POST['role_name'])&&$_POST['role_name']!="")
            {
                $model->pr_roles_name=$_POST['role_name'];
                $model->pr_roles_description=$_POST['role_description'];
                $model->pr_roles_status = 1;
                echo $model->save();
            }
        }
        public function actionDeleteLineRoles($id)
        {
            $model = PrRoles::model()->findByPk($id);
            $model->delete();
        }
        public function actionUpdateLineRoles()
        {
            if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value']))
            {
                $id=$_POST['pk'];
                $attribute = $_POST['name'];
                $value = $_POST['value'];
                
                $model = PrRoles::model()->findByPk($id);
                $model->$attribute = $value;
                echo $model->save();
            }
        }
        public function actionUpdateLineStatusRoles()
        {
            if(isset($_POST['id']))
            {
                $id=$_POST['id'];
                $model = PrRoles::model()->findByPk($id);
                if($model->pr_roles_status==1)
                    $model->pr_roles_status = 0;
                else
                    $model->pr_roles_status = 1;
                echo $model->save();
            }
        }

}