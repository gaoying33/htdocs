<?php
     class EmployeeAction extends Action
     {

        public function editPassword()
        {

            sleep(1);
            $employeeM=M('Employee');
            $id=$_SESSION['userid'];
            $oldpass=$_POST['oldpass'];// md5($str);
            $res=$employeeM->where(array('e_id'=>$id))->find();
            if($oldpass!=$res['e_password'])
            {
                echo 'wrong';
                exit;
            }
            $data = array(
                              'e_id' => $id,
                              'e_password' => $_POST['newpass'],
                             );
                
           M('Employee')->save($data);
            echo 'done';
        }

        public function editBasicInfo()
        {
            $id=$_POST['empId'];
            if($id=="")
              $id=$_SESSION['userid'];
            $realname=$_POST['realname'];  
            $phone=$_POST['phone'];  
            $sex=$_POST['sex'];  
             
            $data = array(
                              'e_id' => $id,
                              'e_name' => $realname,
                              'e_phone' => $phone,
                              'e_sex' =>$sex,
                             );
                
            M('Employee')->save($data);
            echo 'done';
          //  echo $id;
        }
        /*
        @name 删除员工功能
        @description 实现删除员工的功能
        @param String empId 员工
        @param String password  登陆密码
        @returns String     若成功则为"done",若失败则为"fail",若出现用户名重复则为"exist"
        */
        public function deleteAnEmp()
        {
             $id=$_POST['empId'];
             $emp = M('Employee');
             $emp->find($id);
             $emp->delete(); 
        }

        /*
        @name 添加员工功能
        @description 实现添加可操作员工的功能
        @param String loginName 登陆名，不能和已有登陆名重复
        @param String password  登陆密码
        @returns String     若成功则为"done",若失败则为"fail",若出现用户名重复则为"exist"
        */
        public function add()
        {
            sleep(1);
            $loginName=$_POST['username'];
            $employeeM=M('Employee');
            $res=$employeeM->where(array('e_loginname'=>$loginName))->find();

            if ($res!=null)
            {
                echo 'exist';
                exit;
            }
            $password=$_POST['password'];// md5($str);
            $realname=$_POST['realname'];  
            $phone=$_POST['phone'];  
            $sex=$_POST['sex'];  

          
            $employeeM->e_loginname=$loginName;
            $employeeM->e_password=$password;
            $employeeM->e_name=$realname;
            $employeeM->e_sex=$sex;
            $employeeM->e_phone=$phone;
            $employeeM->e_logintime=date("Y-m-d H:i:s");
            $employeeM->e_loginip= get_client_ip();
            $res=$employeeM->add();

            if ($res>0 && $res!=null) echo 'done';
            else echo 'fail';
        }

        /*
        @name 员工登录接口
        @description 实现员工登录的功能
        @param String loginName 登陆名
        @param String password  密码
        @returns String 若成功则为"right",若密码错误则为"wrong",若用户不存在则为"none"
        */
        public function login()
        {
            sleep(1);
            $loginName=$_POST['loginName'];
            $password=$_POST['password'];

            $employeeM=M('Employee');
            $res=$employeeM->where(array('e_loginname'=>$loginName))->find();

            if ($res==null)
            {
                echo 'none';
                exit;
            }

            if($res['e_lock'])
            {
                echo "locked";
                exit;
            }

            if ($password==$res['e_password'])       
            {  
               $data = array(
                              'e_id' => $res['e_id'],
                              'e_logintime' => date("Y-m-d H:i:s"),
                              'e_loginip' => get_client_ip(),
                             );
                
                M('Employee')->save($data);

                session('userid', $res['e_id']);
                session('username', $loginName);
                session('lastlogintime', $res['e_logintime']);
                echo 'right';
            }
            else echo 'wrong';
        }


        public function getAllEmployees()
        {
            
          $page=$_POST['nowPage'];
          $pageRows=$_POST['pageRow'];
          $firstRow=($page-1)*$pageRows;
          $employeeM=M('employee');
          $totalCount= $employeeM->count();

          if($totalCount==0)
          { 
             echo "null";
             exit();
          }
          $emps=$employeeM->limit($firstRow.','.$pageRows)->select();
          $arrayList = array('totalCount' => $totalCount,
                             'emps'=>$emps);
          
          echo json_encode($arrayList);
           


        }



        public function lockAnEmp()
        {
             $id=$_POST['empId'];
             $lock=$_POST['lock'];
             $emp = M('Employee');
             $data = array(
                              'e_id' => $id,
                              'e_lock' =>$lock,
                             
                             );
             M('Employee')->save($data);

        }

       public function getEmployee()
       {
          $employeeM = M('Employee');
          $id=$_POST['empId'];
           if($id=="")
              $id=$_SESSION['userid'];
          $employee = $employeeM->where('e_id='.$id)->field('e_id,e_name,e_loginname,e_sex,e_phone')->find();
          echo json_encode($employee);
        }

        public function saveEditEmp(){
          $employeeM = M('Employee');
          $employee['e_id'] = $_POST['id'];
          $employee['e_password'] = $_POST['password'];
          $employee['e_name'] = $_POST['name'];
          $result = $employeeM->save($employee);
          echo $result;
        }


     
     }
?>