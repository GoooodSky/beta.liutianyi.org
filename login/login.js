$(function(){ 

	function submitClick(){ 

		if($.trim($("#username").val())==""){

			alert("请输入用户名");
			$("#username").focus();
		}

		else if($.trim($("#password").val())==""){  //trim用于去除首尾空字符和空格
			alert("请输入密码");
			$("#password").focus();
		}


		else{

			$.ajax({ 
			    type: "POST", 	
				url: "login.php",
				data: {
					username: $("#username").val(), 
					password: $("#password").val(),
				},
				dataType: "json",
				success: function(data){
					if (data.success) { 
						alert('success');
					} 
					else {
						alert('false');
					}  
				},
				error: function(jqXHR){     
				   alert("发生错误：" + jqXHR.status);  
				},     
				});
			};
		}



	$("#submit").click(submitClick);





})