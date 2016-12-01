<?php

class HistoryController extends Controller
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
				'actions'=>array('CronSchedule'),
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','getDanhba','exportExcel','ImportExcel','Search','Report',
                                    'UploadReport','delete','UploadFileResult','Json','updateStatusResultByExcel','DownloadTemplate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','DowloadfileResult'),
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
                $modelContact = new HistoryContact('search');
                $modelContact->unsetAttributes();
                $modelContact->history_id=$id;
                $modelContactSchedule = new HistoryContactSchedule('search');
                $modelContactSchedule->unsetAttributes();
                $modelContactSchedule->history_id=$id;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
                        'modelContact'=>$modelContact,
                        'modelContactSchedule'=>$modelContactSchedule
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($type)
	{
                $modelHistoryContact = new HistoryContact;
                $modelContent = new TemplateSms;
		$model=new History();
                $array_contact = array();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

//                }
		if(isset($_POST['history_campaingname']))
		{
                    if($type=='excel'){
                        $array_contact = $this->getFileExcel();
                    }
                    else{
                        $template = $_POST['content'];
                        
                        $_POST['danhba'] = explode(',', $_POST['danhba']);
                        $array_contact = Contact::model()->getDataArray($_POST['danhba'],$template);

                        $string_danhba = $_POST['contact'];
                        $arr_danhba =explode ( ',' , $string_danhba);
                        
                    }
                    
                    $brand = Brandname::model()->findByPk($_POST['history_brand_id']);

                    $model->history_campaingname=$_POST['history_campaingname'];
                    $model->history_brand_id=$_POST['history_brand_id'];
                    $model->member_createby=  Yii::app()->user->id;
                    $model->history_startdate=  date('Y-m-d H:i:s');
                    $model->history_type = $_POST['history_type'];
                    $model->history_createdate = date('Y-m-d H:i:s');
                    
                    if($_POST['history_type']==1 && $_POST['send_schedule']==0)
                    {
                        $model->history_status = 1;
                    }
                    if($_POST['send_schedule']==1){
                        $model->status_schudule = 1;
                        $model->send_schedule = $_POST['History_send_schedule'];
                    }
                    else{
                        $model->send_schedule = 0;
                    }
                    $i=1;
                    if($model->insert())
                    {
                            $total = 0;
                            if($_POST['send_schedule']==1){
                                    if($type == 'excel')
                                    {
                                        foreach ($array_contact as $data)
                                        {
                                            $number_phone = "";
                                            $number_phone = $data['contact_phone'];
                                            //$number_phone = substr($number_phone, 1);
                                            
                                            //$result_send = 1;
                                            $HistoryContactSchedule = new HistoryContactSchedule;
                                            $HistoryContactSchedule->history_contact_ho=$data['contact_ho'];
                                            $modelHistoryContact->history_contact_ten=$data['contact_ten'];
                                            $modelHistoryContact->history_contact_address=$data['contact_address'];
                                            $modelHistoryContact->history_contact_birthday=$data['contact_birthday'];
                                            $modelHistoryContact->history_contact_company=$data['contact_company'];
                                            $modelHistoryContact->history_contact_email=$data['contact_email'];
                                            $modelHistoryContact->history_contact_gender=$data['contact_gender'];
                                            $modelHistoryContact->history_contact_phone=$data['contact_phone'];
            //                                    if(isset($data['contact_id']))
            //                                        $modelHistoryContact->contact_id=$data['contact_id'];
                                            $modelHistoryContact->history_contact_notes=$data['contact_notes'];
                                            $modelHistoryContact->history_content=$data['contact_content'];
                                            $modelHistoryContact->content_number=$data['content_number'];
                                            $modelHistoryContact->history_id=$model->history_id;
                                            $modelHistoryContact->history_createby = YII::app()->user->id;
                                            $modelHistoryContact->api_sms_id = $result_send;
                                            
                                            if($modelHistoryContact->save())
                                            {
                                                $total +=$data['content_number'];
                                            }
                                            $i++;
                                        }
                                    }
                                    else
                                    {
                                        $total = 0;
                                        $contact_id_arr = explode(',', $_POST['contact']);
                                        //$contact_check_arr = explode(',', $_POST['check']);
                                        $i = 0;
                                        foreach ($contact_id_arr as $value)
                                        {
                                            if($value>0){
                                                $data = Contact::model()->findByPk($value);
                                                 if($data){

                                                     $number_phone = "";
                                                     $number_phone = $data->contact_phone;
                                                     //$number_phone = substr($number_phone, 1);
                                                     $contact_content=  Contact::model()->getTemplateContact($template,$value);
                                                     $contact_content = TBApplication::removesign($contact_content," ");
                                                     $sotin = strlen($contact_content)/160;
                                                     if(strlen($contact_content) >= 0 && strlen($contact_content)<160)
                                                                         $sotin=1;
                                                     $content_number=  round($sotin);

                                                     // Gá»­i tin
                                                     $result_send =0;

                                                     //$result_send = 1;
                                                     $modelHistoryContact = new HistoryContactSchedule();
                                                     $modelHistoryContact->history_contact_ho=$data->contact_ho;
                                                     $modelHistoryContact->history_contact_ten=$data->contact_ten;
                                                     $modelHistoryContact->contact_id=$value;
                                                     $modelHistoryContact->history_contact_address=$data->contact_address;
                                                     $modelHistoryContact->history_contact_birthday=$data->contact_birthday;
                                                     $modelHistoryContact->history_contact_company=$data->contact_company;
                                                     $modelHistoryContact->history_contact_email=$data->contact_email;
                                                     $modelHistoryContact->history_contact_gender=$data->contact_gender;
                                                     $modelHistoryContact->history_contact_phone=$data->contact_phone;
                                                     $modelHistoryContact->history_contact_notes=$data->contact_notes;
                                                     $modelHistoryContact->history_content=$contact_content;
                                                     $modelHistoryContact->content_number=$content_number;
                                                     $modelHistoryContact->history_id=$model->history_id;
                                                     $modelHistoryContact->history_createby = YII::app()->user->id;
                                                     if($modelHistoryContact->insert())
                                                     {
                                                         $total +=$content_number;

                                                     }
                                                 }               
                                            }
                                                $i++;
                                        }
                                        
                                    }   
                            }
                            else{
                                $i=0;
                                    if($type == 'excel')
                                    {
                                        $total =0;
                                        foreach ($array_contact as $data)
                                        {
                                            $number_phone = "";
                                            $number_phone = $data['contact_phone'];
                                            //$number_phone = substr($number_phone, 1);

                                            // Gá»­i tin
                                            $result_send = 0;
                                            if($_POST['history_type']==1)
                                            {
                                                $callAPI = new APISMS();
                                                $result_send = $callAPI->sent($brand->brand_username,$brand->brand_password,$brand->brandname, $number_phone, $data['contact_content'],$i);
                                            }
                                            else
                                            {
                                                $result_send = 0;
                                            }
                                            //$result_send = 1;
                                            $modelHistoryContact = new HistoryContact;
                                            $modelHistoryContact->history_contact_ho=$data['contact_ho'];
                                            $modelHistoryContact->history_contact_ten=$data['contact_ten'];
                                            $modelHistoryContact->history_contact_address=$data['contact_address'];
                                            $modelHistoryContact->history_contact_birthday=$data['contact_birthday'];
                                            $modelHistoryContact->history_contact_company=$data['contact_company'];
                                            $modelHistoryContact->history_contact_email=$data['contact_email'];
                                            $modelHistoryContact->history_contact_gender=$data['contact_gender'];
                                            $modelHistoryContact->history_contact_phone=$data['contact_phone'];
            //                                    if(isset($data['contact_id']))
            //                                        $modelHistoryContact->contact_id=$data['contact_id'];
                                            $modelHistoryContact->history_contact_notes=$data['contact_notes'];
                                            $modelHistoryContact->history_content=$data['contact_content'];
                                            $modelHistoryContact->content_number=$data['content_number'];
                                            $modelHistoryContact->history_id=$model->history_id;
                                            $modelHistoryContact->history_createby = YII::app()->user->id;
                                            $modelHistoryContact->api_sms_id = $result_send;
                                            if(trim($result_send)=="0|Success")
                                            {
                                                $modelHistoryContact->history_contact_status = 1;
                                            }
                                            elseif($_POST['history_type']==2)
                                            {
                                                $modelHistoryContact->history_contact_status = -1;
                                            }
                                            if($modelHistoryContact->save())
                                            {
                                                $total +=$data['content_number'];
                                            }
                                            $i++;
                                        }
                                    }
                                    else
                                    {
                                        $total =0;
                                        $contact_id_arr = explode(',', $_POST['contact']);
                                        //$contact_check_arr = explode(',', $_POST['check']);
                                        $i = 0;
                                        foreach ($contact_id_arr as $value)
                                        {
                                            if($value>0)
                                            {
                                                $data = Contact::model()->findByPk($value);
                                            
                                                $number_phone = "";
                                                $number_phone = $data->contact_phone;
                                                //$number_phone = substr($number_phone, 1);
                                                $contact_content=  Contact::model()->getTemplateContact($template,$value);
                                                $contact_content = TBApplication::removesign($contact_content," ");
                                                $sotin = strlen($contact_content)/160;
                                                if(strlen($contact_content) >= 0 && strlen($contact_content)<160)
                                                                    $sotin=1;
                                                $content_number=  round($sotin);

                                                // Gá»­i tin
                                                $result_send =0;
                                                if($_POST['history_type']==1)
                                                {
                                                    $callAPI = new APISMS();
                                                    $result_send = $callAPI->sent($brand->brand_username,$brand->brand_password,$brand->brandname, $number_phone, $contact_content,$i);
                                                }
                                                
                                                //$result_send = 1;
                                                $modelHistoryContact = new HistoryContact;
                                                $modelHistoryContact->history_contact_ho=$data->contact_ho;
                                                $modelHistoryContact->history_contact_ten=$data->contact_ten;
                                                $modelHistoryContact->history_contact_address=$data->contact_address;
                                                $modelHistoryContact->history_contact_birthday=$data->contact_birthday;
                                                $modelHistoryContact->history_contact_company=$data->contact_company;
                                                $modelHistoryContact->history_contact_email=$data->contact_email;
                                                $modelHistoryContact->history_contact_gender=$data->contact_gender;
                                                $modelHistoryContact->history_contact_phone=$data->contact_phone;
                //                                    if(isset($data['contact_id']))
                //                                        $modelHistoryContact->contact_id=$data['contact_id'];
                                                $modelHistoryContact->history_contact_notes=$data->contact_notes;
                                                $modelHistoryContact->history_content=$contact_content;
                                                $modelHistoryContact->content_number=$content_number;
                                                $modelHistoryContact->history_id=$model->history_id;
                                                $modelHistoryContact->history_createby = YII::app()->user->id;
                                                $modelHistoryContact->api_sms_id = $result_send;
                                                if(trim($result_send)=="0|Success")
                                                {
                                                    $modelHistoryContact->history_contact_status = 1;
                                                }
                                                elseif($_POST['history_type']==2)
                                                {
                                                    $modelHistoryContact->history_contact_status = -1;
                                                }
                                                if($modelHistoryContact->insert())
                                                {
                                                    $total +=$content_number;
                                                }
                                                
                                                
                                            }
                                            $i ++;
                                        }
                                    }   
                            }
                        }
                        $model->history_total=$total;
                        $model->update();
                        echo '{"status":"success","history_id":"'.$model->history_id.'"}';
                        return;
		}
                
		$this->render('create',array(
			'model'=>$model,
                        'modelHistoryContact'=>$modelHistoryContact,
                        'modelContent'=>$modelContent,
                        'type'=>$type
		));
	}

        public function actionJson(){
            header('Content-type: application/json');

            print_r($_REQUEST["people"]);
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

		if(isset($_POST['History']))
		{
			$model->attributes=$_POST['History'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->history_id));
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
                if($result){
                    HistoryContact::model()->deleteAll('history_id='.intval($id));
                    HistoryContactSchedule::model()->deleteAll('history_id='.intval($id));
                }
         // AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('History');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new History('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['History']))
			$model->attributes=$_GET['History'];
              if(isset($_GET['History']['history_brand_id']))
                {
                    $model->history_brand_id = $_GET['History']['history_brand_id'];
                }

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return History the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=History::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param History $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='history-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
         public function actionsendSMS()
        {
            
        }
        public function actiongetDanhba()
        {
            $model=array();
            $template="";
            $contact_content="";
            if(isset($_POST['content']))
            {
                $template = $_POST['content'];
            }
            
            if(isset($_POST['danhba']) && count($_POST['danhba']) >0)
            {
                $model = Contact::model()->getDataArray($_POST['danhba'],$template);
                
            }
            if(isset($_POST['people']))
            {
                $model = array_merge($model, $_POST['people']);
            }
                
            $response = array();
            $response['status']='success';
            $response['getdata']=$model;
            echo json_encode($response);
        }
        
        public function actionexportExcel($id)
        {
            //$brandname_arr = PrSystemValueKey::model()->getSysVal("Brandname");
            $status_arr = PrSystemValueKey::model()->getSysVal("Trangthai");
//            echo $id;
            Yii::import('ext.phpexcel.XPHPExcel');
            $objPHPExcel = XPHPExcel::createPHPExcel();
            // Set properties
            $objPHPExcel->getProperties()->setCreator("ThinkPHP")
                                            ->setLastModifiedBy("Daniel Schlichtholz")
                                            ->setTitle("Office 2007 XLSX Test Document")
                                            ->setSubject("Office 2007 XLSX Test Document")
                                            ->setDescription("Test doc for Office 2007 XLSX, generated by PHPExcel.")
                                            ->setKeywords("office 2007 openxml php")
                                            ->setCategory("Test result file");
            $objPHPExcel->getActiveSheet()->setTitle('Minimalistic demo');
            
            
//            $objPHPExcel->setActiveSheetIndex(0)
//            ->setCellValue('A1', 'Hello')
//            ->setCellValue('B1', 'world!');
            $test = $objPHPExcel->setActiveSheetIndex(0);
            
            $history_id =$_GET['id'];
            $infohistory = History::model()->findByPk($history_id);
            $contactHistory = HistoryContact::model()->findAll('history_id='.$history_id);
            $brandname = Brandname::model()->findByPk($infohistory->history_brand_id);
            $i=5;
            $test->setCellValue('A1','Ä�?á»£t gá»­i');
            $test->setCellValue('B1','Brandname');
            $test->setCellValue('C1','NgÃ y gá»­i');
            $test->setCellValue('D1','Tá»•ng tin nháº¯n');
            
            $test->setCellValue('A2',$infohistory['history_campaingname']);
            $test->setCellValue('B2',$brandname->brandname);
            $test->setCellValue('C2',date('d-m-Y H:i:s',  strtotime($infohistory['history_startdate'])));
            $test->setCellValue('D2',$infohistory['history_total']);
            
            $test->setCellValue('A4','Sá»‘ Ä‘iá»‡n thoáº¡i');
            $test->setCellValue('B4','Há»�? tÃªn');
            $test->setCellValue('C4', 'Ná»™i dung tin nháº¯n');
            $test->setCellValue('D4', 'Sá»‘ tin nháº¯n');
            $test->setCellValue('E4', 'Tráº¡ng thÃ¡i');
           
           
            foreach ($contactHistory as $data)
            {
                $test->setCellValue('A'.$i, $data['history_contact_phone']);
                $test->setCellValue('B'.$i, $data['history_contact_ho'].' '.$data['history_contact_ten']);
                $test->setCellValue('C'.$i, $data['history_content']);
                $test->setCellValue('D'.$i, $data['content_number']);
                $test->setCellValue('E'.$i, $status_arr[$data['history_contact_status']]);
                $i++;
            }
            $name = 'report';
            if($infohistory['history_campaingname'])
            {
                $name = TBApplication::removesign($infohistory['history_campaingname']);
                $name = str_replace('/', '-',$name);
            }
            
           
//            ->setCellValueByColumnAndRow($column, $row, $value);
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            // If you want to output e.g. a PDF file, simply do:
            //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
            $objWriter->save(Yii::getPathOfAlias('webroot').'/uploads/files/'.$name.'_'.date('dmYHi').'.xls');
            
            $file=Yii::getPathOfAlias('webroot').'/uploads/files/'.$name.'_'.date('dmYHi').'.xls';
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
        
        public function actionImportExcel()
        {
                $model = $this->getFileExcel();

                    $response = array();
                    $response['status']='success';
                    $response['getdata']=$model;
                    echo json_encode($response);
            
        }
        
        public function getFileExcel(){
            $data = array();   
            if(isset($_FILES['file']) && $_FILES["file"]["name"]!="")
            {
                $template="";
                if(isset($_POST['content']))
                {
                    $template = $_POST['content'];
                }
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
                for($i=2;$i<=$arrayCount;$i++){
                    if($allDataInSheet[$i]["D"]!=""){
                    $data[$i]['contact_ho']=$allDataInSheet[$i]["A"];
                    $data[$i]['contact_ten']=$allDataInSheet[$i]["B"];
                    $data[$i]['contact_phone']=  TBApplication::convert84($allDataInSheet[$i]["D"]);
                    $data[$i]['contact_address']=$allDataInSheet[$i]["E"].' '.$allDataInSheet[$i]["F"];
                    $data[$i]['contact_birthday']=$allDataInSheet[$i]["H"];
                    $data[$i]['contact_gender']=$allDataInSheet[$i]["I"];
                    $data[$i]['contact_email']=$allDataInSheet[$i]["C"];
                    $data[$i]['contact_company']=$allDataInSheet[$i]["G"];
                    $data[$i]['contact_notes']="";}
                }
                
            }
            return $model = Contact::model()->getDataFileExcel($data,$template);
        }

        public function actionUploadReport(){
                $modelHistoryContact = new HistoryContact;
                $modelContent = new TemplateSms;
		$model=new History();
                $array_contact = array();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

//                }
		if(isset($_POST['History']))
		{
                        $brand = Brandname::model()->findByPk($_POST['History']['history_brand_id']);
                    
			$model->history_campaingname=$_POST['History']['history_campaingname'];
			$model->history_brand_id=$_POST['History']['history_brand_id'];
                        $model->member_createby=  Yii::app()->user->id;
                        $model->history_startdate=  date('Y-m-d H:i:s');
                        $model->history_type = 2;
                        $model->history_createdate = date('Y-m-d H:i:s');
                        $createdate = date('Y-m-d H:i:s');
                        $startdate = date('Y-m-d H:i:s');
                        $total =0;
                        $model->history_status = 1;
                       
			if($model->insert())
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
                                $objPHPExcel->setActiveSheetIndex(0);
                                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                                
                                $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
                                $j=  count($datacontact);
                                for($i=4;$i<=$arrayCount;$i++){
                                    $modelHistoryContact = new HistoryContact;
                                    $modelHistoryContact->history_contact_ho="";
                                    $modelHistoryContact->history_contact_ten="";
                                    $modelHistoryContact->history_contact_address="";
                                    $modelHistoryContact->history_contact_birthday="";
                                    $modelHistoryContact->history_contact_company="";
                                    $modelHistoryContact->history_contact_email="";
                                    $modelHistoryContact->history_contact_gender="";
                                    $modelHistoryContact->history_contact_phone=$allDataInSheet[$i]["A"];
//                                    if(isset($data['contact_id']))
//                                        $modelHistoryContact->contact_id=$data['contact_id'];
                                    $modelHistoryContact->history_contact_notes="";
                                    $modelHistoryContact->history_content=$allDataInSheet[$i]["B"];
                                    $modelHistoryContact->content_number=$allDataInSheet[$i]["E"];
                                    $modelHistoryContact->history_id=$model->history_id;
                                    $modelHistoryContact->history_createby = YII::app()->user->id;
                                    $modelHistoryContact->api_sms_id = $allDataInSheet[$i]["D"];
                                    if($allDataInSheet[$i]["H"]=="Ä�?Ã£ gá»­i")
                                    {
                                        $modelHistoryContact->history_contact_status = 1;
                                    }
                                    else {
                                        $modelHistoryContact->history_contact_status = 0;
                                    }
                                    if($modelHistoryContact->save())
                                    {
                                        $total +=$allDataInSheet[$i]["E"];
                                    }
                                    $createdate = $allDataInSheet[$i]["F"];
                                    $startdate = $allDataInSheet[$i]["G"];
                                    
                                }
                                
                                $model->history_total=$total;
                                $model->history_startdate=  $startdate;
                                $model->history_createdate = $createdate;
                                $model->update();
                            }
                        }
                    $this->redirect(array('view','id'=>$model->history_id));
		}
                
		$this->render('upload_report',array(
			'model'=>$model,
		));
        }
        
        public function actionUploadFileResult($id){
            Yii::import("ext.EAjaxUpload.qqFileUploader");
                $folder='uploads/';// folder for uploaded files
                $allowedExtensions = array("doc","docx","xls","xlsx","png");//array("jpg","jpeg","gif","exe","mov" and etc...
                $sizeLimit = 100 * 1024 * 1024;// maximum file size in bytes
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload($folder);
                $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                
                $model = History::model()->findByPk($id);
                
                $model->history_file_result = '/uploads/'.$result['filename'];
                $model->history_status = 1;
                $model->save();

                $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
                $fileName=$result['filename'];//GETTING FILE NAME

                echo $return;// it's array
        }
        
        public function actionDowloadfileResult($id){
            $model = History::model()->findByPk($id);
            $file = Yii::getPathOfAlias('webroot').$model->history_file_result;
            if (file_exists($file)) {
                header("Content-Length: " . filesize ( $file ) ); 
                header("Content-type: application/octet-stream"); 
                header("Content-disposition: attachment; filename=".basename($file));
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                ob_clean();
                flush();

                readfile($file);

            }
        }
        
        public function actionUpdateStatusResultByExcel(){
            if($_POST['history_id'])
            {
                $model = History::model()->findByPk($_POST['history_id']);
                $file = Yii::getPathOfAlias('webroot').$model->history_file_result;
                 Yii::import('ext.phpexcel.XPHPExcel');
                // This is the file path to be uploaded.
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
                $result_error = "";
                for($i=2;$i<=$arrayCount;$i++){
                    $excel_phone = $allDataInSheet[$i]["A"];
                    if(trim($excel_phone)=="" || $excel_phone==null)
                    	continue;
                    $historyContact = HistoryContact::model()->find('history_id='.intval($_POST['history_id']).' AND history_contact_phone="'.$excel_phone.'"');
                    if($historyContact)
                    {
                        $excel_status = TBApplication::removesign($allDataInSheet[$i]["B"],"");
                        $excel_status = strtolower($excel_status);
                        $status = -1;
                        if($excel_status=="thanhcong" || $excel_status=="dagui" || $excel_status=="Dagui" || $excel_status=="Da gui" || $excel_status=="Ä�?Ã£ gá»­i" || $excel_status=="da gui")
                            $status= 1;
                        elseif($excel_status=="thatbai" || $excel_status=="loi"){
                            $status= 0;
                        }
                        $historyContact->history_contact_status =$status;
                        $historyContact->save();
                            
                    }
                    else
                    	$result_error .= $excel_phone.", ";
                } 
            }
            echo '{"status":"success","phone_error":"'.$result_error.'"}';
        }
        public function actionDownloadTemplate()
        {
            $file=Yii::getPathOfAlias('webroot').'/template/contact_result.xls';
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
                echo 'The file "contact_result.xls" does not exist';
            }
        }
        
        public function actionCronSchedule(){
            $tomorrow  = mktime(date('h'), date('i')-10, date('s'), date("m")  , date("d"), date("Y"));
            echo $date_10 = date('Y-m-d H:i:s', $tomorrow);
            echo "<br>";
            echo $date_current = date('Y-m-d H:i:s');
            $history = History::model()->findAll('send_schedule >= "'.$date_10.'" AND send_schedule <= "'.$date_current.'"');
            foreach ($history as $history_item){
                    $history_update = History::model()->findByPk($history_item->history_id);
                    $history_update->history_status = 1;
                    $history_update->status_schudule = 0;
                    $history_update->save();
                    $brand = Brandname::model()->findByPk($history_item->history_brand_id);
                    $history_contact_schudule = HistoryContactSchedule::model()->findAll('history_id='.intval($history_item->history_id));
                    $result = false;
                    foreach ($history_contact_schudule as $history_contact_schudule_item) {
                        $result_send = 0;
                        if($history_item->history_type==1)
                        {
                            $callAPI = new APISMS();
                            $result_send = $callAPI->sent($brand->brand_username,$brand->brand_password,$brand->brandname, $history_contact_schudule_item->history_contact_phone, $history_contact_schudule_item->history_content,$history_contact_schudule_item->history_contact_schedule_id);
                        }
                        else
                        {
                            $result_send = 0;
                        }
                        $modelHistoryContact = new HistoryContact;
                        $modelHistoryContact->history_contact_ho=$history_contact_schudule_item->history_contact_ho;
                        $modelHistoryContact->history_contact_ten=$history_contact_schudule_item->history_contact_ten;
                        $modelHistoryContact->history_contact_address=$history_contact_schudule_item->history_contact_address;
                        $modelHistoryContact->history_contact_birthday=$history_contact_schudule_item->history_contact_birthday;
                        $modelHistoryContact->history_contact_company=$history_contact_schudule_item->history_contact_company;
                        $modelHistoryContact->history_contact_email=$history_contact_schudule_item->history_contact_email;
                        $modelHistoryContact->history_contact_gender=$history_contact_schudule_item->history_contact_gender;
                        $modelHistoryContact->history_contact_phone=$history_contact_schudule_item->history_contact_phone;
    //                                    if(isset($data['contact_id']))
    //                                        $modelHistoryContact->contact_id=$data['contact_id'];
                        $modelHistoryContact->history_contact_notes=$history_contact_schudule_item->history_contact_notes;
                        $modelHistoryContact->history_content=$history_contact_schudule_item->history_content;
                        $modelHistoryContact->content_number=$history_contact_schudule_item->content_number;
                        $modelHistoryContact->history_id=$history_contact_schudule_item->history_id;
                        $modelHistoryContact->history_createby = $history_contact_schudule_item->history_createby;
                        $modelHistoryContact->api_sms_id = $result_send;
                        if(trim($result_send)=="0|Success")
                        {
                            $modelHistoryContact->history_contact_status = 1;
                        }
                        elseif($history_item->history_type==2)
                        {
                            $modelHistoryContact->history_contact_status = -1;
                        }
                        if($modelHistoryContact->save())
                            $result = true;
                    }
                    if($result)
                        HistoryContactSchedule::model ()->deleteAll ('history_id='.intval($history_item->history_id));
            }
        }
     
        
        
    }
