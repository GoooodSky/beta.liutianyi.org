<!-- 保存访问者信息 -->
<?php
date_default_timezone_set("Asia/Shanghai");
function get_os() {
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $os = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/win/i', $os)) {
            $os = 'Windows';
        } else if (preg_match('/mac/i', $os)) {
            $os = 'MAC';
        } else if (preg_match('/linux/i', $os)) {
            $os = 'Linux';
        } else if (preg_match('/unix/i', $os)) {
            $os = 'Unix';
        } else if (preg_match('/bsd/i', $os)) {
            $os = 'BSD';
        } else {
            $os = 'Other';
        }
        return $os;
    } else {
        return 'unknow';
    }
}
function browser_info() {
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
function getRealIp()
{
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

	$db = "visitor";
	mysql_select_db($db);
	$ip = getRealIp();
	$date = date("Y.m.j");
	$time = date("H:i:s");
	$request = $_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]."/".$_SERVER["QUERY_STRING"];
	$os = get_os();
	$browser = browser_info();
    $agent = $_SERVER['HTTP_USER_AGENT'];
	mysql_query("insert into history (ip,date,time,request,os,browser,agent) values ('$ip','$date','$time','$request','$os','$browser','$agent')");
?>

<!-- 判断是否初次访问，并判断是第几个访问者 -->
<?php 
    $sql = "select * from user where ip = '$ip'";
    $query = mysql_query($sql);
    $result = mysql_fetch_array($query);
    if($result == true){
        $query = mysql_query("select id from user where ip = '$ip'");
        $num = mysql_fetch_array($query);
    }
    else{
        mysql_query("insert into user (ip,date,time) values ('$ip','$date','$time')");
        $query = mysql_query("select max(id) from user");
        $num = mysql_fetch_array($query);
    }
?>