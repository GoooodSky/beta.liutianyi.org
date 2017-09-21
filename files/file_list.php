<?php 
	$conn = mysql_connect("127.0.0.1","root","Liutianyi@9999");
	if(!$conn){
	    echo "数据库连接失败";
	    exit;
	}
	mysql_select_db("liutianyi");
    $sql = "select * from files";
    $query_filelist = mysql_query($sql);
    $filelist = mysql_fetch_assoc($query_filelist);
 ?>