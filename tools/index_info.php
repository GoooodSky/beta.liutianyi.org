<?php 
    $conn = mysql_connect("127.0.0.1","root","Liutianyi@9999");
    if(!$conn){
        echo "数据库连接失败";
        exit;
    }
    mysql_select_db("liutianyi");

    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y.m.j");
    $time = date("H:i:s");
    //判断是否初次访问，并判断是第几个访问者
    $query_visitor = mysql_query("select * from uniqueIP where ip = '$ip'");
    $result = mysql_fetch_array($query_visitor);
    if($result == true){
        $query = mysql_query("select id from uniqueIP where ip = '$ip'");
        $num = mysql_fetch_array($query);
    }
    else{
        mysql_query("insert into uniqueIP (ip,date,time) values ('$ip','$date','$time')");
        $query = mysql_query("select max(id) from uniqueIP");
        $num = mysql_fetch_array($query);
    }
    //判断今日访问量
    $query_freq = mysql_query("select * from request where date = '$date'");
    $freq = mysql_num_rows($query_freq);  
?>