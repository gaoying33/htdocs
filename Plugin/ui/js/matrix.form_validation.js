function saveEditPass ()
{
   $("#edit_pass_form").validate({
    rules:{
       edit_oldpass:{
        required: true,
        minlength:6,
        maxlength:20
      },
       edit_newpass:{
        required: true,
        minlength:6,
        maxlength:20
      },
      edit_newpass2:{
        required:true,
        minlength:6,
        maxlength:20,
        equalTo:"#edit_newpass"
      }
    },   
    errorClass: "help-inline",
    errorElement: "span",
    highlight:function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('success');
      $(element).parents('.control-group').addClass('error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('error');
      $(element).parents('.control-group').addClass('success');
    },
     submitHandler: function(form)
      {
            $('#editpass_status').text('修改中').css('color','gray');
           $.post('/Admin/Employee/editPassword', {oldpass:$("#edit_oldpass").val(),newpass:$("#edit_newpass").val()},
            function(response) {
               if (response=='done')  {alert("修改成功！"); closeEditPass();   form.reset();}
               if (response=='wrong')  $('#editpass_status').text('原密码错误').css('color','red');
            
                });   
         }});
}



 function saveEditEmp()
 {
    $("#edit_emp_form").validate({
    rules:{
      edit_realname:{
        required:true,
        minlength:2
      },
      edit_phonenumber:{
        required:true,
        phone:true
      }
    },   
    errorClass: "help-inline",
    errorElement: "span",
    highlight:function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('success');
      $(element).parents('.control-group').addClass('error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('error');
      $(element).parents('.control-group').addClass('success');
    },
     submitHandler: function(form)
      {
         var id=$("#edit_id").text();
         var realname=$("#edit_realname").val();
          var sex;
         var sexselect=document.getElementsByName("edit_radios");
         for(var i=0;i<sexselect.length;i++)
         {
           if(sexselect[i].checked)
           {
           sex=sexselect[i].value;
           break;
           }
         }
           var phone=$("#edit_phonenumber").val();
           $.post('/Admin/Employee/editBasicInfo', {empId:id,realname:realname,sex:sex,phone:phone},
            function(response) {
              if (response=='done')  {alert("修改成功！");  closeEditEmp(); getEmployees(nowPage);}
              else   alert("修改失败！") });
      }

  });
 }
   
   
	function addEmpValidate ()
   {

    // body...
     $("#add_emp_form").validate({
    rules:{
      loginname:{
        required:true,
        minlength:3
      },
      pwd:{
        required: true,
        minlength:6,
        maxlength:20
      },
      pwd2:{
        required:true,
        minlength:6,
        maxlength:20,
        equalTo:"#pwd"
      },
      realname:{
        required:true,
        minlength:2
      },
      phonenumber:{
        required:true,
        phone:true
      }
    },
    errorClass: "help-inline",
    errorElement: "span",
    highlight:function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('success');
      $(element).parents('.control-group').addClass('error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('error');
      $(element).parents('.control-group').addClass('success');
    },
     submitHandler: function(form)
      {
           var username=$("#loginname").val();
           var password=$("#pwd").val();
           var realname=$("#realname").val();
               var sex;
               var sexselect=document.getElementsByName("radios");
         for(var i=0;i<sexselect.length;i++)
         {
         // alert(eless[i].checked+eless[i].name+eless[i].id);
           if(sexselect[i].checked)
           {
           sex=sexselect[i].value;
           break;
           }
         }
           var phone=$("#phonenumber").val();
           $('#add_emp_status').text('添加中').css('color','gray');
           $.post('/Admin/Employee/add', {username:username,password:password,realname:realname,sex:sex,phone:phone},
            function(response) {
              if (response=='done')  {alert("添加成功！");  $("#add_emp_reset").click(); $('.control-group').removeClass('success')}// $('#status').text('添加成功').css('color','green');
              if (response=='exist')  alert("该登陆名已被使用，请更换！"); //$('#status').text('该用户已被使用').css('color','orange');
              if (response=='fail')   alert("添加失败！")//$('#status').text('添加失败').css('color','red');
              $('#add_emp_status').text('').css('color','gray');
                    });
      }

  });
  }



    

function addCarValidate (argument) {
	// body...//添加车的界面验证
	$("#add_car_form").validate({
		rules:{
			required:{
				required:true
			},
			number:{
				required:true,
				number:true
			},
			positivenum:{
				required:true,
				positivenum:true
			},
			phone:{
				required:true,
				phone:true
			},
			length:{
				required:true,
				number:true
			},
			width:{
				required:true,
				number:true
			},
			height:{
				required:true,
				number:true
			}

		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('success');
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		},
		submitHandler: function(form) {

	       addCar();
	       
	    }
   	});
}

function saveEditCarValidate(){  
  $("#edit_car_form").validate({
    rules:{
      required:{
        required:true
      },
      number:{
        required:true,
        number:true
      },
      positivenum:{
        required:true,
        positivenum:true
      },
      phone:{
        required:true,
        phone:true
      },
      length:{
        required:true,
        number:true
      },
      width:{
        required:true,
        number:true
      },
      height:{
        required:true,
        number:true
      }

    },
    errorClass: "help-inline",
    errorElement: "span",
    highlight:function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('success');
      $(element).parents('.control-group').addClass('error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('error');
      $(element).parents('.control-group').addClass('success');
    },
    submitHandler: function(form) {

         saveEditCar();
         
      }
    });
}