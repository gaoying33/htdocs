<?php
// 本类由系统自动生成，仅供测试用途

class UserAction extends Action
{
	
	/*
	@name 用户注册接口
	@description 实现用户注册的功能
	@param String username 用户名，不能和已有用户名重复
	@param String password 用户密码
	@returns String 若成功则为"done",若失败则为"fail",若出现用户名重复则为"exist"
	*/

	public function register()
	{
		sleep(1);
		$username  = $_POST['username'];
		$password  = $_POST['password'];
        
        $userM = M('user');
        $res = $userM->where(array('username' => $username))->find();

        if ($res!=null) 
        {
        	echo 'exist';
        	exit;
        }
        $userM->username = $username;
        $userM->password = $password;
        $res = $userM->add();

        if ($res>0&&$res!=null) 
        {
        	echo 'done';
        }
        else
        	echo 'fail';

	}

    /*
	@name 用户登录接口
	@description 实现用户登录的功能
	@param String username 用户名
	@param String password 用户密码
	@returns String 若成功则为"right",若密码错误则为"wrong",若用户不存在则为"none"
	*/
	public function login()
	{
		sleep(1);
		$username  = $_POST['username'];
		$password  = $_POST['password'];

		$userM=M('user');
		$res=$userM->where(array('username'=>$username))->find();
		if ($res==null)
		{
			echo 'none';
			exit;
		}
		if ($password==$res['password']) echo 'right';
		else echo 'wrong';
	}

}