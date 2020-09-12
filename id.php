<?php include'head.php';?>
<div class="animated fadeIn">
	<div id="main">
	<form action="" method="post">
		<div id="header">
			<div id="logo"> 
				<a href="getmediaid.php"><img src="img/noimage.jpg" height="65" width="65"></a>
			</div>
			<div id="download"> 
			<input type="submit" class="button" value="Search Now">
			</div>
		</div>
		<div id="content">
			<center><br><h1>Please Input The Photo URL !!! </h1><br><input class="textbox"type="text" name="url">
<?php
if(isset($_POST['url'])){
$token = "http://api.instagram.com/oembed?url=". $_POST['url'];
$api = file_get_contents("http://api.instagram.com/oembed?callback=&url=". $_POST['url']);      
$media_id = json_decode($api,true)['media_id'];
$curl = curl_init($token);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($curl);
curl_close($curl);
$json = json_decode($result, true);
echo "<br><br><h1>" . $json['media_id'] . "</h1>";
}
?>
			</center>
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