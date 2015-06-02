<?php
class CarModel extends RelationModel{
	protected $_link=array(
			'scope'=>array(
					'mapping_type'=>HAS_MANY,
					'class_name'=>'scope',
					'mapping_name'=>'scope',
					'foreign_key'=>'s_cid',
			),
	);
}
