<?php

class HistoryContactController extends Controller
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
				'actions'=>array('create','sendSMS','update','ExportExcel','Report','ExportExcelFlow','ReportMonth','uploadReport','ExportExcelFlowMonth'),
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
		$model=new HistoryContact;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HistoryContact']))
		{
			$model->attributes=$_POST['HistoryContact'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->history_id));
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

		if(isset($_POST['HistoryContact']))
		{
			$model->attributes=$_POST['HistoryContact'];
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
		$dataProvider=new CActiveDataProvider('HistoryContact');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new HistoryContact('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['HistoryContact']))
                {
			$model->attributes=$_GET['HistoryContact'];
                        echo $_GET['HistoryContact']['history_contact_phone'];
                        $model->history_contact_phone=$_GET['HistoryContact']['history_contact_phone'];
                        $model->history_type = $_GET['HistoryContact']['history_type'];
                        $model->history_fromdate = $_GET['HistoryContact']['history_fromdate'];
                        $model->history_todate = $_GET['HistoryContact']['history_todate'];
                        $model->history_type = $_GET['HistoryContact']['history_type'];
                        if(isset($_GET['HistoryContact']['history_createby']))
                            $model->history_createby = $_GET['HistoryContact']['history_createby'];
                        else
                            $model->history_createby = YII::app ()->user->id;
                }
                
;		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return HistoryContact the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=HistoryContact::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param HistoryContact $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='history-contact-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionExportExcel($phone,$type,$status,$fromdate,$todate,$createby)
        {
            $smsType = PrSystemValueKey::model()->getSysVal("SmsType");
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
            
            $model=new HistoryContact('search');
            $model->unsetAttributes();  // clear any default values

            if($phone!="")
                    $model->history_contact_phone = $phone;
            if($status!="")
                    $model->history_contact_status = $status;
            if($fromdate!="")
                    $model->history_fromdate = $fromdate;
            if($todate!="")
                    $model->history_todate = $todate;
            if($type!="")
                    $model->history_type = $type;
            if($createby!="")
                    $model->history_createby = $createby;
            $test->setCellValue('A1','Số điện thoại');
            $test->setCellValue('B1','Nội dung tin nhắn');
            $test->setCellValue('C1', 'Số tin nhắn');
            $test->setCellValue('D1', 'Trạng thái');
            $test->setCellValue('E1', 'Loại tin');
            $test->setCellValue('F1', 'Ngày gửi');
           
            $i=2;
            foreach ($model->search(false)->data as $data)
            {
                $history_type = "";
                if(isset($data->history->history_type) && $data->history->history_type!="" && $data->history->history_type!=0)
                    $history_type = $smsType[$data->history->history_type];
                
                $test->setCellValue('A'.$i, $data->history_contact_phone);
                $test->setCellValue('B'.$i, $data->history_content);
                $test->setCellValue('C'.$i, $data->content_number);
                $test->setCellValue('D'.$i, ($data->history_contact_status>0) ? $status_arr[$data->history_contact_status] : "");
                $test->setCellValue('E'.$i, $history_type);
                $test->setCellValue('F'.$i, date('d-m-Y H:i:s',  strtotime($data->history->history_startdate)));
                $i++;
            }
            $name = 'danh_sach_gui_tin_'.date('dmYHi');
           
//            ->setCellValueByColumnAndRow($column, $row, $value);
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            // If you want to output e.g. a PDF file, simply do:
            //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
            $objWriter->save(Yii::getPathOfAlias('webroot').'/uploads/files/'.$name.'.xls');
            
            $file=Yii::getPathOfAlias('webroot').'/uploads/files/'.$name.'.xls';
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
        
        public function actionReport(){
            $model=new HistoryContact('search');
            $model->unsetAttributes();  // clear any default values
            $phone="";
            $phone3="";
            $phone4="";
            if(isset($_GET['telecom']))
            {
                $telecom=$_GET['telecom'];
                if(count($telecom)>1)
                {
                    
                    for($i=0;$i<count($telecom);$i++)
                    {
                        if($telecom[$i]!="khac")
                        {
                            $phone3 .= PrSystemValueKey::model()->getPhone3Number($telecom[$i],4).',';
                             $phone4 .=PrSystemValueKey::model()->getPhone3Number($telecom[$i],5).',';
                        }
                        else
                            $model->phone_other=1;
                    }
                     
                }
                else
                {
                    if($_GET['telecom']=="khac")
                    {
                        $model->phone_other=1;
                    }
                    else
                    {
                            $phone3 .= PrSystemValueKey::model()->getPhone3Number($_GET['telecom'],4).',';
                            $phone4 .=PrSystemValueKey::model()->getPhone3Number($_GET['telecom'],5).',';
                    }
                }
            }
            //$model->history_month = date('m-Y');
            if(isset($_GET['HistoryContact']))
            {
                    $phone3 = rtrim($phone3, ',');
                    $phone4 = rtrim($phone4, ',');

                    $model->attributes=$_GET['HistoryContact'];
                    $model->history_type = $_GET['HistoryContact']['history_type'];
                    $model->history_fromdate = $_GET['HistoryContact']['history_fromdate'];
                    $model->history_todate = $_GET['HistoryContact']['history_todate'];
                    $model->history_type = $_GET['HistoryContact']['history_type'];
                    if(isset($_GET['HistoryContact']['history_createby']))
                        $model->history_createby = $_GET['HistoryContact']['history_createby'];
                    if(isset($_GET['HistoryContact']['history_brandname']))
                    {
                        $model->history_brandname = $_GET['HistoryContact']['history_brandname'];
                    }
                    if($phone3!="")
                        $model->arr_phone3=$phone3;
                    if($phone4!="")
                        $model->arr_phone4=$phone4;
            }

            $this->render('report',array(
                    'model'=>$model,
            ));
            
        }
        
        public function actionExportExcelFlow($brandname,$type,$status,$fromdate,$todate,$telecoms,$createBy)
        {
            $smsType = PrSystemValueKey::model()->getSysVal("SmsType");
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
            
            $model=new HistoryContact('search');
            $model->unsetAttributes();  // clear any default values
            
            $phone="";
            $phone3="";
            $phone4="";
            if(isset($telecoms))
            {
                $leng = strlen($telecoms)-1;
                $telecoms = substr($telecoms, 0,$leng);
                $telecom=  explode(',', $telecoms);
                if(count($telecom)>1)
                {
                    
                    for($i=0;$i<count($telecom);$i++)
                    {
                        if($telecom[$i]!="khac")
                        {
                            $phone3 .= PrSystemValueKey::model()->getPhone3Number($telecom[$i],4).',';
                             $phone4 .=PrSystemValueKey::model()->getPhone3Number($telecom[$i],5).',';
                        }
                        else
                            $model->phone_other=1;
                    }
                     
                }
                else
                {
                    if($telecoms=="khac")
                    {
                        $model->phone_other=1;
                    }
                    else
                    {
                            $phone3 .= PrSystemValueKey::model()->getPhone3Number($telecoms,4).',';
                            $phone4 .=PrSystemValueKey::model()->getPhone3Number($telecoms,5).',';
                    }
                }
            }
            $leng1 = strlen($phone3)-1;
            $phone3 = substr($phone3, 0,$leng1);
            $leng2 = strlen($phone4)-1;
            $phone4 = substr($phone4, 0,$leng2);
            
            if($brandname!="" && $brandname!=null && $brandname!="null")
                    $model->history_brandname = $brandname;
            if($status!="")
                    $model->history_contact_status = $status;
            if($fromdate!="")
                    $model->history_fromdate = $fromdate;
            if($todate!="")
                    $model->history_todate = $todate;
            if($type!="")
                    $model->history_type = $type;
            if($phone3!="")
                $model->arr_phone3=$phone3;
            if($phone4!="")
                $model->arr_phone4=$phone4;
            if($createBy > 0)
                $model->history_createby = $createBy;
	    else
		$model->history_createby = Yii::app()->user->id;
            
            $test->setCellValue('A1','Số điện thoại');
            $test->setCellValue('B1','Nội dung tin nhắn');
            $test->setCellValue('C1','Brandname');
            $test->setCellValue('D1', 'Ngày gửi');
            $test->setCellValue('E1', 'Số tin nhắn');
            $test->setCellValue('F1', 'Trạng thái');
            $test->setCellValue('G1', 'Loại tin');
            $i=2;
            foreach ($model->search(false)->data as $data)
            {
                $history_type = "";
                if(isset($data->history->history_type) && $data->history->history_type!="" && $data->history->history_type!=0)
                    $history_type = $smsType[$data->history->history_type];
                $brandnames= Brandname::model()->findByPk($data->history->history_brand_id);
                $test->setCellValue('A'.$i, $data->history_contact_phone);
                $test->setCellValue('B'.$i, $data->history_content);
                $test->setCellValue('C'.$i, $brandnames->brandname);
                $test->setCellValue('D'.$i, date('d-m-Y H:i:s',  strtotime($data->history->history_startdate)));
                $test->setCellValue('E'.$i, $data->content_number);
                $test->setCellValue('F'.$i, ($data->history_contact_status > -1) ? $status_arr[$data->history_contact_status] : "");
                $test->setCellValue('G'.$i, $history_type);

                $i++;
            }
            $name = 'danh_sach_gui_tin_'.date('dmYHi');
           
//            ->setCellValueByColumnAndRow($column, $row, $value);
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            // If you want to output e.g. a PDF file, simply do:
            //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
            $objWriter->save(Yii::getPathOfAlias('webroot').'/uploads/files/'.$name.'.xls');
            
            $file=Yii::getPathOfAlias('webroot').'/uploads/files/'.$name.'.xls';
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
        
        public function actionReportMonth(){
                    $model=new HistoryContact('search');
                    $model->unsetAttributes();  // clear any default values
                    
                    $phone="";
                    $phone3="";
                    $phone4="";
                    if(isset($_GET['telecom']))
                    {
                        $telecom=$_GET['telecom'];
                        if(count($telecom)>1)
                        {

                            for($i=0;$i<count($telecom);$i++)
                            {
                                if($telecom[$i]!="khac")
                                {
                                    $phone3 .= PrSystemValueKey::model()->getPhone3Number($telecom[$i],4).',';
                                     $phone4 .=PrSystemValueKey::model()->getPhone3Number($telecom[$i],5).',';
                                }
                                else
                                    $model->phone_other=1;
                            }

                        }
                        else
                        {
                            if($_GET['telecom']=="khac")
                            {
                                $model->phone_other=1;
                            }
                            else
                            {
                                    $phone3 .= PrSystemValueKey::model()->getPhone3Number($_GET['telecom'],4).',';
                                    $phone4 .=PrSystemValueKey::model()->getPhone3Number($_GET['telecom'],5).',';
                            }
                        }
                    }
                    if(isset($_GET['HistoryContact']))
                    {
                            $phone3 = rtrim($phone3, ',');
                            $phone4 = rtrim($phone4, ',');

                            $model->attributes=$_GET['HistoryContact'];
                            $model->history_type = $_GET['HistoryContact']['history_type'];
                            $model->history_month = $_GET['HistoryContact']['history_monthdate'];
                            $model->history_type = $_GET['HistoryContact']['history_type'];
                            if(isset($_GET['HistoryContact']['history_createby']))
                                $model->history_createby = $_GET['HistoryContact']['history_createby'];
                            if(isset($_GET['HistoryContact']['history_brandname']))
                            {
                                $model->history_brandname = $_GET['HistoryContact']['history_brandname'];
                            }
                            if($phone3!="")
                                $model->arr_phone3=$phone3;
                            if($phone4!="")
                                $model->arr_phone4=$phone4;
                    }

                    $this->render('report_month',array(
                            'model'=>$model,
                    ));

                }
                
                public function actionUploadReport(){
                    $model=new HistoryContact;

                    // Uncomment the following line if AJAX validation is needed
                    // $this->performAjaxValidation($model);

                    if(isset($_POST['HistoryContact']))
                    {
                            $model->attributes=$_POST['HistoryContact'];
                            if($model->save())
                                    $this->redirect(array('view','id'=>$model->history_id));
                    }

                    $this->render('create',array(
                            'model'=>$model,
                    ));
                }
                
        public function actionExportExcelFlowMonth($brandname,$type,$status,$month,$telecoms,$createBy)
        {
            $smsType = PrSystemValueKey::model()->getSysVal("SmsType");
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
            
            $model=new HistoryContact('search');
            $model->unsetAttributes();  // clear any default values
            
            $phone="";
            $phone3="";
            $phone4="";
            if(isset($telecoms))
            {
                $leng = strlen($telecoms)-1;
                $telecoms = substr($telecoms, 0,$leng);
                $telecom=  explode(',', $telecoms);
                if(count($telecom)>1)
                {
                    
                    for($i=0;$i<count($telecom);$i++)
                    {
                        if($telecom[$i]!="khac")
                        {
                            $phone3 .= PrSystemValueKey::model()->getPhone3Number($telecom[$i],4).',';
                             $phone4 .=PrSystemValueKey::model()->getPhone3Number($telecom[$i],5).',';
                        }
                        else
                            $model->phone_other=1;
                    }
                     
                }
                else
                {
                    if($telecoms=="khac")
                    {
                        $model->phone_other=1;
                    }
                    else
                    {
                            $phone3 .= PrSystemValueKey::model()->getPhone3Number($telecoms,4).',';
                            $phone4 .=PrSystemValueKey::model()->getPhone3Number($telecoms,5).',';
                    }
                }
            }
            $leng1 = strlen($phone3)-1;
            $phone3 = substr($phone3, 0,$leng1);
            
            $leng2 = strlen($phone4)-1;
            $phone4 = substr($phone4, 0,$leng2);
            
            if($brandname!="" && $brandname!=null && $brandname!="null")
                    $model->history_brandname = $brandname;
            if($status!="")
                    $model->history_contact_status = $status;
            if($month!="")
                    $model->history_month = $month;
            if($type!="")
                    $model->history_type = $type;
            if($phone3!="")
                $model->arr_phone3=$phone3;
            if($phone4!="")
                $model->arr_phone4=$phone4;
            if($createBy!="")
                $model->history_createby = $createBy;
            
            $test->setCellValue('A1','Số điện thoại');
            $test->setCellValue('B1','Nội dung tin nhắn');
            $test->setCellValue('C1','Brandname');
            $test->setCellValue('D1', 'Ngày gửi');
            $test->setCellValue('E1', 'Số tin nhắn');
            $test->setCellValue('F1', 'Trạng thái');
            $test->setCellValue('G1', 'Loại tin');
           
            $i=2;
            foreach ($model->search(false)->data as $data)
            {
                $history_type = "";
                if(isset($data->history->history_type) && $data->history->history_type!="" && $data->history->history_type!=0)
                    $history_type = $smsType[$data->history->history_type];
                $brandnames= Brandname::model()->findByPk($data->history->history_brand_id);
                $test->setCellValue('A'.$i, $data->history_contact_phone);
                $test->setCellValue('B'.$i, $data->history_content);
                $test->setCellValue('C'.$i, $brandnames->brandname);
                $test->setCellValue('D'.$i, date('d-m-Y H:i:s',  strtotime($data->history->history_startdate)));
                $test->setCellValue('E'.$i, $data->content_number);
                $test->setCellValue('F'.$i, ($data->history_contact_status > -1) ? $status_arr[$data->history_contact_status] : "");
                $test->setCellValue('G'.$i, $history_type);

                $i++;
            }
            $name = 'danh_sach_gui_tin_'.date('dmYHi');
           
//            ->setCellValueByColumnAndRow($column, $row, $value);
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            // If you want to output e.g. a PDF file, simply do:
            //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
            $objWriter->save(Yii::getPathOfAlias('webroot').'/uploads/files/'.$name.'.xls');
            
            $file=Yii::getPathOfAlias('webroot').'/uploads/files/'.$name.'.xls';
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
