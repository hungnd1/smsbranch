<?php

/**
 * This is the model class for table "tb_contacts".
 *
 * The followings are the available columns in table 'tb_contacts':
 * @property integer $contact_id
 * @property string $contact_title
 * @property string $contact_phone
 * @property string $contact_content
 * @property string $contact_email
 * @property string $contact_address
 * @property string $contact_date
 * @property integer $contact_order
 * @property integer $contact_status
 */
class Contacts extends CActiveRecord
{
    public $verifyCode;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_contacts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contact_title, contact_content, contact_email, contact_address, contact_date, contact_status', 'required'),
			array('contact_order, contact_status', 'numerical', 'integerOnly'=>true),
			array('contact_title, contact_email, contact_address', 'length', 'max'=>255),
			array('contact_phone', 'length', 'max'=>20),
                        array('contact_email', 'email'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('contact_id, contact_title, contact_phone, contact_content, contact_email, contact_address, contact_date, contact_order, contact_status', 'safe', 'on'=>'search'),
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
			'contact_id' => 'Contact',
			'contact_title' => 'Title',
			'contact_phone' => 'Phone',
			'contact_content' => 'Content',
			'contact_email' => 'Email',
			'contact_address' => 'Address',
			'contact_date' => 'Date',
			'contact_order' => 'Order',
			'contact_status' => 'Status',
                    'verifyCode'=>'Code',
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

		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('contact_title',$this->contact_title,true);
		$criteria->compare('contact_phone',$this->contact_phone,true);
		$criteria->compare('contact_content',$this->contact_content,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('contact_address',$this->contact_address,true);
		$criteria->compare('contact_date',$this->contact_date,true);
		$criteria->compare('contact_order',$this->contact_order);
		$criteria->compare('contact_status',$this->contact_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contacts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
}
