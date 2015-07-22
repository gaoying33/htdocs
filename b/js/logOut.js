function logoutfunc()
{ 
    $.ajax({
      type: "POST",
      url:'../handler/LogoutHandler.php',
      data:{                      
      },
                  
      success: function(data){
        location.href = "login.html";  
      }
    });
}

function check()
		{
		$.ajax({
							type: "GET",
							url:'../handler/CheckHandler.php',	
							success: function(data){
								//alert(data);	
								if (data == false) 
								{
								    //没有登陆时将页面重新定向到登陆页面			
                                    window.location.href="login.html"; 
								}
							}
				});
      


		}