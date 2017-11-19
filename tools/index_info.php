<?php 
    date_default_timezone_set("Asia/Shanghai"); 
    $conn = mysqli_connect("127.0.0.1","root","Liutianyi@9999");
    if(!$conn){
        echo "数据库连接失败";
        exit;
    }
    $db = mysqli_select_db($conn,"liutianyi");

    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y.m.j");
    $time = date("H:i:s");
    //判断是否初次访问，并判断是第几个访问者
    $query_visitor = mysqli_query($conn, "select * from uniqueIP where ip = '$ip'");
    $result = mysqli_fetch_array($query_visitor);
    if($result == true){
        $query = mysqli_query($conn, "select id from uniqueIP where ip = '$ip'");
        $num = mysqli_fetch_array($query);
    }
    else{
        mysqli_query($conn, "insert into uniqueIP (ip,date,time) values ('$ip','$date','$time')");
        $query = mysqli_query($conn, "select max(id) from uniqueIP");
        $num = mysqli_fetch_array($query);
    }
    //判断今日访问量
    $query_freq = mysqli_query($conn, "select * from request where date = '$date'");
    $freq = mysqli_num_rows($query_freq);  
?>