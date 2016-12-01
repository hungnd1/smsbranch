<?php

class ConfigController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','UpdateLineConfig','logo'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Config']))
		{
			$model->attributes=$_POST['Config'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->config_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=Config::model()->find();
		$this->render('index',array(
			'model'=>$model,
		));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Config the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Config::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Config $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='config-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
       public function actionUpdateLineConfig()
        {
            if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value']))
            {
                $id=$_POST['pk'];
                $attribute = $_POST['name'];
                $value = $_POST['value'];
                
                $model = Config::model()->findByPk($id);
                $model->$attribute = $value;
                echo $model->save();
            }
        }
        
        /*
         * update images
         */
        public function actionLogo($domain)
        {
                Yii::import("ext.EAjaxUpload.qqFileUploader");

                $folder='uploads/';// folder for uploaded files
                $allowedExtensions = array("jpg","jpeg","gif","png");//array("jpg","jpeg","gif","exe","mov" and etc...
                $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload($folder);
                $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                
                $model = Config::model()->find('domain="'.$domain.'"');
                $model->logo = '/uploads/'.$result['filename'];
                $model->save();

                $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
                $fileName=$result['filename'];//GETTING FILE NAME
                
                echo $return;// it's array
        }
}
