<?php

/**
 * This is the model class for table "history_sms".
 *
 * The followings are the available columns in table 'history_sms':
 * @property integer $history_id
 * @property string $history_campaingname
 * @property string $history_brandname
 * @property string $history_startdate
 * @property integer $history_status
 * @property integer $history_total
 * @property string $history_notes
 * @property string $history_type
 * @property string $history_mobile
 * @property integer $member_createby
 * @property integer $history_createdate
 * @property integer $history_file_result
 * @property string $send_schedule
 * @property string $history_is_schedule
 * @property integer $status_schudule
 */
class History extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'history_sms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('history_campaingname, history_startdate', 'required'),
			array('history_status, history_total, member_createby,history_brand_id,api_sms_id,history_is_schedule,status_schudule', 'numerical', 'integerOnly'=>true),
			array('history_campaingname, history_brand_id, history_type, history_mobile', 'length', 'max'=>100),
			array('history_notes,history_file_result', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('history_id, history_campaingname, history_brand_id, history_file_result, history_startdate, history_status, history_total, history_notes, history_type, history_mobile, member_createby, history_createdate,send_schedule,history_is_schedule,status_schudule', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'history_id' => 'History',
			'history_campaingname' => 'Tên chiến dịch',
			'history_brand_id' => 'Brandname',
			'history_startdate' => 'Ngày gửi',
			'history_status' => 'Trạng thái',
			'history_total' => 'Tổng số tin gửi đi',
			'history_notes' => 'Ghi chú',
			'history_type' => 'Kiểu Tin nhắn',
			'history_mobile' => 'History Mobile',
			'member_createby' => 'Người gửi',
                        'history_createdate' => 'Ngày tạo',
                        'api_sms_id' => 'api_sms_id',
                        'history_file_result' => 'File kết quả',
                        'send_schedule'=>'Lịch gửi',
                        'status_schudule'=>'Trạng thái lịch hẹn'
                        
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
	public function search($createby_id=false)
	{
            if(!$createby_id)
                $createby_id = YII::app()->user->id;
            if($this->member_createby)
                $createby_id = $this->member_createby;
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('history_id',$this->history_id);
		$criteria->compare('history_campaingname',$this->history_campaingname,true);
		$criteria->compare('history_startdate',$this->history_startdate,true);
		$criteria->compare('history_status',$this->history_status);
		$criteria->compare('history_total',$this->history_total);
		$criteria->compare('history_notes',$this->history_notes,true);
		$criteria->compare('history_type',$this->history_type,true);
		$criteria->compare('history_mobile',$this->history_mobile,true);
		$criteria->compare('member_createby',$createby_id);
                $criteria->compare('history_createdate',$this->history_createdate);
                $criteria->compare('send_schedule',$this->send_schedule);
                
                if($this->history_brand_id && is_array($this->history_brand_id))
                    $criteria->addCondition ('history_brand_id IN('.implode (',', $this->history_brand_id).')','AND');
                else if($this->history_brand_id)
                    $criteria->compare('history_brand_id',$this->history_brand_id);
                $criteria->order = 'history_id desc, history_startdate asc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return History the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function isSchudule($value){
            if($value==1)
                return true;
            return false;
        }
       
}
