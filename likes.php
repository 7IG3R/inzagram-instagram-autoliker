<?php
session_start();
require('sys.php');	
date_default_timezone_set('Asia/India');

if(!isset($_SESSION['token']) || !isset($_SESSION['id'])){
header('Location: error.php');
session_start();
session_destroy();
} else {
$id = $_SESSION['id'];
$q = mysql_query("select * from user where id='$id'");
    $row = mysql_fetch_array($q);
    if (mysql_num_rows($q) == 1) {
        $nowDate = date("ymdHis"); 
        if ($nowDate < $row['limit']) {
header('location:limit.php');
session_start();
session_destroy();
} else {
$token = "https://api.instagram.com/v1/media/" . $_POST['liker'] ."/likes";
	
	$a = mysql_query("select * from user ORDER BY RAND() DESC LIMIT 30"); 
         while($b = mysql_fetch_array($a))
{
$posts = "access_token=" . $b['access_token'];
$curl = curl_init($token);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); 
		curl_setopt($curl, CURLOPT_POSTFIELDS, $posts);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$liker = curl_exec($curl);
		curl_close($curl);
}

$limitN = date('ymdHis', strtotime('+3 minute'));
          $sql = "UPDATE `user` set `limit`='{$limitN}' WHERE `id`='$id'";
              $result = mysql_query($sql);
              session_start();
              session_destroy();

header('location:done.php');
}
} else {
header('location:error.php');
session_start();
session_destroy();
}
}

?>