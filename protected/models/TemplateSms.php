<?php

/**
 * This is the model class for table "template_sms".
 *
 * The followings are the available columns in table 'template_sms':
 * @property integer $template_id
 * @property string $template_content
 * @property string $template_date
 * @property integer $template_createby
 * @property string $name $template_name
 */
class TemplateSms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'template_sms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('template_content,template_name', 'required'),
			array('template_createby', 'numerical', 'integerOnly'=>true),
                        array('template_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('template_id, template_content, template_date, template_createby, template_name', 'safe', 'on'=>'search'),
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
			'template_id' => 'Template',
                        'template_name'=>'Tên',
			'template_content' => 'Nội dung',
			'template_date' => 'Ngày tạo',
			'template_createby' => 'Người tạo',
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
                    $createby_id = YII::app ()->user->id;

		$criteria=new CDbCriteria;

		$criteria->compare('template_id',$this->template_id);
		$criteria->compare('template_content',$this->template_content,true);
		$criteria->compare('template_date',$this->template_date,true);
		$criteria->compare('template_name',$this->template_name,TRUE);
                $criteria->compare('template_createby',$createby_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TemplateSms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
