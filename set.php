<?php
require 'config.php';
$response = file_get_contents('http://api.telegram.org/bot'.  $bot_api_key . '/setWebhook?url='. $hook_url);
echo($response);
