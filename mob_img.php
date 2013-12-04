<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

$url = $_GET['url'];
$file_name = $_GET['message_num'] . '.png';


//create image
exec('phantomjs screen_grab.js ' . $url . ' /var/www/proofhq/mob_img/' . $file_name);

//read from file
$img = file_get_contents('/var/www/proofhq/mob_img/' .$file_name);
//delete file

//return image to browser

$file = $cache_job;
$type = 'image/png';
header('Content-Type:' . $type);
header('Content-Length: ' . filesize($file));
echo($file_name);

?>