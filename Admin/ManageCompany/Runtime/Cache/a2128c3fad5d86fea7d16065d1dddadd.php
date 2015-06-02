<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/Plugin/ui/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Plugin/ui/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/Plugin/ui/css/fullcalendar.css" />
<link rel="stylesheet" href="/Plugin/ui/css/uniform.css" />
<link rel="stylesheet" href="/Plugin/ui/css/matrix-style.css" />
<link rel="stylesheet" href="/Plugin/ui/css/matrix-media.css" />
<link rel="stylesheet" href="/Plugin/dropzone/css/basic.css" />
<link rel="stylesheet" href="/Plugin/dropzone/css/dropzone.css" />
<link href="/Plugin/ui/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="/Plugin/ui/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<!--引入图标资源-->
<link rel="stylesheet" type="text/css" href="/Plugin/icomoon/style.css">

<script src="/Plugin/ui/js/jquery.min.js"></script> 
<script src="/Plugin/ui/js/jquery.ui.custom.js"></script> 
<script src="/Plugin/ui/js/bootstrap.js"></script>
<script src="/Plugin/ui/js/jquery.dataTables.min.js"></script>
<script src="/Plugin/ui/js/jquery.validate.js"></script> 
<script src="/Plugin/ui/js/matrix.js"></script>  
<script src="/Plugin/ui/js/matrix.tables.js"></script> 
<script src="/Plugin/ui/js/matrix.form_validation.js"></script>
<script src="/Plugin/dropzone/js/dropzone.js"></script>




<script src="/Public/js/addcar.js"></script> 
<script src="/Public/js/emp.js"></script> 
<script src="/Public/js/carlist.js"></script> 

<style type="text/css">
  #selectScope{
    width: 700px;
  }
</style>

<SCRIPT TYPE="text/javascript">
 var myDropzone;

   function addNewTitleImg ()
   {

         var i,_len;
         var dopz=Dropzone.forElement("#add_Newdropzone");
        var date=dopz.getAcceptedFiles();
         _len = date.length;
         var count=0,detailPath="";
         dopz.on('complete',function()
                {
                    count++;
                   
                    if(count==_len)
                    {
                       for (i = 0; i < _len; i++) 
                            detailPath+="/upload/detail_"+add_carId+'_'+date[i].name+",";
                       $.post('/Admin/Car/setDetailImg', {
                               detailPath: detailPath,carId:add_carId
                             },
                             function(data) {
                                      if(data="done")
                                      {
                                         alert("上传成功！");
                                         closeNewDetailImg();
                                         dopz.removeAllFiles();
                                      }

                             });
                                             
                     }    
                });
               
                dopz.processQueue();
   }

   function loadTitleImg () 
   {  

             var i,_len;
             var date=myDropzone.getAcceptedFiles();
             _len = date.length;
             var count=0,detailPath="";
            if(_len==0)
              alert("请至少选择一张图片上传");
            else
            {
              
                myDropzone.on('complete',function()
                {
                    count++;
                   
                    if(count==_len)
                    {
                       for (i = 0; i < _len; i++) 
                            detailPath+="/upload/detail_"+add_carId+'_'+date[i].name+",";
                       $.post('/Admin/Car/setDetailImg', {
                               detailPath: detailPath,carId:add_carId
                             },
                             function(data) {
                                      if(data="done")
                                      {
                                       $('.tempElement').remove();
                                          var elementCopy=$('#choose_title_img').clone().insertBefore($('#choose_title_img')).addClass('tempElement');
                                       elementCopy.show();
                                        

                                                // 

                                                for (i = 0; i < _len; i++) 
                                                {
                                                  //console.log(date[i].name+"  ,"); 
                                                 
                                                   var fname="/upload/title_"+add_carId+'_'+date[i].name;
                                                   $(".tempElement #title_img").append('<label style="display:inline-block;"><input type="radio" name="titleImg_radios" value="'+fname+'" checked/><img  src="'+fname+'" class="img-polaroid" style="height:150px;width:200px;"/></label>');
                                                }
                                                count=0;}

                             });
                                             
                                            }

                                            
                      
                          
                });
               
                myDropzone.processQueue();
           }
         
  }
  function editTitleImg (id) {
         var titlePath;
         var tpselect=document.getElementsByName("edit_titleImg_radios");
         for(var i=0;i<tpselect.length;i++)
         {
           if(tpselect[i].checked)
           {
              titlePath=tpselect[i].value;
              break;
           }
         }
            $.post('/Admin/Car/setTitleImg', {
         titlePath: titlePath,carId:id
       },
       function(data) {
          if(data="done")
          {
            alert("修改成功！");
             closeEditTitleImg();
            }

       });
  }

  function setTitleImg()
  {
          var titlePath;
          var tpselect=document.getElementsByName("titleImg_radios");
         for(var i=0;i<tpselect.length;i++)
         {
           if(tpselect[i].checked)
           {
              titlePath=tpselect[i].value;
              break;
           }
         }

            $.post('/Admin/Car/setTitleImg', {
         titlePath: titlePath,carId:add_carId
       },
       function(data) {
          if(data="done")
          {
          alert("添加车辆信息完成！");
          showdiv('add_car','car_Manage');}

       });
  }

   function showdiv(divtoshow,sidebarid)
    {
        $(".sidebar_li").removeClass("active");
        $(".show_div").hide();
        $("#"+sidebarid).addClass("active");
        
        $('.tempElement').remove();

        if(divtoshow=="add_car")
        {  var elementCopy=$('#'+divtoshow).clone().insertBefore($('#'+divtoshow)).addClass('tempElement');
           elementCopy.show();
           addCarValidate();  /*$("#"+divtoshow).show();*/
           loadLocation();
           /*loadLocation($('#carCitySelect'),$('#carDistrictSelect'),$('#carStreetSelect'),$('#citySelect'),$('#districtSelect'),$('#streetSelect'));*/
        }
        else if(divtoshow=="add_car_img")
        {

           var elementCopy=$('#'+divtoshow).clone().insertBefore($('#'+divtoshow)).addClass('tempElement');
           elementCopy.show();
          //  var myDropzone=$('.tempElement form.dropzone').dropzone();
          myDropzone = new Dropzone(".tempElement form.dropzone", { url: "/Admin/Info/upload"}); 
        }
        else if(divtoshow=="emp_list")
        {
          getEmployees(1);
          $("#"+divtoshow).show();
        }

        else if (divtoshow=="car_list") {
         
          getCars(1); $("#"+divtoshow).show();
        }
        

        else if(divtoshow=="add_emp")
        { 
          var elementCopy=$('#'+divtoshow).clone().insertBefore($('#'+divtoshow)).addClass('tempElement');
          elementCopy.show();
          addEmpValidate();
        }
    }  
     

