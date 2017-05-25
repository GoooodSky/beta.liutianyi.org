<?php
require_once("../conn.php");

header("Content-Type: text/plain;charset=utf-8"); 

function login(){

	$db = "uchihaty";
	$username = $_POST["username"];
	$password = md5($_POST["password"]);


	mysql_select_db($db);

	$sql="select * from user where username='$username' and password='$password'";

	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);

	if($result==true) {
		echo '{"success":true , "msg" : "登录成功"}';
    }

	else{
		echo '{"success":false , "msg" : "登录失败"}';
	}


}

	login();



// function create(){

// 	if (!isset($_POST["username"]) || empty($_POST["username"])) {

// 		echo '{"success":false,"msg":"请填写用户名"}';
// 		return;
// 	}


// 	if (!isset($_POST["password"]) || empty($_POST["password"])) {

// 	 	echo '{"success":false,"msg":"请填写密码"}';
// 	 	return;

// 	}


// 	if(search()==true){

// 		$db = "uchihaty";

// 		$username = $_POST["username"];
// 	    $password = md5($_POST["password"]);

// 		mysql_select_db($db);


// 		$sql =  "insert into user (username,password) " ."values('$username','$password') ";

// 		mysql_query($sql);

// 		echo '{"success":true , "msg" : "注册成功！"}';

// 	}

// 	else{
// 		echo '{"success":false , "msg" : "注册失败:用户名已存在"}';
// 	}

// }

?>