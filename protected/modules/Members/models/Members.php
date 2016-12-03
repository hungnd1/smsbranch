<?php

/**
 * This is the model class for table "pr_members".
 *
 * The followings are the available columns in table 'pr_members':
 * @property integer $pr_primary_key
 * @property integer $pr_roles_id
 * @property string $pr_member_email
 * @property string $pr_member_password
 * @property integer $pr_member_status
 * @property string $pr_member_rand_key
 * @property string $pr_member_data_register
 * @property integer $pr_member_active
 * @property string $pr_username
 * @property integer $pr_member_parent
 * @property integer $pr_pass Description
 * @property integer $number_sms
 * @property integer $is_fix
 */
class Members extends CActiveRecord
{
    const SALT="@blueProject@@123";
    const ADMIN = "ADMIN";
    const DAILY = "DAILY";
    const KHACHHANG_ADMIN = "KHACHHANG_ADMIN";
    const DAILYCAPDUOI = "DAILYCAPDUOI";
    const THANHVIEN_KHACHHANGADMIN = "THANHVIEN KHACHHANG ADMIN";
    const KHACHHANG_DAILY = "KHACHHANGDAILY";
    const KHACHHANGDAILY_CAPDUOI = "Khach hang dai ly cap duoi";
    const THANHVIEN_KHACHHANGDAILY = "Thanh vien khach hang dai ly";
    const THANHVIEN_KHACHHANGDAILYCAPDUOI = "Thanh vien khach hang dai ly cap duoi";
    const ACTIVE = "Hoạt động";
    const NOACTICE = "Bị khóa";

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pr_members';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pr_roles_id,pr_member_email, pr_member_password, pr_member_rand_key, pr_member_data_register, pr_member_active,pr_username', 'required'),
			array('pr_roles_id, pr_member_status, pr_member_active, pr_member_parent,number_sms,is_fix', 'numerical', 'integerOnly'=>true),
			array('pr_member_email, pr_member_password, pr_member_rand_key', 'length', 'max'=>255),
                        array('pr_username,pr_pass', 'length','min' => 4, 'max'=>50),
                        array('pr_member_email','email','message'=>'Email không hợp lệ'),
                        array('pr_member_email','unique','message'=>'Email đã tồn tại'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pr_primary_key, pr_member_parent, pr_roles_id, pr_member_email, pr_member_password, pr_member_status, pr_member_rand_key, pr_member_data_register, pr_member_active, pr_username,pr_pass', 'safe', 'on'=>'search'),
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
                    'memberProfile'=>array(self::HAS_ONE,'MemberProfile','pr_member_id'),
                    'role'=>array(self::BELONGS_TO,'Roles','pr_roles_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pr_primary_key' => 'Pr Primary Key',
			'pr_roles_id' => 'Quyền',
			'pr_member_email' => 'Email',
            'number_sms' => 'Số tin nhắn tối đa',
            'is_fix' => 'Cấu hình sửa điểm',
			'pr_member_password' => 'Mật khẩu',
			'pr_member_status' => 'Trạng thái',
			'pr_member_rand_key' => 'Pr Member Rand Key',
			'pr_member_data_register' => 'Pr Member Register',
			'pr_member_active' => 'Trạng thái',
                        'pr_username'=>'Tài khoản',
                        'pr_member_parent'=>'Người tạo',
                        'pr_pass'=>'Mật khẩu'
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
	public function search($page=20)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pr_primary_key',$this->pr_primary_key);
		$criteria->compare('pr_roles_id',$this->pr_roles_id);
		$criteria->compare('pr_member_email',$this->pr_member_email,true);
		$criteria->compare('pr_member_password',$this->pr_member_password,true);
		$criteria->compare('pr_member_status',$this->pr_member_status);
		$criteria->compare('pr_member_rand_key',$this->pr_member_rand_key,true);
		$criteria->compare('pr_member_data_register',$this->pr_member_data_register,true);
		$criteria->compare('pr_member_active',$this->pr_member_active);
                $criteria->compare('pr_username',$this->pr_username,true);
                $criteria->compare('pr_member_parent', $this->pr_member_parent);
                
                if(Members::model()->getRoleSystem()==Members::DAILY)
                    $criteria->compare('pr_member_parent', YII::app()->user->id);
                if(Members::model()->getRoleSystem()==Members::KHACHHANG_ADMIN)
                    $criteria->compare('pr_primary_key',-1);

	        if($page>0)
                {
                    return new CActiveDataProvider($this, array(
                            'criteria'=>$criteria,
                            'pagination'=>array(
                                    'pageSize'=>$page,
                            ),
                        'sort'=>array('defaultOrder'=>'pr_member_data_register desc')
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
	 * @return Members the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * Chuc nang: ma hoa string sang SHA256 de bao mat.
         * @param string $password
         * @return string passwors được mã hóa bằng sha256
         * @access public
        */
        public function generaSalt($password)
        {
            $context = hash_init("sha256", HASH_HMAC, self::SALT);
            hash_update($context, $password);
            return hash_final($context);
        }
        
        /*
         * Kiểm tra mật khẩu nhập vả và mật khẩu đăng ký
         * @param string $password 
         * @return bool; //Nhập đúng return true, nhập sai return false;
         * @access public
         */
        public function validatePassword($password)
        {
            if($this->generaSalt($password)==$this->pr_member_password)
                return true;
            return false;
        }
        
	public function save($runValidation=true, $attributes=NULL) {
		// create user account, check password
		if ($this->isNewRecord) {
			// eval password strength
			if (!$this->evalPasswordStrength($this->pr_member_password))
			{
				return false;
			}
			
			$this->pr_member_password = $this->generaSalt($this->pr_member_password);
                }
                return parent::save($runValidation, $attributes);
	}
        
        /*
         * Kiểm tra định dạng mật khẩu khi đăng nhập vào hệ thống
         * @param string @password
         * @return bool; //Nhập đúng định dạng return true, nhập sai định dạng return false
         * @access public
         */
	public function evalPasswordStrength($password)
	{
		if (strlen($password) < 8 || preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/',$password) <= 0)
                {
                    $this->addError('pr_member_password', "Mật khẩu ít nhất phải có 8 ký tự, và không được nhập các ký tự đặt biêt(&, *, $, [, ], etc, space)");
                    return false;
                }
		return true;
	}
        
        /*
         * Lấy danh sách thành viên theo định dạng mảng
         * @return array
         * @access public
         */
        public function getMembersArray($member_id_arr=false)
        {
            $criteria = "";
            if($member_id_arr)
            {
                $criteria = new CDbCriteria;
                $criteria->condition = 'pr_primary_key IN ('.$member_id_arr.')';
            }
                    
            $model = Members::model()->findAll($criteria);
            $memberArray = array();
            foreach ($model as $data) {
                if($data->pr_primary_key == Yii::app()->user->id)
                    $memberArray[$data->pr_primary_key] = 'Tôi';
                else
                    $memberArray[$data->pr_primary_key] = $data->memberProfile->pr_member_profile_display_name;
            }
            
            return $memberArray;
            
        }
        
        /*
         * Lấy 
         */
        public function getMembersIdArray()
        {
            $model = Members::model()->findAll();
            $memberArray = array();
            foreach ($model as $data) {
                if($data->pr_primary_key == Yii::app()->user->id)
                    $memberArray[$data->pr_primary_key] = 'You';
                else
                    $memberArray[$data->pr_primary_key] = $data->memberProfile->pr_member_profile_display_name;
            }
            
            return $memberArray;
            
        }
        
        /*
         * Chức năng: Kiểm tra xem user hiện tại có phải là Manager của hệ thống không
         * @return boolean
         */
        public function getManagerSystem()
        {
            $member_id = YII::app()->user->id; 
            // Kiem tra co phai mamager cua he thong khong
            $model = Members::model()->findByPk($member_id);
            if(count($model)==1)
            {
                if($model->pr_roles_id==1)
                {
                    return true;
                }
            }
            return false;
        }
        
        /**
         * Chức năng: Kiểm tra xem user hiện tại có phải làm manager cua Project không
         * @param int $project_id
         * @return boolean
         */
        public function getManagerProject($project_id)
        {
            if($project_id>0)
            {
                $member_id = YII::app()->user->id;
                $project = PrProjects::model()->findByPk($project_id);
                if($project->pr_project_manager_id == $member_id)
                    return true;
            }else
                return false;
        }
        
        /**
         * Lấy id manager dự án
         * @param int $project_id
         * @return boolean
         */
        public function getIDManagerProject($project_id)
        {
            if($project_id>0)
            {
                $project = PrProjects::model()->findByPk($project_id);
                return $project->pr_project_manager_id;
            }
            return 0;
        }
        
        /**
         * Kiểm tra thành viên có trong dự án ko?
         * @param type $member_id
         * @return boolean
         */
        public function getMemberInProject($member_id)
        {
            $criteria = PrProjects::model()->getRolesByProject(false,$member_id);
            $model = PrProjects::model()->findAll($criteria);
            if(count($model)>0)
                return true;
            return false;
        }
        
        /*
         * Chức năng: Lấy quyền của người đăng nhập hiện tại
         * @return boolean
         */
        public function getRoleSystem($member_id=false)
        {
            if(!$member_id)
                $member_id = YII::app()->user->id; 
            // Kiem tra co phai mamager cua he thong khong
            $model = Members::model()->findByPk($member_id);
            if(count($model)==1)
            {
                if($model->pr_roles_id==1)
                {
                    return self::ADMIN;
                }
                elseif($model->pr_roles_id==2)
                {
                    return self::DAILY;
                }else if($model->pr_roles_id == 3){
                    return self::KHACHHANG_ADMIN;
                } elseif($model->pr_roles_id==4){
                    return self::DAILYCAPDUOI;
                }elseif($model->pr_roles_id==5){
                    return self::THANHVIEN_KHACHHANGADMIN;
                }elseif($model->pr_roles_id==6){
                    return self::KHACHHANG_DAILY;
                }elseif($model->pr_roles_id==7){
                    return self::KHACHHANGDAILY_CAPDUOI;
                }elseif($model->pr_roles_id==8){
                    return self::THANHVIEN_KHACHHANGDAILY;
                }elseif($model->pr_roles_id==9){
                    return self::THANHVIEN_KHACHHANGDAILYCAPDUOI;
                }

            }
            return false;
        }
        
        public function getMemberArray($member_id=false,$roles_id=false)
        {
            $model = $this->search(0);
            $customer_arr = array();
            $criteria=new CDbCriteria;
            if($member_id)
                $criteria->compare ('pr_primary_key', $member_id);
            if($roles_id)
                $criteria->compare ('pr_roles_id', $roles_id);
            if(Members::model()->getRoleSystem(YII::app()->user->id!=Members::ADMIN))
                $customer_arr[YII::app()->user->id] = 'Tôi';
            foreach ($model->data as $item) {
                if($item->pr_primary_key == YII::app()->user->id){
                    $customer_arr[$item->pr_primary_key] = 'Tôi';
                }
                else
                    $customer_arr[$item->pr_primary_key] = $item->pr_username.' - '.$item->role->pr_roles_name;
            }
            return $customer_arr;
        }
}