</SCRIPT>

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages">
      <a title="" href="#)" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>
            <span class="text">用户信息设置</span><b class="caret"></b>
      </a>
      <ul class="dropdown-menu">
       <li><a title="" href="javascript:editpassord()"><i class="icon icon-cog"></i>修改密码</a></li>
         <li class="divider"></li>
       <li> <a id="editSelfBasicInfo" href="javascript:editEmp('')"><i class="icon icon-cog"></i> 修改基本信息</a></li>
         <li class="divider"></li>
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <!-- <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li> -->

    <li class=""><a title="" href="/Admin/Index/loginOut"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
    <div id="myModal_editPassword" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 


           <div class="modal-header">   
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeEditPass()">×</button>  
              <h3 id="myModalLabel">修改密码</h3> 
           </div>  

              <div class="modal-body">   
               <span id="addSpan">
             <form class="form-horizontal" id="edit_pass_form">
                <div class="control-group">
                  <label class="control-label" for="edit_oldpass">原密码</label>
                  <div class="controls">
                    <input type="password" name="edit_oldpass" id="edit_oldpass"></input>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="edit_newpass">新密码</label>
                  <div class="controls">
                    <input type="password" name="edit_newpass" id="edit_newpass"></input>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="edit_newpass2">新密码确认</label>
                  <div class="controls">
                    <input type="password" name="edit_newpass2" id="edit_newpass2"></input>
                  </div>
                </div>


            
                <div class="control-group">
                  <div class="controls">
                    <div style="display:inline-block;">
                     <button type="submit" class="btn btn-info">保存</button> 
                    <div id="editpass_status"></div>
                  </div>
                   
                     </div>
                </div>
              </form>
          </span>
              </div>  

               <div class="modal-footer">  
                <!--    <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="closeEditPass()">关闭</button>  -->
              </div>
        </div>
  




</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->















<!--sidebar-menu-->
<div id="sidebar" >

