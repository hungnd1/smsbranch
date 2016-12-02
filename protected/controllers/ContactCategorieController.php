<?php

class ContactCategorieController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','DownloadTemplate','ImportDataExel','UpdateLineContactCategoty','LoadOptionMember','Birthday'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
                $modelContact=new Contact('search');
		$modelContact->unsetAttributes();  // clear any default values
                $modelContact->category_id = $id;
		if(isset($_GET['Contact']))
			$modelContact->attributes=$_GET['Contact'];
		$this->render('view',array(
			'model'=>$this->loadModel($id),
                        'modelContact'=>$modelContact
		));
	}

    public function actionComments(){

        $this->render('view');
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ContactCategorie;
                //$modelContact = new Contact();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ContactCategorie']))
		{
			$model->attributes=$_POST['ContactCategorie'];
                        $model->category_createby = YII::app()->user->id;
			if($model->save())
                        {
                            if(isset($_FILES["file"]) && $_FILES["file"]["name"]!="")
                            {
                                $allowedExts = array("xls", "xlsx");
                                $temp = explode(".", $_FILES["file"]["name"]);
                                $extension = end($temp);
                                $datacontact = array();
                                if (($_FILES["file"]["type"] == "application/vnd.ms-excel") && in_array($extension, $allowedExts)) {
                                    if ($_FILES["file"]["error"] > 0) {
                                        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                    } else {
                                        $filename = $_FILES["file"]["name"];
                                        if (file_exists(Yii::getPathOfAlias('webroot')."/uploads/" . $filename)) {
                                            unlink(Yii::getPathOfAlias('webroot')."/uploads/" . $filename);
                                        }
                                        move_uploaded_file($_FILES["file"]["tmp_name"],
                                        Yii::getPathOfAlias('webroot')."/uploads/" . $filename);

                                    }
                                }

                                Yii::import('ext.phpexcel.XPHPExcel');
                                // This is the file path to be uploaded.
                                $file = Yii::getPathOfAlias('webroot').'/uploads/'.$filename;
                                $objPHPExcel= XPHPExcel::createPHPExcel();
                                $inputFileName=$file;
                                try {
                                        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                                } catch(Exception $e) {
                                        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                                }
                                //        }

                                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                                $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
                                $j=  count($datacontact);$date=array();
                                for($i=2;$i<=$arrayCount;$i++){
                                    $date = explode('/', $allDataInSheet[$i]["H"]);
                                    $contact = new Contact();
                                    $contact->category_id = $model->category_id;
                                    $userName = trim($allDataInSheet[$i]["A"]);
                                    $userMobile = trim($allDataInSheet[$i]["C"]);
                    //                $datacontact=array();
                                    $contact->contact_ho=$allDataInSheet[$i]["A"];
                                    $contact->contact_ten=$allDataInSheet[$i]["B"];
                                    $contact->contact_phone=  TBApplication::convert84($allDataInSheet[$i]["D"]);
                                    $contact->contact_address=$allDataInSheet[$i]["E"].' '.$allDataInSheet[$i]["F"];
                                    $contact->contact_birthday=$date[2].'-'.$date[1].'-'.$date[0];
                                    $contact->contact_gender=$allDataInSheet[$i]["I"];
                                    $contact->contact_email=$allDataInSheet[$i]["C"];
                                    $contact->contact_company=$allDataInSheet[$i]["G"];
                                    $contact->contact_notes="";
                                    $contact->member_createby = YII::app()->user->id;
                                    $contact->save();
                                    $j++;
                                }
                            }
                            $this->redirect(array('view','id'=>$model->category_id));
                        }
		}

		$this->render('create',array(
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ContactCategorie']))
		{
			$model->attributes=$_POST['ContactCategorie'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->category_id));
		}

		$this->render('update',array(
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
		$result = $this->loadModel($id)->delete();
                if($result)
                {
                    $contact = Contact::model()->deleteAll('category_id='.  intval($id));
                    
                }
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ContactCategorie');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ContactCategorie('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ContactCategorie']))
                {
			$model->attributes=$_GET['ContactCategorie'];
                        $model->category_createby =$_GET['ContactCategorie']['members'];
                }

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
	public function actionBirthday()
	{
		$this->render('birthday');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ContactCategorie the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ContactCategorie::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ContactCategorie $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-categorie-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionDownloadTemplate()
        {
            $file=Yii::getPathOfAlias('webroot').'/template/contact.xls';
            if(file_exists($file)){

                header("Content-Length: " . filesize ( $file ) ); 
                header("Content-type: application/octet-stream"); 
                header("Content-disposition: attachment; filename=".basename($file));
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                ob_clean();
                flush();

                readfile($file);
            }
            else
            {
                echo 'The file "contact.xls" does not exist';
            }
        }
        
        public function actionImportDataExel($category_id){
            if(isset($_FILES['file']) && $_FILES["file"]["name"]!="")
            {
                $allowedExts = array("xls", "xlsx");
                $temp = explode(".", $_FILES["file"]["name"]);
                $extension = end($temp);
                $datacontact = array();
                if (($_FILES["file"]["type"] == "application/vnd.ms-excel") && in_array($extension, $allowedExts)) {
                    if ($_FILES["file"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                    } else {
                        $filename = $_FILES["file"]["name"];
                        if (file_exists(Yii::getPathOfAlias('webroot')."/uploads/" . $filename)) {
                            unlink(Yii::getPathOfAlias('webroot')."/uploads/" . $filename);
                        }
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                        Yii::getPathOfAlias('webroot')."/uploads/" . $filename);

                    }
                }

                Yii::import('ext.phpexcel.XPHPExcel');
                // This is the file path to be uploaded.
                $file = Yii::getPathOfAlias('webroot').'/uploads/'.$filename;
                $objPHPExcel= XPHPExcel::createPHPExcel();
                $inputFileName=$file;
                try {
                        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                } catch(Exception $e) {
                        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                }
                //        }

                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
                $j=  count($datacontact);$date = array();
                for($i=2;$i<=$arrayCount;$i++){
                    $date = explode('/', $allDataInSheet[$i]["H"]);
                    $contact = new Contact();
                    $contact->category_id = $category_id;
                    $userName = trim($allDataInSheet[$i]["A"]);
                    $userMobile = trim($allDataInSheet[$i]["C"]);
    //                $datacontact=array();
                    $contact->contact_ho=$allDataInSheet[$i]["A"];
                    $contact->contact_ten=$allDataInSheet[$i]["B"];
                    $contact->contact_phone=  TBApplication::convert84($allDataInSheet[$i]["D"]);
                    $contact->contact_address=$allDataInSheet[$i]["E"].' '.$allDataInSheet[$i]["F"];
                    $contact->contact_birthday=$date[2].'-'.$date[1].'-'.$date[0];
                    $contact->contact_gender=$allDataInSheet[$i]["I"];
                    $contact->contact_email=$allDataInSheet[$i]["C"];
                    $contact->contact_company=$allDataInSheet[$i]["G"];
                    $contact->contact_notes="";
                    $contact->member_createby = YII::app()->user->id;
                    $contact->save();
                    $j++;
                }

                echo '{"status":"success"}';
            }
        }
        
        public function actionLoadDataGridContact()
        {
            $modelContact=new Contact('search');
            $modelContact->unsetAttributes();  // clear any default values
            $modelContact->category_id = $id;
            if(isset($_GET['Contact']))
                    $modelContact->attributes=$_GET['Contact'];
            $this->renderPartial('data_gridview_contact', array(
                'model'=>$this->loadModel($_GET['category_id']),
                'modelContact'=>$modelContact
            ));
        }
        
       public function actionUpdateLineContactCategoty()
        {
            if(isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value']))
            {
                $id=$_POST['pk'];
                $attribute = $_POST['name'];
                $value = $_POST['value'];
                
                $model = ContactCategorie::model()->findByPk($id);
                $model->$attribute = $value;
                echo $model->save();
            }
        }
        
        public function actionLoadOptionMember(){
            $roles = $_POST['roles'];
            if($roles=="")
                $member = Members::model()->getMemberArray(YII::app()->user->id);
            else
                $member = Members::model()->getMemberArray(false, $roles);
            //print_r($member);
            $option = "";
            foreach($member as $key=>$items) {
                $option .= '<option value='.$key.'>'.$items.'</option>';
            }
            echo $option;
        }
}
