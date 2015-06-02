
$(document).ready(function(){
    
    $('#status').text('欢迎使用~').css('color','gray');
	var login = $('#loginform');
	var recover = $('#recoverform');
	var speed = 400;

	$('#to-recover').click(function(){
		
		$("#loginform").slideUp();
		$("#recoverform").fadeIn();
	});
	$('#to-login').click(function(){
		
		$("#recoverform").hide();
		$("#loginform").fadeIn();
	});
    
    if($.browser.msie == true && $.browser.version.slice(0,3) < 10) {
        $('input[placeholder]').each(function(){ 
       
        var input = $(this);       
       
        $(input).val(input.attr('placeholder'));
               
        $(input).focus(function(){
             if (input.val() == input.attr('placeholder')) {
                 input.val('');
             }
        });
       
        $(input).blur(function(){
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        });
    });

        
        
    }
});

 function doLogin()
 {
      var username=$("#username").val(); 
      var password=$("#password").val();
      if(username.length==0||password==0)  $('#status').text('用户名和密码不能为空').css('color','gray');
      else
      {
	     
	      $('#status').text('登录中').css('color','gray');
	      
	      $.post('/Admin/Employee/login',
	        {loginName:username,password:password},
	        function(response){
	           
	          if (response=='none') $('#status').text('用户不存在').css('color','red');
	          if (response=='wrong') $('#status').text('密码错误').css('color','red');
	          if (response=='locked') $('#status').text('已被锁定').css('color','red');
	          if (response=='right') {
	            $('#status').text('登录成功').css('color','green'); 
	            window.location.href='/Admin/Main/main'; 
	        }
	        });
      }
}