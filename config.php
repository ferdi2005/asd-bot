<?php

// Bot data
$bot_api_key  = '';
$bot_username = '';
$hook_url     = '';

// Database data
$mysql_url = 'localhost';
$mysql_db = '';
$mysql_user = '';
$mysql_pass = '';

// Create connection
$conn = new mysqli($mysql_url, $mysql_user, $mysql_pass, $mysql_db);
