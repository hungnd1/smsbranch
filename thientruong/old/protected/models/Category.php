<?php

/**
 * This is the model class for table "tb_categorypost".
 *
 * The followings are the available columns in table 'tb_categorypost':
 * @property integer $cate_id
 * @property string $cate_title
 * @property string $cate_summany
 * @property string $cate_sublink
 * @property integer $cate_parent
 * @property integer $cate_order
 * @property string $cate_image
 * @property integer $cate_status
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_categorypost';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cate_title, cate_summany, cate_sublink, cate_parent, cate_order, cate_image, cate_status', 'required'),
			array('cate_parent, cate_order, cate_status', 'numerical', 'integerOnly'=>true),
			array('cate_title, cate_sublink, cate_image', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cate_id, cate_title, cate_summany, cate_sublink, cate_parent, cate_order, cate_image, cate_status', 'safe', 'on'=>'search'),
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
			'cate_id' => 'Cate',
			'cate_title' => 'Cate Title',
			'cate_summany' => 'Cate Summany',
			'cate_sublink' => 'Cate Sublink',
			'cate_parent' => 'Cate Parent',
			'cate_order' => 'Cate Order',
			'cate_image' => 'Cate Image',
			'cate_status' => 'Cate Status',
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

		$criteria->compare('cate_id',$this->cate_id);
		$criteria->compare('cate_title',$this->cate_title,true);
		$criteria->compare('cate_summany',$this->cate_summany,true);
		$criteria->compare('cate_sublink',$this->cate_sublink,true);
		$criteria->compare('cate_parent',$this->cate_parent);
		$criteria->compare('cate_order',$this->cate_order);
		$criteria->compare('cate_image',$this->cate_image,true);
		$criteria->compare('cate_status',$this->cate_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
