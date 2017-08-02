<?php 
    $db = "liutianyi";
    mysql_select_db($db);
    $sql = "select * from file_list";
    $query_filelist = mysql_query($sql);
    $filelist = mysql_fetch_assoc($query_filelist);
 ?>