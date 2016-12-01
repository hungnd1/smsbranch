<?php

/**
 * This is the model class for table "tb_pages".
 *
 * The followings are the available columns in table 'tb_pages':
 * @property integer $page_id
 * @property string $page_title
 * @property string $page_image
 * @property string $page_content
 * @property string $page_contenten
 * @property string $page_titleen
 * @property string $page_sublink
 * @property string $page_tag
 * @property string $page_createdate
 * @property integer $page_parent
 * @property integer $page_status
 * @property integer $page_order
 */
class Page extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_title, page_image, page_content, page_contenten, page_titleen, page_sublink, page_tag, page_createdate, page_parent, page_status, page_order', 'required'),
			array('page_parent, page_status, page_order', 'numerical', 'integerOnly'=>true),
			array('page_title, page_image, page_titleen, page_sublink, page_tag', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('page_id, page_title, page_image, page_content, page_contenten, page_titleen, page_sublink, page_tag, page_createdate, page_parent, page_status, page_order', 'safe', 'on'=>'search'),
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
			'page_id' => 'Page',
			'page_title' => 'Page Title',
			'page_image' => 'Page Image',
			'page_content' => 'Page Content',
			'page_contenten' => 'Page Contenten',
			'page_titleen' => 'Page Titleen',
			'page_sublink' => 'Page Sublink',
			'page_tag' => 'Page Tag',
			'page_createdate' => 'Page Createdate',
			'page_parent' => 'Page Parent',
			'page_status' => 'Page Status',
			'page_order' => 'Page Order',
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

		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('page_title',$this->page_title,true);
		$criteria->compare('page_image',$this->page_image,true);
		$criteria->compare('page_content',$this->page_content,true);
		$criteria->compare('page_contenten',$this->page_contenten,true);
		$criteria->compare('page_titleen',$this->page_titleen,true);
		$criteria->compare('page_sublink',$this->page_sublink,true);
		$criteria->compare('page_tag',$this->page_tag,true);
		$criteria->compare('page_createdate',$this->page_createdate,true);
		$criteria->compare('page_parent',$this->page_parent);
		$criteria->compare('page_status',$this->page_status);
		$criteria->compare('page_order',$this->page_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