<!--   <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a> -->

  <ul>

  <!--   <li class="sidebar_li active"><a  href="javascript:func()"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="sidebar_li"><a href="javascript:func()"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li> -->
   
   
    <li id="emp_Manage" class="sidebar_li submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>员工管理</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="javascript:showdiv('emp_list','emp_Manage')">员工列表</a></li>
        <li><a href="javascript:showdiv('add_emp','emp_Manage')">添加员工</a></li>
      </ul>
    </li>
    
    <li id="car_Manage" class="sidebar_li submenu"> <a href="#"><i class="icon icon-file"></i> <span>车辆信息管理</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="javascript:showdiv('add_car','car_Manage')">添加车辆</a></li>
        <li><a href="javascript:showdiv('car_list','car_Manage')">车辆列表</a></li>
        <li><a href="javascript:showdiv('emp_list','car_Manage')">Calendar</a></li>
  
      </ul>
    </li>


 <!--    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li> -->

  </ul>
</div>
<!--sidebar-menu-->




<div id="add_car" style="height: 100%;display:none;" class="show_div">
                    <div id="content">
                    <div id="content-header">
                      <div id="breadcrumb"> 
                        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
                        <a href="#">车辆信息管理</a> 
                        <a href="#" class="current">添加车辆</a> </div>
                      <h1>添加车辆</h1>
                    </div>
                    <div class="container-fluid"><hr>
                      <div class="row-fluid">
                         <div class="span1">
                         </div>
                      <div class="span12">
                          <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                              <h5>Form validation</h5>
                            </div>
                            <div class="widget-content nopadding">
                        

                              <form class="form-horizontal" method="post" name="add_car_form" id="add_car_form" novalidate="novalidate" >
                                <div class="control-group">
                                  <label class="control-label">载人数</label>
                                  <div class="controls">
                                    <input type="text" class="span7" name="positivenum" id="personIn">
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">载重量</label>
                                  <div class="controls">
                                    <input type="text" class="span7" name="number" id="capacityIn">
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">长×宽×高</label>
                                  <div class="controls">
                                    <input type='text' name="length" class="span2" id='carLengthIn' placeholder='  长'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; × &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type='text' name="width" class="span2" id='carWidthIn' placeholder='  宽'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; × &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type='text' name="height" class="span2" id='carHeightIn' placeholder='  高'/>
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">姓氏</label>
                                  <div class="controls">
                                    <input type="text" class="span7" name="required" id="familynameIn">
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">电话</label>
                                  <div class="controls">
                                    <input type="text" class="span7" name="phone" id="phoneIn">
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">归属地</label>
                                  <div class="controls">
                                    <select id='carCitySelect' class="span2" onChange='carCityChange("#carCitySelect","#carDistrictSelect","#carStreetSelect")'></select>
                                    <select id='carDistrictSelect' class="span2" onChange='carDistrictChange("#carDistrictSelect","#carStreetSelect")'></select>
                                    <select id='carStreetSelect' class="span2"></select>
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">可用状态</label>
                                  <div class="controls">
                                    <label style="display:inline-block;">
                                    <input type="radio" name="ifuseful" value="1" checked/>可用</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label style="display:inline-block;">
                                    <input type="radio" name="ifuseful" value="0"/>不可用</label>
                                  </div>
                                </div>





                                <div class="control-group">
                                  <label class="control-label">备注</label>
                                  <div class="controls">
                                    <textarea id='append' class="span7"></textarea>
                                  </div>
                                </div>

                                <div class="control-group">
                                  <label class="control-label">服务范围</label>
                                  <div class="controls">

                                    <div id='addScopeDiv'>
                                      <select id='citySelect' class="span2" onChange='carCityChange("#citySelect","#districtSelect","#streetSelect")'></select>
                                      <select id='districtSelect' class="span2" onChange='carDistrictChange("#districtSelect","#streetSelect")'></select>
                                      <select id='streetSelect' class="span2"></select>   

                                      <a id='saveAddScope' style='cursor:pointer' onClick='saveAddScope("#citySelect","#districtSelect","#streetSelect","#selectScope")'>添加</a>

                                    </div>
                                    
                                    <table  id="selectScope"></table>

                                  </div>
                                </div>

                             
                                <div class="control-group">
                                 
                                </div>




                                <div class="form-actions">
                                  <input type="submit" value="下一步" class="btn btn-success">
                                  &nbsp;&nbsp;
                                  <input type="reset"  value="重置" class="btn btn-primary" id="add_car_reset">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <label class="add_car_status" style="display:inline-block;"></label>
                                </div>
                              </form>


                            </div>
                          </div>
                        </div>


            

                      </div>
                    </div>
                  </div>
