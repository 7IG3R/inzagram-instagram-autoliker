# inzagram-instagram-autoliker

Hellow !

This Is Instagram Autoliker Script, A very very old script.

# Setup

First Create Instagram Client http://instagram.com/developer/clients/manage 
Change Redirect URL To : 
http://yourdomian/index.php

Open connect.php and find "https://api.instagram.com/oauth/authorize/?client_id=clientidhere&amp;redirect_uri=http://inzagram.tk/index.php&amp;response_type=code&amp;scope=likes+comments+relationships+basic"

Then Edit "clientidhere" With Your client_id (apps).
Edit system.php With Your Database Information.



Edit index.php

==============================
$access_token_parameters = array(

'client_id'                =>     'clientidhere',

'client_secret'            =>     'clientsecrethere',

'grant_type'               =>     'authorization_code',

'redirect_uri'             =>     'http://inzagram.tk/index.php', 
'code'                     =>     $code
	);
==============================

Change clientidhere With Your client_id (apps)
Change clientsecrethere With Your client_secret (apps)
Change http://inzagram.tk/index.php with your redirect_uri (apps)



Upload To Your Hosting
Import db.sql to phpmyadmin


___________Now_Done_With_The_Settings______________
**NO Admin Panel Here, Edit These Manually..


index.php
connect.php
limit.php
members.php
head.php






____DONE_____

Enjoy...





