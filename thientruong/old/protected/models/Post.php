<?php

/**
 * This is the model class for table "tb_post".
 *
 * The followings are the available columns in table 'tb_post':
 * @property integer $post_id
 * @property string $post_cateidarr
 * @property string $post_title
 * @property string $post_titleen
 * @property string $post_summary
 * @property string $post_summaryen
 * @property string $post_content
 * @property string $post_contenten
 * @property string $post_image
 * @property string $post_createdate
 * @property integer $post_memberid
 * @property string $post_sublink
 * @property integer $post_typical
 * @property integer $post_status
 * @property integer $post_order
 */
class Post extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_cateidarr, post_title, post_titleen, post_summary, post_summaryen, post_content, post_contenten, post_image, post_createdate, post_memberid, post_sublink, post_typical, post_status, post_order', 'required'),
			array('post_memberid, post_typical, post_status, post_order', 'numerical', 'integerOnly'=>true),
			array('post_cateidarr', 'length', 'max'=>100),
			array('post_title, post_titleen, post_image, post_sublink', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('post_id, post_cateidarr, post_title, post_titleen, post_summary, post_summaryen, post_content, post_contenten, post_image, post_createdate, post_memberid, post_sublink, post_typical, post_status, post_order', 'safe', 'on'=>'search'),
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
			'post_id' => 'Post',
			'post_cateidarr' => 'Post Cateidarr',
			'post_title' => 'Post Title',
			'post_titleen' => 'Post Titleen',
			'post_summary' => 'Post Summary',
			'post_summaryen' => 'Post Summaryen',
			'post_content' => 'Post Content',
			'post_contenten' => 'Post Contenten',
			'post_image' => 'Post Image',
			'post_createdate' => 'Post Createdate',
			'post_memberid' => 'Post Memberid',
			'post_sublink' => 'Post Sublink',
			'post_typical' => 'Post Typical',
			'post_status' => 'Post Status',
			'post_order' => 'Post Order',
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

		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('post_cateidarr',$this->post_cateidarr,true);
		$criteria->compare('post_title',$this->post_title,true);
		$criteria->compare('post_titleen',$this->post_titleen,true);
		$criteria->compare('post_summary',$this->post_summary,true);
		$criteria->compare('post_summaryen',$this->post_summaryen,true);
		$criteria->compare('post_content',$this->post_content,true);
		$criteria->compare('post_contenten',$this->post_contenten,true);
		$criteria->compare('post_image',$this->post_image,true);
		$criteria->compare('post_createdate',$this->post_createdate,true);
		$criteria->compare('post_memberid',$this->post_memberid);
		$criteria->compare('post_sublink',$this->post_sublink,true);
		$criteria->compare('post_typical',$this->post_typical);
		$criteria->compare('post_status',$this->post_status);
		$criteria->compare('post_order',$this->post_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getPost($cate_id=false,$page=10){
                $criteria=new CDbCriteria;
                $criteria->compare('post_status',1);
                if($cate_id)
                    $criteria->compare('post_cateidarr',$cate_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array(
                            'pageSize'=>$page,
                        ),
		));
        }
}