</div>

      

<div id="add_car_img" style="height: 100%;display:none;" class="show_div">
                    <div id="content">
                    <div id="content-header">
                      <div id="breadcrumb"> 
                        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
                        <a href="#">车辆信息管理</a> 
                        <a href="#" class="current">添加车辆</a> </div>
                      <h1>添加车辆</h1>
                    </div>
                    <div class="container-fluid"><hr>
                      <div class="row-fluid">
                      <div class="span12">
                          
                             <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                              <h5>Form validation</h5>
                            </div>
                            <div class="widget-content nopadding">


                             <form action="/Admin/Info/upload" class="dropzone" method="post">
                                <div class="fallback">
                                  <input name="file" type="file" multiple />
                                </div> 
                                
                              </form>
                                 <P class="text-center">
                                    <button class="btn btn-success" onclick="loadTitleImg()">上传图片，并进入下一步</button>
                                </P>
                          
                            </div>
                          </div>


                        </div>

                      </div>
                    </div>
                  </div>
</div>


<div id="choose_title_img" style="height: 100%;display:none;" class="show_div">
                    <div id="content">
                    <div id="content-header">
                      <div id="breadcrumb"> 
                        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
                        <a href="#">车辆信息管理</a> 
                        <a href="#" class="current">添加车辆</a> </div>
                      <h1>添加车辆</h1>
                    </div>
                    <div class="container-fluid"><hr>
                      <div class="row-fluid">
                      <div class="span12">
                          

                             <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                              <h5>选择封面图片</h5>
                            </div>
                            <div class="widget-content nopadding">
                                 
                                   <div class="controls">
                                       <div id="title_img">
                                       </div>
                                    </div>


                                 <P class="text-center">
                                    <button class="btn btn-success" onclick="setTitleImg()">完成</button>
                                </P>
                          
                            </div>
                          </div>


                        </div>

                      </div>
                    </div>
                  </div>
</div>






<div id="add_emp" style="height: 100%;display:none;" class="show_div">
                    <div id="content">
                    <div id="content-header">
                      <div id="breadcrumb"> 
                        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
                        <a href="#">员工管理</a> 
                        <a href="#" class="current">添加员工</a> </div>
                      <h1>添加员工</h1>
                    </div>

                    <div class="container-fluid"><hr>
                      <div class="row-fluid">
                        <div class="span12">
                          <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                              <h5>Form validation  </h5>   
                            </div>
                            <div class="widget-content nopadding">


                              <form class="form-horizontal" method="post"  name="add_emp_form" id="add_emp_form" novalidate="novalidate">
                                <div class="control-group">
                                  <label class="control-label">登录名</label>
                                  <div class="controls">
                                    <input type="text" name="loginname" id="loginname">
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">密码</label>
                                  <div class="controls">
                                    <input type="password" name="pwd" id="pwd" />
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">确认密码</label>
                                  <div class="controls">
                                    <input type="password" name="pwd2" id="pwd2" />
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label">真实姓名</label>
                                  <div class="controls">
                                    <input type="text" name="realname" id="realname">
                                  </div>
                                </div>

                               
       
                                 <div class="control-group">
                                  <label class="control-label">性别</label>
                                  <div class="controls">
                                        <div > 
                                              <label style="display:inline-block;">
                                              <input type="radio" name="radios" value="男" checked/>
                                              男</label>
                                             
                                            <label style="display:inline-block;">
                                              <input type="radio" value="女" name="radios"/>
                                              女</label>
                                       </div>
                                    </div>
                                </div>
                                 <div class="control-group">
                                  <label class="control-label">联系电话</label>
                                  <div class="controls">
                                    <input type="text" name="phonenumber" id="phonenumber">
                                  </div>
                                </div>
                                <div class="form-actions">
                                  <input type="submit" value="添加" class="btn btn-success">&nbsp;&nbsp;
                                  <input type="reset"  value="重置" class="btn btn-primary" id="add_emp_reset">
                                  &nbsp;&nbsp;&nbsp;<div  id="add_emp_status" style="display:inline-block;"></div>
                                </div>
                                
                               
                              </form>


                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
</div>





