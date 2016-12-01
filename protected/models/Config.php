<?php

/**
 * This is the model class for table "config".
 *
 * The followings are the available columns in table 'config':
 * @property integer $config_id
 * @property string $config_name
 * @property string $config_slogan
 * @property string $config_copyright
 * @property string $domain
 */
class Config extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('config_name, config_slogan, config_copyright', 'required'),
//			array('config_name, config_copyright', 'length', 'max'=>100),
			array('logo', 'length', 'max'=>255),
			array('domain', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('config_id, config_name, config_slogan, config_copyright,domain,logo', 'safe', 'on'=>'search'),
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
			'config_id' => 'Config',
			'config_name' => 'Tên hệ thống',
			'config_slogan' => 'Khẩu hiệu hệ thống',
			'config_copyright' => 'Bản quyền',
                        'domain'=>'Tên miền',
                        'logo'=>'Logo'
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

		$criteria->compare('config_id',$this->config_id);
		$criteria->compare('config_name',$this->config_name,true);
		$criteria->compare('config_slogan',$this->config_slogan,true);
		$criteria->compare('config_copyright',$this->config_copyright,true);
                $criteria->compare('domain', $this->domain,true);
                $criteria->compare('logo', $this->logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Config the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function addConfig($domain_name){
            $config = new Config();
            $config->config_name = "SMS BRANDNAME";
            $config->config_slogan = "Hệ Thống Gửi Tin";
            $config->config_copyright = "Giải pháp công nghệ mới";
            $config->domain = $domain_name;
            if($config->insert())
                YII::app()->request->redirect(YII::app()->createUrl("/prSystems"));
        }
        
       public function getLogo($domain='tananh'){
           $config = Config::model()->find('domain="'.$domain.'"');
           
           $images_url = Yii::app()->getBaseUrl().$config->logo;
           if(file_exists(Yii::getPathOfAlias('webroot').$config->logo))
               return $images_url;
           return Yii::app()->getBaseUrl().'/images/logo.png';
       }
}
