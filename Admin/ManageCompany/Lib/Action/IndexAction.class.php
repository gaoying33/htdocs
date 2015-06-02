<?php
class IndexAction extends Action
{
	
	public function index()
	{
		$this->display();
	}
	public function loginOut()
	{
		session_unset();
		session_destroy();
		$this->redirect('Index/index');
		
	}

}