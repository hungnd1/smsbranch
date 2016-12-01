<?php

/**
 * This is the model class for table "tb_blocks".
 *
 * The followings are the available columns in table 'tb_blocks':
 * @property integer $block_id
 * @property string $block_logo
 * @property string $block_header
 * @property string $block_footer
 * @property string $block_footer_en
 * @property string $phone
 */
class Block extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_blocks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('block_logo', 'required'),
			array('block_logo', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('block_id, block_logo, block_header, block_footer, block_footer_en,phone', 'safe', 'on'=>'search'),
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
			'block_id' => 'Block',
			'block_logo' => 'Logo',
			'block_header' => 'Header',
			'block_footer' => 'Footer',
                        'block_footer_en' => 'Footer english',
                        'phone'=> 'Số điện thoại'
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

		$criteria->compare('block_id',$this->block_id);
		$criteria->compare('block_logo',$this->block_logo,true);
		$criteria->compare('block_header',$this->block_header,true);
		$criteria->compare('block_footer',$this->block_footer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function createBlock(){
            $find = Block::model()->find();
            if(!$find){
                $model=new Block;
                $model->block_id = "";
                $model->save();
            }
        }

        /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Block the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
