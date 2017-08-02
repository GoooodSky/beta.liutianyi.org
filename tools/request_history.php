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
            else if (preg_match('/Macintosh/i', $os) && preg_match('/10_9/i', $os)) {
                $os = 'macOS 10.9';
            } 
            else if (preg_match('/Macintosh/i', $os) && preg_match('/10_10/i', $os)) {
                $os = 'macOS 10.10';
            } 
            else if (preg_match('/Macintosh/i', $os) && preg_match('/10_11/i', $os)) {
                $os = 'macOS 10.11';
            } 
            else if (preg_match('/Macintosh/i', $os) && preg_match('/10_12/i', $os)) {
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
    // 获取真实IP
    function get_ip(){
          $ip=false;
          if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"];
          }
          if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
            for ($i = 0; $i < count($ips); $i++) {
              if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
              }
            }
          }
          return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }

    $db = "liutianyi";
    mysql_select_db($db);
    $ip = get_ip();
    $date = date("Y.m.j");
    $time = date("H:i:s");
    $request = $_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]."/".$_SERVER["QUERY_STRING"];
    $os = get_os();
    $browser = get_browser_info();
    $agent = $_SERVER['HTTP_USER_AGENT'];
    mysql_query("insert into request_history (ip,date,time,request,os,browser,agent) values ('$ip','$date','$time','$request','$os','$browser','$agent')");
?>

<?php 
//判断是否初次访问，并判断是第几个访问者
    $query_visitor = mysql_query("select * from visitor where ip = '$ip'");
    $result = mysql_fetch_array($query_visitor);
    if($result == true){
        $query = mysql_query("select id from visitor where ip = '$ip'");
        $num = mysql_fetch_array($query);
    }
    else{
        mysql_query("insert into visitor (ip,date,time) values ('$ip','$date','$time')");
        $query = mysql_query("select max(id) from visitor");
        $num = mysql_fetch_array($query);
    }
?>

<?php
//判断今日访问量
    $query_freq = mysql_query("select * from request_history where date = '$date'");
    $freq = mysql_num_rows($query_freq);  
?>


