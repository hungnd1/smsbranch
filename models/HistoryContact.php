<?php

/**
 * This is the model class for table "history_contact".
 *
 * The followings are the available columns in table 'history_contact':
 * @property integer $history_contact_id
 * @property integer $contact_id
 * @property string $history_contact_hoten
 * @property integer $history_contact_phone
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
 */
class HistoryContact extends CActiveRecord
{
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
			array('history_id,history_contact_phone ', 'required'),
			array('contact_id, history_contact_phone, history_contact_status, history_id, content_number', 'numerical', 'integerOnly'=>true),
			array('history_contact_hoten', 'length', 'max'=>50),
			array('history_contact_address, history_contact_company, history_contact_notes', 'length', 'max'=>255),
			array('history_contact_email,history_contact_gender', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('history_contact_id, contact_id, history_contact_hoten, history_contact_phone, history_contact_birthday, history_contact_gender, history_contact_address, history_contact_email, history_contact_company, history_contact_notes, history_contact_status, history_contact_sms, history_id, history_content, content_number', 'safe', 'on'=>'search'),
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
			'history_contact_id' => 'History Contact',
			'contact_id' => 'Contact',
			'history_contact_hoten' => 'History Contact Hoten',
			'history_contact_phone' => 'History Contact Phone',
			'history_contact_birthday' => 'History Contact Birthday',
			'history_contact_gender' => 'History Contact Gender',
			'history_contact_address' => 'History Contact Address',
			'history_contact_email' => 'History Contact Email',
			'history_contact_company' => 'History Contact Company',
			'history_contact_notes' => 'History Contact Notes',
			'history_contact_status' => 'History Contact Status',
			'history_contact_sms' => 'History Contact Sms',
			'history_id' => 'History',
			'history_content' => 'History Content',
			'content_number' => 'Content Number',
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

		$criteria->compare('history_contact_id',$this->history_contact_id);
		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('history_contact_hoten',$this->history_contact_hoten,true);
		$criteria->compare('history_contact_phone',$this->history_contact_phone);
		$criteria->compare('history_contact_birthday',$this->history_contact_birthday,true);
		$criteria->compare('history_contact_gender',$this->history_contact_gender);
		$criteria->compare('history_contact_address',$this->history_contact_address,true);
		$criteria->compare('history_contact_email',$this->history_contact_email,true);
		$criteria->compare('history_contact_company',$this->history_contact_company,true);
		$criteria->compare('history_contact_notes',$this->history_contact_notes,true);
		$criteria->compare('history_contact_status',$this->history_contact_status);
		$criteria->compare('history_contact_sms',$this->history_contact_sms,true);
		$criteria->compare('history_id',$this->history_id);
		$criteria->compare('history_content',$this->history_content,true);
		$criteria->compare('content_number',$this->content_number);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
