<?php

/**
 * This is the model class for table "history_contact_schedule".
 *
 * The followings are the available columns in table 'history_contact_schedule':
 * @property integer $history_contact_schedule_id
 * @property integer $history_id
 * @property integer $contact_id
 * @property string $history_contact_ho
 * @property string $history_contact_ten
 * @property string $history_contact_phone
 * @property string $history_contact_birthday
 * @property integer $history_contact_gender
 * @property string $history_contact_address
 * @property string $history_contact_email
 * @property string $history_contact_company
 * @property integer $content_number
 * @property integer $history_createby
 * @property string $history_content
 * @property string $history_contact_notes
 * @property string $history_contact_createdate
 */
class HistoryContactSchedule extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'history_contact_schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('history_id, contact_id', 'required'),
			array('history_id, contact_id, history_contact_gender, content_number, history_createby', 'numerical', 'integerOnly'=>true),
			array('history_contact_ho, history_contact_ten', 'length', 'max'=>50),
			array('history_contact_phone', 'length', 'max'=>15),
			array('history_contact_address, history_contact_company', 'length', 'max'=>255),
			array('history_contact_email', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('history_contact_schedule_id, history_id, contact_id, history_contact_ho, history_contact_ten, history_contact_phone, history_contact_birthday, history_contact_gender, history_contact_address, history_contact_email, history_contact_company, content_number, history_createby, history_content, history_contact_notes, history_contact_createdate', 'safe', 'on'=>'search'),
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
			'history_contact_schedule_id' => 'History Contact Schedule',
			'history_id' => 'History',
			'contact_id' => 'Contact',
			'history_contact_ho' => 'History Contact Ho',
			'history_contact_ten' => 'History Contact Ten',
			'history_contact_phone' => 'History Contact Phone',
			'history_contact_birthday' => 'History Contact Birthday',
			'history_contact_gender' => 'History Contact Gender',
			'history_contact_address' => 'History Contact Address',
			'history_contact_email' => 'History Contact Email',
			'history_contact_company' => 'History Contact Company',
			'content_number' => 'Content Number',
			'history_createby' => 'History Createby',
			'history_content' => 'History Content',
			'history_contact_notes' => 'History Contact Notes',
			'history_contact_createdate' => 'History Contact Createdate',
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

		$criteria=new CDbCriteria;

		$criteria->compare('history_contact_schedule_id',$this->history_contact_schedule_id);
		$criteria->compare('history_id',$this->history_id);
		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('history_contact_ho',$this->history_contact_ho,true);
		$criteria->compare('history_contact_ten',$this->history_contact_ten,true);
		$criteria->compare('history_contact_phone',$this->history_contact_phone,true);
		$criteria->compare('history_contact_birthday',$this->history_contact_birthday,true);
		$criteria->compare('history_contact_gender',$this->history_contact_gender);
		$criteria->compare('history_contact_address',$this->history_contact_address,true);
		$criteria->compare('history_contact_email',$this->history_contact_email,true);
		$criteria->compare('history_contact_company',$this->history_contact_company,true);
		$criteria->compare('content_number',$this->content_number);
                if($createby_id!=-1)
                    $criteria->compare('history_createby', $createby_id);
		$criteria->compare('history_content',$this->history_content,true);
		$criteria->compare('history_contact_notes',$this->history_contact_notes,true);
		$criteria->compare('history_contact_createdate',$this->history_contact_createdate,true);

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
	 * @return HistoryContactSchedule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
