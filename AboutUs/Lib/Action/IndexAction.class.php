<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$visitCount=0;
    	$settingM=M('setting');
    	$condition['name']=array('eq','visit_count');
    	$res=$settingM->where($condition)->find();
    	if (is_null($res))
    	{
    		$visitCount=0;
    		$settingM->name='visit_count';
    		$settingM->value=$visitCount;
    		$settingM->add();
    	}
    	else
    	{
    		$visitCount=$settingM->value+1;
    		$settingM->value=$visitCount;
    		$settingM->save();
    	}
    	$this->assign('count',$visitCount);
    	$this->display();
    }
}