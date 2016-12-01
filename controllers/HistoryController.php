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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','getDanhba','exportExcel'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
                        'modelContact'=>$modelContact
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
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
                        
			$model->history_campaingname=$_POST['history_campaingname'];
			$model->history_brand_id=$_POST['history_brand_id'];
                        $model->member_createby=  Yii::app()->user->id;
                        $model->history_startdate=  date('Y-m-d H:i:s');
                       
			if($model->insert())
                        {
//                            if()
//                            $this->redirect(array('view','id'=>$model->history_id));
                            if(isset($_POST['people']))
                            {
                                $array_contact=$_POST['people'];
                                $total = 0;
                                foreach ($array_contact as $data)
                                {
//                                    echo '<pre>';
//                                    print_r($data);
                                    $modelHistoryContact = new HistoryContact;
                                    $modelHistoryContact->history_contact_hoten=$data['contact_hoten'];
                                    $modelHistoryContact->history_contact_address=$data['contact_address'];
                                    $modelHistoryContact->history_contact_birthday=$data['contact_birthday'];
                                    $modelHistoryContact->history_contact_company=$data['contact_company'];
                                    $modelHistoryContact->history_contact_email=$data['contact_email'];
                                    $modelHistoryContact->history_contact_gender=$data['contact_gender'];
                                    $modelHistoryContact->history_contact_phone=$data['contact_phone'];
                                    if(isset($data['contact_id']))
                                        $modelHistoryContact->contact_id=$data['contact_id'];
                                    $modelHistoryContact->history_contact_notes=$data['contact_notes'];
                                    $modelHistoryContact->history_content=$data['contact_content'];
                                    $modelHistoryContact->content_number=$data['content_number'];
                                    
                                    
                                    $modelHistoryContact->history_id=$model->history_id;
                                    $modelHistoryContact->insert();
                                    
                                    $total +=$data['content_number'];
                                }
                            }
                        }
                        $model->history_total=$total;
                        $model->update();
		}
                
		$this->render('create',array(
			'model'=>$model,
                        'modelHistoryContact'=>$modelHistoryContact,
                        'modelContent'=>$modelContent
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
            if(isset($_POST['danhba']) && $_POST['danhba'] >0)
            {
                $model = Contact::model()->getDataArray($_POST['danhba'],$template);
                
            }
            if(isset($_POST['people']))
            {
                $model = array_merge($model, $_POST['people']);
            }
            
            if(isset($_POST['file']))
            {
                Yii::import('ext.phpexcel.XPHPExcel');

                // This is the file path to be uploaded.
                $file = Yii::app()->basePath.'/template_contact.xls';
                $objPHPExcel= XPHPExcel::createPHPExcel();

                $inputFileName=$file;
                try {
                        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                } catch(Exception $e) {
                        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                }
                //        }
                $datacontact=array();
                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
//                $j=  count($datacontact);
                $j=0;
                for($i=2;$i<=$arrayCount;$i++){
                                $userName = trim($allDataInSheet[$i]["A"]);
                                $userMobile = trim($allDataInSheet[$i]["C"]);
                                if($allDataInSheet[$i]["D"] >0){
                                $datacontact[$j]['contact_hoten']=$allDataInSheet[$i]["A"].' '.$allDataInSheet[$i]["B"];
                                $datacontact[$j]['contact_phone']=$allDataInSheet[$i]["D"];
                                $datacontact[$j]['contact_address']=$allDataInSheet[$i]["E"].' '.$allDataInSheet[$i]["F"];
                                $datacontact[$j]['contact_birthday']=$allDataInSheet[$i]["H"];
                                $datacontact[$j]['contact_gender']=$allDataInSheet[$i]["I"];
                                $datacontact[$j]['contact_email']=$allDataInSheet[$i]["C"];
                                $datacontact[$j]['contact_company']=$allDataInSheet[$i]["G"];
                                $datacontact[$j]['contact_notes']=""; 
                                if(isset($template))
                                {
                                    $contact_content=$template;
                                    $date = str_replace('/','-',$allDataInSheet[$i]["H"]);
                                    $date=date('Y-m-d',  strtotime($date));
                                    $tuoi = Contact::model()->getAge($date);
                                    $contact_content = str_replace('$ten$', $datacontact[$j]['contact_hoten'],$contact_content);
                                    $contact_content = str_replace('$tuoi$', $tuoi,$contact_content);
                                    $contact_content = str_replace('$email$', $datacontact[$j]['contact_email'],$contact_content);
                                    $contact_content = str_replace('$dienthoai$', $datacontact[$j]['contact_phone'],$contact_content);

                                }
                                
                                $datacontact[$j]['contact_content']=$contact_content;  
                                $sotin = strlen($contact_content)/160;
                                if(strlen($contact_content) > 0 && strlen($contact_content)<160)
                                    $sotin=1;
                                $datacontact[$j]['contact_content']=$contact_content;  
                                $datacontact[$j]['content_number']=round($sotin);  
                                $j++;
                                }
                }
                
                $model = array_merge($model, $datacontact);
                
            }
            $response = array();
            $response['status']='success';
            $response['getdata']=$model;
            echo json_encode($response);
        }
        
        public function actionexportExcel($id)
        {
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
            $infohistory = History::model()->findAllByPk($history_id);
            $contactHistory = HistoryContact::model()->findAll('history_id='.$history_id);
            $i=5;
            $test->setCellValue('A1','Đợt gửi');
            $test->setCellValue('B1','Bank name');
            $test->setCellValue('C1','Ngày gửi');
            $test->setCellValue('D1','Tổng tin nhắn');
            
            $test->setCellValue('A2',$infohistory[0]['history_campaingname']);
            $test->setCellValue('B2',$infohistory[0]['history_brand_id']);
            $test->setCellValue('C2',$infohistory[0]['history_startdate']);
            $test->setCellValue('D2',$infohistory[0]['history_total']);
            
            $test->setCellValue('A4','Họ tên');
            $test->setCellValue('B4','Số điện thoại');
            $test->setCellValue('C4', 'Ngày sinh');
            $test->setCellValue('D4', 'Giới tính');
            $test->setCellValue('E4', 'Địa chỉ');
            $test->setCellValue('F4', 'Email');
            $test->setCellValue('G4', 'Công ty');
            $test->setCellValue('H4', 'Nội dung tin nhắn');
            $test->setCellValue('I4', 'Số tin nhắn');
           
           
            foreach ($contactHistory as $data)
            {
                $test->setCellValue('A'.$i, $data['history_contact_hoten']);
                $test->setCellValue('B'.$i, $data['history_contact_phone']);
                $test->setCellValue('C'.$i, $data['history_contact_birthday']);
                $test->setCellValue('D'.$i, $data['history_contact_gender']);
                $test->setCellValue('E'.$i, $data['history_contact_address']);
                $test->setCellValue('F'.$i, $data['history_contact_email']);
                $test->setCellValue('G'.$i, $data['history_contact_company']);
                $test->setCellValue('H'.$i, $data['history_content']);
                $test->setCellValue('I'.$i, $data['content_number']);
                $i++;
            }
            
           
//            ->setCellValueByColumnAndRow($column, $row, $value);
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            // If you want to output e.g. a PDF file, simply do:
            //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
            $objWriter->save('MyExcel.xls');
            
            $file=Yii::getPathOfAlias('webroot').'/MyExcel.xls';
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
}
