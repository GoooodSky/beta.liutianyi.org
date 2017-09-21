<?php
//保存访问者信息 
    date_default_timezone_set("Asia/Shanghai");
    // 获取系统信息
    function get_os() {
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $os = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/win/i', $os) && preg_match('/NT 5.1/i', $os)) {
                $os = 'Windows XP';
            } 
            else if (preg_match('/win/i', $os) && preg_match('/NT 6.0/i', $os)) {
                $os = 'Windows Vista';
            } 
            else if (preg_match('/win/i', $os) && preg_match('/NT 6.1/i', $os)) {
                $os = 'Windows 7';
            } 
            else if (preg_match('/win/i', $os) && preg_match('/NT 6.2/i', $os)) {
                $os = 'Windows 8';
            } 
            else if (preg_match('/win/i', $os) && preg_match('/NT 6.3/i', $os)) {
                $os = 'Windows 8.1';
            } 
            else if (preg_match('/win/i', $os) && preg_match('/NT 6.4/i', $os)) {
                $os = 'Windows 10';
            } 
            else if (preg_match('/win/i', $os) && preg_match('/NT 10.0/i', $os)) {
                $os = 'Windows 10';
            } 
            else if (preg_match('/win/i', $os)) {
                $os = 'Windows';
            } 
            else if (preg_match('/Macintosh/i', $os) && preg_match('/10[_.]9/i', $os)) {
                $os = 'macOS 10.9';
            } 
            else if (preg_match('/Macintosh/i', $os) && preg_match('/10[_.]10/i', $os)) {
                $os = 'macOS 10.10';
            } 
            else if (preg_match('/Macintosh/i', $os) && preg_match('/10[_.]11/i', $os)) {
                $os = 'macOS 10.11';
            } 
            else if (preg_match('/Macintosh/i', $os) && preg_match('/10[_.]12/i', $os)) {
                $os = 'macOS 10.12';
            } 
            else if (preg_match('/Macintosh/i', $os)) {
                $os = 'macOS';
            } 
            else if (preg_match('/iphone/i', $os) && preg_match('/7_/i', $os)) {
                $os = 'iphone ios7';
            } 
            else if (preg_match('/iphone/i', $os) && preg_match('/8_/i', $os)) {
                $os = 'iphone ios8';
            } 
            else if (preg_match('/iphone/i', $os) && preg_match('/9_/i', $os)) {
                $os = 'iphone ios9';
            } 
            else if (preg_match('/iphone/i', $os) && preg_match('/10_/i', $os)) {
                $os = 'iphone ios10';
            } 
            else if (preg_match('/iphone/i', $os) && preg_match('/11_/i', $os)) {
                $os = 'iphone ios11';
            } 
            else if (preg_match('/iphone/i', $os)) {
                $os = 'iphone ios6 or lower';
            } 
            else if (preg_match('/ipad/i', $os) && preg_match('/7_/i', $os)) {
                $os = 'ipad ios7';
            } 
            else if (preg_match('/ipad/i', $os) && preg_match('/8_/i', $os)) {
                $os = 'ipad ios8';
            } 
            else if (preg_match('/ipad/i', $os) && preg_match('/9_/i', $os)) {
                $os = 'ipad ios9';
            } 
            else if (preg_match('/ipad/i', $os) && preg_match('/10_/i', $os)) {
                $os = 'ipad ios10';
            } 
            else if (preg_match('/ipad/i', $os) && preg_match('/11_/i', $os)) {
                $os = 'ipad ios11';
            } 
            else if (preg_match('/ipad/i', $os)) {
                $os = 'ipad ios6 or lower';
            } 
            else if (preg_match('/like Mac/i', $os)) {
                $os = 'ios device';
            } 
            else if (preg_match('/Windows Phone/i', $os)) {
                $os = 'Windows Phone';
            } 
            else if (preg_match('/linux/i', $os)) {
                $os = 'Linux';
            } 
            else if (preg_match('/unix/i', $os)) {
                $os = 'Unix';
            } 
            else if (preg_match('/bsd/i', $os)) {
                $os = 'BSD';
            } 
            else {
                $os = 'Other';
            }
            return $os;
        } else {
            return 'unknow';
        }
    }
    // 获取浏览器信息
    function get_browser_info() {
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $browser = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/MSIE/i', $browser)) {
                $browser = 'MSIE';
            } else if (preg_match('/Firefox/i', $browser)) {
                $browser = 'Firefox';
            } else if (preg_match('/Chrome/i', $browser)) {
                $browser = 'Chrome';
            } else if (preg_match('/Safari/i', $browser)) {
                $browser = 'Safari';
            } else if (preg_match('/Opera/i', $browser)) {
                $browser = 'Opera';
            } else {
                $browser = 'Other';
            }
            return $browser;
        } else {
            return 'unknow';
        }
    }
    $conn = mysql_connect("127.0.0.1","root","Liutianyi@9999");
    if(!$conn){
        echo "数据库连接失败";
        exit;
    }
    mysql_select_db("liutianyi");

    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y.m.j");
    $time = date("H:i:s");
    $url = $_SERVER['HTTP_REFERER'];
    $os = get_os();
    $browser = get_browser_info();
    $agent = $_SERVER['HTTP_USER_AGENT'];
    mysql_query("insert into request (ip,date,time,url,os,browser,agent) values ('$ip','$date','$time','$url','$os','$browser','$agent')");
?>
<?php 
//ip判断是否初次访问
    $query_visitor = mysql_query("select * from uniqueIP where ip = '$ip'");
    $result = mysql_fetch_array($query_visitor);
    if($result == false){
        mysql_query("insert into uniqueIP (ip,date,time) values ('$ip','$date','$time')");
    }
?>