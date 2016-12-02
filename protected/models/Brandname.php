<?php

/**
 * This is the model class for table "brandname".
 *
 * The followings are the available columns in table 'brandname':
 * @property integer $brand_id
 * @property string $brandname
 * @property string $brand_createdate
 * @property integer $brand_status
 * @property string $brand_expires
 * @property integer $brand_createby
 * @property integer $brand_member
 * @property string $brand_username
 * @property string $brand_password
 * @property integer $brand_balance Description
 */
class Brandname extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $sotin ;
	public $dongia;

	public function tableName()
	{
		return 'brandname';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brandname,sotin,dongia, brand_createdate, brand_status, brand_expires, brand_createby, brand_member, brand_username, brand_password', 'required'),
			array('brand_status, brand_createby, brand_member,sotin,dongia', 'numerical', 'integerOnly'=>true),
			array('brandname', 'length', 'max'=>20),
                        array('brand_username', 'length', 'max'=>50),
                        array('brand_password', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('brand_id, brandname,brand_balance, brand_createdate, brand_username, brand_password, brand_status, brand_expires, brand_createby, brand_member', 'safe', 'on'=>'search'),
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
			'brand_id' => 'Brand',
			'brandname' => 'Brandname',
			'brand_createdate' => 'Brand Createdate',
			'brand_status' => 'Trạng thái',
			'brand_expires' => 'Ngày hết hạn',
			'brand_createby' => 'Brand Createby',
			'sotin' => 'Số tin',
			'dongia' => 'Đơn giá',
			'brand_member' => 'Chủ sở hữu',
                        'brand_username'=>'Tài khoản',
                        'brand_password'=>'Mật khẩu',
                        'brand_balance'=>'Số dư'
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

		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('brandname',$this->brandname,true);
		$criteria->compare('brand_createdate',$this->brand_createdate,true);
		$criteria->compare('brand_status',$this->brand_status);
		$criteria->compare('brand_expires',$this->brand_expires,true);
		$criteria->compare('brand_createby',$this->brand_createby);
		$criteria->compare('brand_member',$this->brand_member);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'brand_createdate desc',
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Brandname the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getBrandname($member_id=false){
		$criteria=new CDbCriteria;
		$criteria->compare('brand_member',$member_id);

		$dataProvider = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
                
                $data = array();
                foreach ($dataProvider->data as $item) {
                    $data[$item->brand_id]=$item->brandname;
                }
                return $data;
        }
}
