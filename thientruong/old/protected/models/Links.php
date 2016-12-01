<?php

/**
 * This is the model class for table "tb_links".
 *
 * The followings are the available columns in table 'tb_links':
 * @property integer $link_id
 * @property string $link_url
 * @property string $link_description
 * @property string $link_date
 * @property integer $link_status
 * @property integer $linxk_order
 * @property string $link_image
 */
class Links extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_links';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('link_url, link_description, link_date, link_status, linxk_order', 'required'),
			array('link_status, linxk_order', 'numerical', 'integerOnly'=>true),
			array('link_url,link_image', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('link_id, link_url, link_description, link_date, link_status, linxk_order,link_image', 'safe', 'on'=>'search'),
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
			'link_id' => YII::t("lang","ID"),
			'link_url' => YII::t("lang","Đường dẫn"),
			'link_description' => YII::t("lang","Mô tả"),
			'link_date' => YII::t("lang","Ngày tạo"),
			'link_status' => YII::t("lang","Trạng thái"),
			'linxk_order' => YII::t("lang","Thứ tự"),
                        'link_image' =>YII::t('lang','Ảnh đại diện')
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

		$criteria->compare('link_id',$this->link_id);
		$criteria->compare('link_url',$this->link_url,true);
		$criteria->compare('link_description',$this->link_description,true);
		$criteria->compare('link_date',$this->link_date,true);
		$criteria->compare('link_status',$this->link_status);
		$criteria->compare('linxk_order',$this->linxk_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Links the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
