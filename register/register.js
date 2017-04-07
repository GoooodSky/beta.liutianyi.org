$(function(){ 

	$("#username").focus(function() {

		$("#result").html("");
		$("#usernameResult , #passwordResult").html("");
		$("#username ").removeClass('border-color');
	});

	$("#password").focus(function() {
		$("#usernameResult , #passwordResult").html("");
		$("#password").removeClass('border-color');
	});




	function click(){ 
		$.ajax({ 
		    type: "POST", 	
			url: "register.php",
			data: {
				username: $("#username").val(), 
				password: $("#password").val(),
				action: "create"
			},
			dataType: "json",
			success: function(data){
				if (data.success) { 
					$("#result").html(data.msg);
					// alert('success');
				} else {
					$("#result").html(data.msg);
				}  
			},
			error: function(jqXHR){     
			   alert("发生错误：" + jqXHR.status);  
			},     
		});
	};

	// $("#submit").click(click);  //此行是造成两次提交的罪魁祸首

	$("#username").blur(function() {
			$.ajax({ 
		    type: "POST", 	
			url: "register.php",
			data: {
				username: $("#username").val(), 
				action: "search"
			},
			dataType: "json",
			success: function(data){
				if (data.success) { 
					$("#usernameResult").html("");
					// $("#submit").bind("click",click);
					// alert('success');
				} else {
					$("#usernameResult").html("用户名已存在");
					$("#username").addClass('border-color');
                    // $("#submit").unbind("click");
				}  
			},

			error: function(jqXHR){     
			   alert("发生错误：" + jqXHR.status);  
			},     
		});	
	});

	$("#password").blur(function() {
		if($(this).val().length < 6 ){

			$("#passwordResult").html("密码长度不能少于6位");
			$("#password").addClass('border-color');
			$("#submit").unbind("click");
		}
		else if($(this).val().length >= 6){
			$("#passwordResult").html("");
			$("#password").removeClass('border-color');
			$("#submit").bind("click",click);//

		}

	});






})