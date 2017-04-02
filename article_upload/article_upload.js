$(document).ready(function(){ 

	$("#upload").click(function(){ 
		$.ajax({ 
		    type: "POST", 	
			url: "serverjson.php",
			data: {
				title: $("#articleTitle").val(), 
				content: $("#articleContent").val()
			},
			dataType: "json",
			success: function(data){
				if (data.success) { 
					$("#uploadResult").html(data.msg);
				} else {
					$("#uploadResult").html("出现错误：" + data.msg);
				}  
			},
			error: function(jqXHR){     
			   alert("发生错误：" + jqXHR.status);  
			},     
		});
	});
});