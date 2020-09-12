<?php
session_start();
require_once('system.php');
$result = mysql_query("SELECT * FROM user");
$num_rows = mysql_num_rows($result);
include'head.php';
?>

<div class="animated fadeIn">
	<div id="main">
		<div id="header">
			<div id="logo"> 
				<a href=""><img src="images/noimage.jpg" height="65" width="65"></a>
			</div>
			<div id="download"> 
				<a href="https://api.instagram.com/oauth/authorize/?client_id=43276520aeb04507bbdf961be965cf86&amp;redirect_uri=http://inzagram.tk/index.php&amp;response_type=code&amp;scope=likes+comments+relationships+basic"><div class="button">Login With Instagram</div></a>
			</div>
		</div>
		<div id="content">
			<h1>Hellow !</h1>
			<p> This Is Instagram Liker & autoFollower, You Can Access IT From Anywhere In The World. Be Happy, Enjoy The Life :)</p>
		</div>
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