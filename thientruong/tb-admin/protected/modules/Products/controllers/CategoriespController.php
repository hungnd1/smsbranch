<?php

class CategoriespController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','DeleteAll','index','view','admin','delete','SortGridView'),
				'users'=>array('@'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Categoriesp;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Categoriesp']))
		{
			$model->attributes=$_POST['Categoriesp'];
                        $model->cate_content = $_POST['Categoriesp']['cate_content'];
                        $model->cate_createdate = date('Y-m-d h:i:s');
                        $model->categories_type = $_POST['Categoriesp']['categories_type'];
                        $sublink = TBApplication::removesign($_POST['Categoriesp']['cate_title']);
                        if(Categoriesp::model()->IsCateSubLink($sublink)){
                            $id = Categoriesp::model()->maxCateId()+1;
                            $model->cate_sublink =  $sublink.$id;
                        }
                        else{
                            $model->cate_sublink =  $sublink;
                        }
                        $model->cate_order = count(Categoriesp::model()->findAll())+1;
                        $file=CUploadedFile::getInstance($model,'cate_image');
                        $model->cate_image = str_replace('.', date("his").'.', $file);
                        $file1=CUploadedFile::getInstance($model,'cate_images_1');
                        $model->cate_images_1 = str_replace('.', date("his").'.', $file1);
			if($model->save())
                        {
                            if($file!="")
                                $file->saveAs(Yii::getPathOfAlias('webroot').'/uploads/'.$model->cate_image);
                            if($file1!="")
                                $file->saveAs(Yii::getPathOfAlias('webroot').'/uploads/'.$model->cate_image_1);
                            $this->redirect(array('admin'));
                        }
		}

		TBApplication::render($this,'create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $images_url = $model->cate_image;
                $images_url_1 = $model->cate_images_1;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Categoriesp']))
		{
			$model->attributes=$_POST['Categoriesp'];
                        $model->cate_content = $_POST['Categoriesp']['cate_content'];
                        $model->categories_type = $_POST['Categoriesp']['categories_type'];
                        $sublink = TBApplication::removesign($_POST['Categoriesp']['cate_title']);
                        if(Categoriesp::model()->IsCateSubLink($sublink)){
                            $id = Categoriesp::model()->maxCateId()+1;
                            $model->cate_sublink =  $sublink.$id;
                        }
                        else{
                            $model->cate_sublink =  $sublink;
                        }
                        //$model->cate_order = count(Categoriesp::model()->findAll())+1;
                        $file=CUploadedFile::getInstance($model,'cate_image');
                        if(isset($file) && $file!="")
                        {
                            if($model->cate_image!="")
                                unlink(Yii::getPathOfAlias('webroot').'/uploads/'.$model->cate_image);
                            $model->cate_image = str_replace('.', date("his").'.', $file);
                            
                        }else{
                            $model->cate_image = $images_url;
                        }
                        $file1=CUploadedFile::getInstance($model,'cate_images_1');
                        if(isset($file1) && $file1!="")
                        {
                            if($model->cate_images_1!="")
                                unlink(Yii::getPathOfAlias('webroot').'/uploads/'.$model->cate_images_1);
                            $model->cate_images_1 = str_replace('.', date("his").'.', $file1);
                            
                        }else{
                            $model->cate_images_1 = $images_url_1;
                        }
			if($model->save())
                        {
                            if(isset($file) && $file!="")
                                $file->saveAs(Yii::getPathOfAlias('webroot').'/uploads/'.$model->cate_image);
                            if(isset($file1) && $file1!="")
                                $file1->saveAs(Yii::getPathOfAlias('webroot').'/uploads/'.$model->cate_images_1);
                            $this->redirect(array('admin'));
                        }
		}

		TBApplication::render($this,'update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Categoriesp');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id=0)
	{
		$model=new Categoriesp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Categoriesp']))
			$model->attributes=$_GET['Categoriesp'];
                $model->cate_parent=$id;
                
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Categoriesp the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Categoriesp::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Categoriesp $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='categories-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
	public function actionDeleteAll()
	{
            $arr_id = array();
            $arr_id = $_POST['id'];
            $result = array();
            if(count($arr_id)>0)
            {
                Categories::model()->deleteAll('cate_id IN ('.implode(",",$arr_id) .')');
                $result['status'] = true;
            }
            else
                $result['status'] = false;
            echo json_encode($result);
	}
        
        public function actionSortGridView()
        {
            if (isset($_POST['items']) && is_array($_POST['items'])) {
                $i = 1;
                foreach ($_POST['items'] as $item) {
                    $model = Categoriesp::model()->findByPk($item);
                    $model->cate_order = $i;
                    $model->save();
                    $i++;
                }
            }
        }
}
