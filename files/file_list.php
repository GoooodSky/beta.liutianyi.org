<?php 
	$conn = mysqli_connect("127.0.0.1","root","Liutianyi@9999");
	if(!$conn){
	    echo "数据库连接失败";
	    exit;
	}
	mysqli_select_db($conn, "liutianyi");
    $sql = "select * from files";
    $query_filelist = mysqli_query($conn, $sql);
    $filelist = mysqli_fetch_assoc($query_filelist);
 ?>