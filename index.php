<?php 
session_start();
require_once('sys.php');

if($_GET['code']) {
$code = $_GET['code'];
$url = "https://api.instagram.com/oauth/access_token";
$access_token_parameters = array(
'client_id'                =>     '43276520aeb04507bbdf961be965cf86',
'client_secret'            =>     '820b15a0729548c9bb19b966a81a8d33',
'grant_type'               =>     'authorization_code',
'redirect_uri'             =>     'http://inzagram.tk/index.php',
'code'                     =>     $code
	);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST,true);
curl_setopt($curl, CURLOPT_POSTFIELDS,$access_token_parameters); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($curl);
curl_close($curl);	
$arr = json_decode($result,true);
require('sys.php');	
if($arr['code']){	
header('Location: /');
exit;
} else {
$id = $arr['user']['id'];
$query = mysql_query("select * from user where id='$id'");
if (mysql_num_rows($query) == 1) {
$sql = "UPDATE `user` SET `full_name`='".$arr['user']['full_name']."',`username`='".$arr['user']['username']."',`access_token`='".$arr['access_token']."' WHERE id='$id'";
$result = mysql_query($sql);
$_SESSION['token'] = $arr['access_token'];
$_SESSION['id'] = $arr['user']['id'];
?>
<?php include'head.php';?>
<div class="animated fadeIn">
	<div id="main">
		<form action="likes.php" method="post">
		<div id="header">
			<div id="logo"> 
				<a href="http://instagram.com/<?php echo $arr['user']['username']; ?>"><img src="<?php echo $arr['user']['profile_picture']; ?>" height="65" width="65"></a>
			</div>
			<div id="namedesc">
				<h1><?php echo $arr['user']['full_name']; ?></h1>
				<p><?php echo $arr['user']['username']; ?></p>
			</div>
			<div id="download"> 
			<input type="submit" class="button" value="Like!!"></a> 
			</div>
		</div>
		<div id="content">
			<center><br><h1>Please Input The Media Id !!! </h1><br><input class="textbox"type="text" name="liker"></center>
		</div>
		</form>
		<div id="footer">
			<div id="currentlyavailable">
				<img src="img/available.png"><p>Currently Available</p>
			</div>
			<div id="footerlinks">
				<p><a href="members.php" class="current">Members</a> - <a href="id.php">Get Media ID ?</a></p>
			</div>
		</div>
	</div>
</div>
</body>
<?php
} else {
$sql = "INSERT INTO `user`(`id`, `full_name`, `username`, `access_token`, `limit`) VALUES ('".$id."','".$arr['user']['full_name']."','".$arr['user']['username']."','".$arr['access_token']."','140124120937')";
$result = mysql_query($sql);
$_SESSION['token'] = $arr['access_token'];
$_SESSION['id'] = $arr['user']['id'];
?>
<?php include'head.php';?>
<div class="animated fadeIn">
	<div id="main">
		<form action="likes.php" method="post">
		<div id="header">
			<div id="logo"> 
				<a href="http://instagram.com/<?php echo $arr['user']['username']; ?>"><img src="<?php echo $arr['user']['profile_picture']; ?>" height="65" width="65"></a>
			</div>
			<div id="namedesc">
				<h1><?php echo $arr['user']['full_name']; ?></h1>
				<p><?php echo $arr['user']['username']; ?></p>
			</div>
			<div id="download"> 
			<input type="submit" class="button" value="Like!!"></a> 
			</div>
		</div>
		<div id="content">
			<center><br><h1>Please Input The Media Id !!! </h1><br><input class="textbox"type="text"></center>
		</div>
		</form>
		<div id="footer">
			<div id="currentlyavailable">
				<img src="img/available.png"><p>Currently Available</p>
			</div>
			<div id="footerlinks">
				<p><a href="members.php" class="current">Members</a> - <a href="id.php">Get Media ID ?</a></p>
			</div>
		</div>
	</div>
</div>
</body>
<?php
}
}
} else {
header('Location:/');
exit;
}
?>