<div id="emp_list" style="height: 100%;display:none;"  class="show_div">
<div id="content">
  <div id="content-header">

     <div id="breadcrumb"> 
      <a href="index.html" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a> 
      <a href="#">员工管理</a> 
      <a href="#" class="current">员工列表</a>
     </div>

     <h1>员工列表</h1>  
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
             <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Employees table</h5>
          </div>
          <div class="widget-content nopadding">

            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                 
                  <th>登录名</th>
                  <th>真实姓名</th>
                  <th>性别</th>
                  <th>联系方式</th>
                  <th>上次登陆时间</th>
                  <th>编辑</th>
                  <th>锁定</th>
                  <th>删除</th>
                </tr>
              </thead>
              <tbody id="emplist_tablebody">
              
              </tbody>
            </table>
                
                 <label style="margin-top:30px;float:left;"id="getEmployees_totalPage"></label> <div class="pagination pagination-right" id="getEmployees">  </div> 
          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>




          <div id="myModal_editEmp" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 


           <div class="modal-header">   
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeEditEmp()">×</button>  
              <h3 id="myModalLabel">编辑员工信息</h3> 
           </div>  

              <div class="modal-body">   
               <span id="addSpan">
             <form class="form-horizontal" id="edit_emp_form">
               <div class="control-group">
                  <label class="control-label" for="edit_id">员工ID</label>
                  <div class="controls">
                    <label style="margin-top: 5px; " type="text" id="edit_id"></label>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="edit_loginname">登陆名</label>
                  <div class="controls">
                    <label type="text" id="edit_loginname"></label>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="edit_realname">真实姓名</label>
                  <div class="controls">
                    <input type="text" id="edit_realname"/>
                </div>
              </div>

                <div class="control-group">
                      <label class="control-label">性别</label>
                      <div class="controls">
                            <div class="edit_emp_sex"> 
                                  
                           </div>
                        </div>
                 </div>
                 
                 <div class="control-group">
                                  <label class="control-label">联系电话</label>
                                  <div class="controls">
                                    <input type="text" name="edit_phonenumber" id="edit_phonenumber">
                                  </div>
               </div>


                               <div class="control-group">
                  <div class="controls">
                    <button type="submit" class="btn btn-info">保存</button>
                  </div>
                </div>
              </form>
          </span>
              </div>  

               <div class="modal-footer">  
                 
              </div>
        </div>




