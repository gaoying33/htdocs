<?php
     class MainAction extends Action
     {

     	public function _initialize()
	   {
		   if(!isset($_SESSION['username']) || !isset($_SESSION['userid']))
		    	$this->redirect('Index/index');
	    }
        public function main()
          {
          	 $this->display();
          }  
     }
?>