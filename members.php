<?php
require_once('sys.php');
$result = mysql_query("SELECT * FROM user");
$tot = mysql_num_rows($result);
?>
<?php include'head.php';?>
<div class="animated fadeIn">
	<div id="main">
		<div id="header">
			<div id="logo"> 
				<a href=""><img src="img/noimage.jpg" height="65" width="65"></a>
			</div>
		</div>
		<div id="content"><br>
			<center><h1>Members</h1>
			<p><b>Members : <font size="+1" color="green"><?php echo $tot; ?></font> :) </b></p></center>
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