<!-- 车列表  -->
<div id="car_list" style="height: 100%;display:none;"  class="show_div">
 
  <div id="content">
  <div id="content-header">

     <div id="breadcrumb"> 
      <a href="index.html" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a> 
      <a href="#">车辆管理</a> 
      <a href="#" class="current">车辆列表</a>
     </div>

     <h1>车辆列表</h1> 
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
             <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Cars table</h5>
          </div>
          <div class="widget-content nopadding">

            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                 
                  <th>电话</th>
                  <th>姓氏</th>
                  <th>载人数</th>
                  <th>载重量(吨)</th>
                  <th>长宽高(M)</th>
                  <th>大小类型</th>
                  <th>归属地</th>
                  <th>编辑</th>
                  <th>封面图片</th>
                  <th>详情图片</th>
                  <th>锁定</th>
                  <th>删除</th>
                </tr>
              </thead>
              <tbody id="carlist_tablebody">
              
              </tbody>
            </table>
                
                 <label style="margin-top:30px;float:left;" id="getCars_totalPage"></label> <div class="pagination pagination-right" id="getCars">  </div> 
          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

   
  <div id="myModal_editCar" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
    <div class="modal-header">   
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeEditCar()">×</button>  
      <h3 id="myModalLabel">编辑车辆信息</h3> 
    </div>  

    <div class="modal-body">   
      <span id="addSpan">



        <form class="form-horizontal" method="post" name="edit_car_form" id="edit_car_form" novalidate="novalidate">
          <div class="control-group">
            <label class="control-label">车辆ID</label>
            <div class="controls">
              <label style="margin-top: 5px; " type="text" class="edit_carid"></label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">载人数</label>
            <div class="controls">
              <input type="text" name="positivenum" class="edit_person">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">载重量(吨)</label>
            <div class="controls">
              <input type="text" name="number" class="edit_capacity">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">长×宽×高(M)</label>
            <div class="controls">
              <input type='text' style='width:30px;' name="length" class='edit_carLength' placeholder='  长'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; × &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type='text' style='width:30px;' name="width" class='edit_carWidth' placeholder='  宽'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; × &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type='text' style='width:30px;' name="height" class='edit_carHeight' placeholder='  高'/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">姓氏</label>
            <div class="controls">
              <input type="text" name="required" class="edit_familyname">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">电话</label>
            <div class="controls">
              <input type="text" name="phone" class="edit_phone">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">归属地</label>
            <div class="controls">
              <select class='edit_carCitySelect' style='width:110px;' onChange='carCityChange(".edit_carCitySelect",".edit_carDistrictSelect",".edit_carStreetSelect")'></select>
              <select class='edit_carDistrictSelect' style='width:110px;' onChange='carDistrictChange(".edit_carDistrictSelect",".edit_carStreetSelect")'></select>
              <select class='edit_carStreetSelect' style='width:110px;'></select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">服务范围</label>
            <div class="controls">
              <div class='edit_addScope'>
                <select class='edit_scopeCitySelect' style='width:110px;' onChange='carCityChange(".edit_scopeCitySelect",".edit_scopeDistrictSelect",".edit_scopeStreetSelect")'></select>
                <select class='edit_scopeDistrictSelect' style='width:110px;' onChange='carDistrictChange(".edit_scopeDistrictSelect",".edit_scopeStreetSelect")'></select>
                <select class='edit_scopeStreetSelect' style='width:110px;'></select>   
                <a id='saveAddScope' style='cursor:pointer' onClick='saveAddScope(".edit_scopeCitySelect",".edit_scopeDistrictSelect",".edit_scopeStreetSelect",".edit_scopeTable")'>添加</a>                                   
              </div>
              
              <table  class="edit_scopeTable" style='width:300px;'></table>

            </div>
          </div>
          <div class="control-group">
            <label class="control-label">备注</label>
            <div class="controls">
              <textarea class='edit_append'></textarea>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn btn-info">保存</button>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label class="edit_carStatus" style="display:inline-block;"></label>
            </div>
          </div>
        </form>
             
      </span>
    </div>  

    <div class="modal-footer">  
      <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="closeEditCar()">关闭</button> 
    </div>
  </div>


       <div id="edit_carTitleImg" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
           <div class="modal-header">   
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeEditTitleImg()">×</button>  
              <h3 id="myModalLabel">编辑封面图片</h3> 
           </div>  

              <div class="modal-body">   
               <span id="addSpan">
                            <div class="controls">
                                       <div id="edit_title_img">
                                       </div>
                           </div>
                           <P class="text-center">
                                    <button class="btn btn-success" id="btn_editTitltImg" onclick="">完成</button>
                            </P> 
          </span>
              </div>  

               <div class="modal-footer">  
                 
              </div>
        </div>


      <div id="edit_carTitleImg" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
           <div class="modal-header">   
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeEditTitleImg()">×</button>  
              <h3 id="myModalLabel">查看删除详情图片</h3> 
           </div>  

              <div class="modal-body">   
               <span id="addSpan">
                            <div class="controls">
                                       <div id="edit_title_img">
                                       </div>
                           </div>
                           <P class="text-center">
                                    <button class="btn btn-success" id="btn_editTitltImg" onclick="">完成</button>
                            </P> 
          </span>
              </div>  

               <div class="modal-footer">  
                 
              </div>
        </div>


      <div id="edit_CarDetailImg" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
           <div class="modal-header">   
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeEditDetailImg()">×</button>  
              <h3 id="myModalLabel">查看删除详情图片</h3> 
           </div>  

              <div class="modal-body">   
               <span>
                         
                                       <div id="edit_detail_img">

                                       </div>
                           
          </span>
              </div>  

               <div class="modal-footer">  
                 
              </div>
        </div>

         


      <div id="add_NewCarDetailImg" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
           <div class="modal-header">   
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeNewDetailImg()">×</button>  
              <h3 id="myModalLabel">新增详情图片</h3> 
           </div>  

              <div class="modal-body">   
               <span>
                         
                            <form  class="dropzone" method="post" id="add_Newdropzone" action="/Admin/Info/upload">
                                <div class="fallback">
                                  <input name="file" type="file" multiple/>
                                </div> 
                            </form>
                            <p class="text-center">
                                    <button class="btn btn-success" onclick="addNewTitleImg()">上传图片</button>
                            </p>
                          
                           
          </span>
              </div>  

               <div class="modal-footer">  
                 
              </div>
        </div>



</div>









<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in/">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->





</body>
</html>