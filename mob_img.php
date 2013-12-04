<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

$url = 'http://www.bbc.co.uk';
$file_name = '2bbc.png';

$html = '<html><b>Hello</b></html>';

//create image
exec('phantomjs screen_grab.js ' . $html . ' /var/www/proofhq/mob_img/' . $file_name);
//exec('phantomjs /var/www/proofhq/screen_grab.js http://bbc.co.uk bbc.png');
//echo exec('whoami');


//read from file
$img = file_get_contents('/var/www/proofhq/mob_img/' .$file_name);
//delete file

//return image to browser

$file = $cache_job;
$type = 'image/png';
header('Content-Type:' . $type);
header('Content-Length: ' . filesize($file));
echo($img);

?>