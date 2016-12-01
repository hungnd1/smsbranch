<?php

/**
 * This is the model class for table "contact_categorie".
 *
 * The followings are the available columns in table 'contact_categorie':
 * @property integer $category_id
 * @property string $category_name
 * @property integer $category_createby
 * @property integer $category_status
 */
class ContactCategorie extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contact_categorie';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_name', 'required'),
			array('category_createby, category_status', 'numerical', 'integerOnly'=>true),
			array('category_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('category_id, category_name, category_createby, category_status', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category',
			'category_name' => 'Tên danh bạ',
			'category_createby' => 'Người tạo',
			'category_status' => 'Trạng thái',
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
	public function search($createby_id=false,$page=10)
	{
                if(!$createby_id)
                    $createby_id = YII::app()->user->id;
                if($this->category_createby)
                    $createby_id = $this->category_createby;
            
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('category_status',$this->category_status);
                $criteria->compare('category_createby',$createby_id);
//                elseif($role=='agent')
//                    $criteria->condition='category_createby IN ('.Members::model()->getAgent().')';
//                elseif($role=='customer')
//                    $criteria->condition='category_createby IN ('.Members::model()->getCu().')';

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
	 * @return ContactCategorie the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
