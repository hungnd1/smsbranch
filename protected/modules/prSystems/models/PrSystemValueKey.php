<?php

/**
 * This is the model class for table "pr_system_value_key".
 *
 * The followings are the available columns in table 'pr_system_value_key':
 * @property integer $pr_primary_key
 * @property string $pr_system_title
 * @property string $pr_system_value_key
 */
class PrSystemValueKey extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pr_system_value_key';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('pr_primary_key', 'required'),
			array('pr_system_title', 'length', 'max'=>100),
			array('pr_system_value_key', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pr_primary_key, pr_system_title, pr_system_value_key', 'safe', 'on'=>'search'),
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
			'pr_primary_key' => 'Primary Key',
			'pr_system_title' => 'Title',
			'pr_system_value_key' => 'Value Key',
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

		$criteria->compare('pr_primary_key',$this->pr_primary_key);
		$criteria->compare('pr_system_title',$this->pr_system_title,true);
		$criteria->compare('pr_system_value_key',$this->pr_system_value_key,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PrSystemValueKey the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function loadModel($id) {
            $criteria=new CDbCriteria;
            $criteria->compare('pr_primary_key',$id);
            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
        }
        
        public function getSysVal($title)
        {
            $criteria = new CDbCriteria();
            $criteria->condition = 'pr_system_title = "'.$title.'"';
            
            $rows = PrSystemValueKey::model()->find($criteria);
            
            $temp = explode("\n", $rows->pr_system_value_key);
            $arr = array(); 
            foreach ($temp as $item) {
                $temp1 = explode("|", $item);
                $arr[$temp1[0]] = trim(((isset($temp1[1])) ? $temp1[1] : $temp1[0]));
            }
            return $arr;
        }
        
        //cac dau 3 so
        public function getPhone3Number($title,$number)
        {
            $allNumber=  $this->getSysVal($title);
            $phone3="";
           
            foreach ($allNumber as $data)
            {
                if(strlen($data) == 4 && $number==4)
                    $phone3 .=$data.',';
                if(strlen($data) == 5 && $number==5)
                    $phone3 .=$data.',';
            }
            $phone3 = rtrim($phone3, ',');
            
            return $phone3;
        }
        
        //tat ca nha mang
        public function getPhoneOther($number)
        {
            //viettel
            if($number ==4)
            {
                $phone = $this->getPhone3Number('vietel', 4).',';
                $phone .=$this->getPhone3Number('mobiFone', 4).',';
                $phone .=$this->getPhone3Number('vinaFone', 4).',';
                $phone .=$this->getPhone3Number('Vietnamobile', 4).',';
                $phone .=$this->getPhone3Number('Gmobile', 4);
                
            }
            if($number ==5)
            {
                $phone = $this->getPhone3Number('vietel', 5).',';
                $phone .=$this->getPhone3Number('mobiFone', 5).',';
                $phone .=$this->getPhone3Number('vinaFone',5).',';
                $phone .=$this->getPhone3Number('Vietnamobile', 5).',';
                $phone .=$this->getPhone3Number('Gmobile', 5);
                
            }
            $phone = rtrim($phone, ',');
            return $phone;
        }
        
}
