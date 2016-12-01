<?php

/**
 * This is the model class for table "tb_menu".
 *
 * The followings are the available columns in table 'tb_menu':
 * @property integer $menu_id
 * @property integer $entity_id
 * @property string $entity_type
 * @property integer $position
 * @property integer $status
 * @property integer $menu_order
 * @property integer $parent_id
 */
class Menu extends CActiveRecord
{
        public static $position = array('1'=>'Menu top','2'=>'Menu left');
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('entity_id, entity_type, position, status', 'required'),
			array('entity_id, position, status, menu_order, parent_id', 'numerical', 'integerOnly'=>true),
			array('entity_type', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('menu_id, entity_id, entity_type, position, status, menu_order, parent_id', 'safe', 'on'=>'search'),
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
			'menu_id' => 'ID',
			'entity_id' => 'Tên menu',
			'entity_type' => 'Liên kết đến',
			'position' => 'Vị trị',
			'status' => 'Trạng thái',
                        'menu_order' =>  'Số thứ tự',
                        'parent_id'=>'Menu cha'
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

		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('entity_id',$this->entity_id);
		$criteria->compare('entity_type',$this->entity_type,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('status',$this->status);
                $criteria->compare('parent_id',$this->parent_id);
                $criteria->order = 'menu_order ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
    /**
     * MENU đệ quy lấy theo select
     * @param type $menus
     * @param type $parrent
     */
    public function menuSelectPage($parrent = 0,$space="",$selected_id="") 
    {
        $pages=$this->model()->findAll();
        $select='<select id="Menu_parent_id" name="Menu[parent_id]">';
            $select.='<option value="0">Select parrent</option>' ;
            $select.=$this->SelectOptions($pages,$parrent,$space,$selected_id);
        $select.='</select>';
        return $select;
    }
    
    public function SelectOptions($array,$parrent = 0,$space="",$selected_id="") 
    {
        $option="";$selected="";
        foreach ($array as $item) 
        {
            if ($item->parent_id == $parrent) 
            {
                if($item->entity_type=='Page')
                    $name = Pages::model ()->findByPk($item->entity_id)->page_title;
                else if($item->entity_type=='Category')
                    $name = Categoriesp::model ()->findByPk($item->entity_id)->cate_title;
                
                if($selected_id == $item->menu_id)
                    $selected = "selected";
                $menu=$this->model()->findAll('parent_id='.intval($item->menu_id));
                $option.='<option value="'.$item->menu_id.'" '.$selected.'>';
                    $option.=$space.$name;
                $option.='</option>';
                $option.=$this->SelectOptions($menu, $item->menu_id,$space.'--',$selected_id);
            }
            
        }
        return $option;
    }
    
    public function getPageByParentId($parent_id){
        $criteria= new CDbCriteria();
        $criteria->compare('parent_id', $parent_id);
        $criteria->order = 'menu_order ASC';
        $dateProvider= new CActiveDataProvider($this,array(
            'criteria'=>$criteria,
        ));
        return $dateProvider;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
