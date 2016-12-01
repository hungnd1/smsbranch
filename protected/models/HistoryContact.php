<?php

/**
 * This is the model class for table "history_contact".
 *
 * The followings are the available columns in table 'history_contact':
 * @property integer $history_contact_id
 * @property integer $contact_id
 * @property string $history_contact_ho
 * @property string $history_contact_ten
 * @property string $history_contact_phone
 * @property string $history_contact_birthday
 * @property integer $history_contact_gender
 * @property string $history_contact_address
 * @property string $history_contact_email
 * @property string $history_contact_company
 * @property string $history_contact_notes
 * @property integer $history_contact_status
 * @property string $history_contact_sms
 * @property integer $history_id
 * @property string $history_content
 * @property integer $content_number
 * @property integer $history_createby
 * @property integer $api_sms_id
 */
class HistoryContact extends CActiveRecord
{
    public $history_todate;
    public $history_fromdate;
    public $history_type;
    public $history_brandname;
    public $history_month;

    public $arr_phone3;
    public $arr_phone4;
    public $phone_other;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'history_contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('history_id,history_contact_phone', 'required'),
			array('contact_id, history_contact_status, history_id, content_number, history_createby', 'numerical', 'integerOnly'=>true),
			array('history_contact_ho, history_contact_ten', 'length', 'max'=>50),
                        array('history_contact_phone', 'length', 'max'=>20),
			array('history_contact_address, history_contact_company, history_contact_notes', 'length', 'max'=>255),
			array('history_contact_email,history_contact_gender', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('history_contact_id, contact_id, history_contact_ho, api_sms_id, history_createby, history_contact_ten, history_contact_phone, history_contact_birthday, history_contact_gender, history_contact_address, history_contact_email, history_contact_company, history_contact_notes, history_contact_status, history_contact_sms, history_id, history_content, content_number', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'history'=>array(self::BELONGS_TO,'History','history_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'history_contact_id' => 'History Contact',
			'contact_id' => 'Contact',
			'history_contact_ho' => 'Họ',
                        'history_contact_ten' => 'Tên',
			'history_contact_phone' => 'Số diện thoại',
			'history_contact_birthday' => 'Ngày sinh',
			'history_contact_gender' => 'Giới tính',
			'history_contact_address' => 'Địa chỉ',
			'history_contact_email' => 'Email',
			'history_contact_company' => 'Công ty',
			'history_contact_notes' => 'Ghi chú',
			'history_contact_status' => 'Trạng thái',
			'history_contact_sms' => 'History Contact Sms',
			'history_id' => 'History',
			'history_content' => 'Nội dung tin nhắn',
			'content_number' => 'Số tin',
			'arr_phone3' => 'Số tin',
			'arr_phone4' => 'Số tin',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($page=20,$createby_id=false)
	{
                if(!$createby_id)
                    $createby_id = YII::app()->user->id;
                if($this->history_createby)
                    $createby_id = $this->history_createby;
		// @todo Please modify the following code to remove attributes that should not be searched.
                
                $arr_other3=  PrSystemValueKey::model()->getPhoneOther(4);

                $arr_other4=  PrSystemValueKey::model()->getPhoneOther(5);

		$criteria=new CDbCriteria;

		$criteria->compare('history_contact_id',$this->history_contact_id);
		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('history_contact_ho',$this->history_contact_ho,true);
                $criteria->compare('history_contact_ten',$this->history_contact_ten,true);
		$criteria->compare('history_contact_phone',$this->history_contact_phone,true);
		$criteria->compare('history_contact_birthday',$this->history_contact_birthday,true);
		$criteria->compare('history_contact_gender',$this->history_contact_gender);
		$criteria->compare('history_contact_address',$this->history_contact_address,true);
		$criteria->compare('history_contact_email',$this->history_contact_email,true);
		$criteria->compare('history_contact_company',$this->history_contact_company,true);
		$criteria->compare('history_contact_notes',$this->history_contact_notes,true);
		$criteria->compare('history_contact_status',$this->history_contact_status);
		$criteria->compare('history_contact_sms',$this->history_contact_sms,true);
		$criteria->compare('t.history_id',$this->history_id);
		$criteria->compare('history_content',$this->history_content,true);
		$criteria->compare('content_number',$this->content_number);
                $criteria->compare('history.history_type',$this->history_type);
                if($createby_id!=-1)
                    $criteria->compare('history_createby', $createby_id);
                $criteria->compare('api_sms_id', $this->api_sms_id);
                $criteria->order = 'history_contact_id DESC';
                
                if($this->history_fromdate)
                {
                    $this->history_fromdate = $this->history_fromdate. ' 00:00:00';
                    $this->history_fromdate = date('Y-m-d H:i:s',  strtotime($this->history_fromdate));
                }
                if($this->history_todate)
                {
                    $this->history_todate = $this->history_todate. ' 23:59:59';
                    $this->history_todate = date('Y-m-d H:i:s',  strtotime($this->history_todate));
                }  
                if($this->history_month){
                    $criteria->addCondition('MONTH(history.history_startdate)="'.substr($this->history_month,0,2).'" AND YEAR(history.history_startdate)="'.substr($this->history_month, -4).'"');
                }  
                if($this->history_fromdate && $this->history_todate)
                    $criteria->addCondition('history.history_startdate >= "'.$this->history_fromdate.'" AND history.history_startdate <= "'.$this->history_todate.'"');
                else if($this->history_fromdate)
                     $criteria->addCondition('history.history_startdate >= "'.$this->history_fromdate.'"');
                else if($this->history_todate)
                    $criteria->addCondition('history.history_startdate <= "'.$this->history_todate.'"');
		//		echo $this->arr_phone3;
//                $arr_phone4='1258';
                if($this->phone_other ==1)
                {
                    if(isset($this->arr_phone3) && isset($this->arr_phone4))
                        $criteria->addCondition ('SUBSTRING(history_contact_phone,1,4) IN('.$this->arr_phone3.') OR SUBSTRING(history_contact_phone,1,5) IN('.$this->arr_phone4.') '
                                . ' OR (SUBSTRING(history_contact_phone,1,4) NOT IN('.$arr_other3.') AND SUBSTRING(history_contact_phone,1,5) NOT IN('.$arr_other4.')) ','AND');
                    else if($this->arr_phone3 || $this->arr_phone4)
                    {
                        if(isset ($this->arr_phone3))
                            $criteria->addCondition ('SUBSTRING(history_contact_phone,1,4) IN('.$this->arr_phone3.')'
                                    . ' OR (SUBSTRING(history_contact_phone,1,4) NOT IN('.$arr_other3.') AND SUBSTRING(history_contact_phone,1,5) NOT IN('.$arr_other4.'))','AND');
                        if(isset ($this->arr_phone4))
                            $criteria->addCondition ('SUBSTRING(history_contact_phone,1,5) IN('.$this->arr_phone4.')'
                                    . ' OR (SUBSTRING(history_contact_phone,1,4) NOT IN('.$arr_other3.') AND SUBSTRING(history_contact_phone,1,5) NOT IN('.$arr_other4.'))','AND');
                        
                    }
                    else {
                            $criteria->addCondition ('SUBSTRING(history_contact_phone,1,4) NOT IN('.$arr_other3.') AND SUBSTRING(history_contact_phone,1,5) NOT IN('.$arr_other4.')','AND');
                    }
                
                }else{
                    if(isset($this->arr_phone3) && isset($this->arr_phone4))
                        $criteria->addCondition ('SUBSTRING(history_contact_phone,1,4) IN('.$this->arr_phone3.') OR SUBSTRING(history_contact_phone,1,5) IN('.$this->arr_phone4.')','AND');
                    else
                    {
                        if(isset ($this->arr_phone3))
                            $criteria->addCondition ('SUBSTRING(history_contact_phone,1,4) IN('.$this->arr_phone3.')','AND');
                        if(isset ($this->arr_phone4))
                            $criteria->addCondition ('SUBSTRING(history_contact_phone,1,5) IN('.$this->arr_phone4.')','AND');
                        
                    }
                }
                if($this->history_brandname && is_array($this->history_brandname))
                    $criteria->addCondition ('history.history_brand_id IN('.implode (',', $this->history_brandname).')','AND');
                else if($this->history_brandname)
                    $criteria->compare('history.history_brand_id',$this->history_brandname);
                $criteria->with = array('history');

                if($page>0)
                {
                    return new CActiveDataProvider($this, array(
                            'criteria'=>$criteria,
                            'pagination'=>array(
                                    'pageSize'=>$page,
                            ),
                    ));
                }
                else
                {
                    return new CActiveDataProvider($this, array(
                            'criteria'=>$criteria,
                            'pagination'=>false
                    ));
                }
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HistoryContact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
}
