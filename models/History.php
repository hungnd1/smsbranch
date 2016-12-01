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
			array('history_status, history_total, member_createby,history_brand_id', 'numerical', 'integerOnly'=>true),
			array('history_campaingname, history_brand_id, history_type, history_mobile', 'length', 'max'=>100),
			array('history_notes', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('history_id, history_campaingname, history_brand_id, history_startdate, history_status, history_total, history_notes, history_type, history_mobile, member_createby', 'safe', 'on'=>'search'),
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
			'history_campaingname' => 'Tên đợt gửi',
			'history_brand_id' => 'Bank name',
			'history_startdate' => 'History Startdate',
			'history_status' => 'History Status',
			'history_total' => 'History Total',
			'history_notes' => 'History Notes',
			'history_type' => 'History Type',
			'history_mobile' => 'History Mobile',
			'member_createby' => 'Member Createby',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('history_id',$this->history_id);
		$criteria->compare('history_campaingname',$this->history_campaingname,true);
		$criteria->compare('history_brand_id',$this->history_brand_id,true);
		$criteria->compare('history_startdate',$this->history_startdate,true);
		$criteria->compare('history_status',$this->history_status);
		$criteria->compare('history_total',$this->history_total);
		$criteria->compare('history_notes',$this->history_notes,true);
		$criteria->compare('history_type',$this->history_type,true);
		$criteria->compare('history_mobile',$this->history_mobile,true);
		$criteria->compare('member_createby',$this->member_createby);

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
        
       
}
