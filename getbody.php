<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');

//Connect to mailbox
$mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", "rupert.edialog@gmail.com", "Elinorco26")
or die("can't connect: " . imap_last_error());
imap_errors();
imap_alerts();

/*if (!isset($_GET['message_num')) {
    exit();
}*/
 $mail_value  = $_GET['message_num'];
   
   //set message as read
   $status = imap_setflag_full($mbox, $mail_value, "\\Seen \\Flagged");
   
   //Get subject line and charset info
   $message_info = imap_fetch_overview($mbox, $mail_value);

	
   $subject_line = $message_info[0]->subject;
   $decoded_header = imap_mime_header_decode($subject_line);
   $subject = '';
   //print subject line and convert the string to UTF-8
   for($i=0; $i<count($decoded_header); $i++){

      if($decoded_header[$i]->charset=='default'){
		
		
		$subject = $subject . $decoded_header[$i]->text;
		
      }else{
   
        $subject = $subject . iconv ($decoded_header[$i]->charset , 'UTF-8' ,$decoded_header[$i]->text);
        
      }
   }
	//echo $subject;
	//Get the mime type
	$mime_type = imap_fetchstructure($mbox,$mail_value);
   //If its a text version then treat it differently
   if(($mime_type->subtype=='PLAIN') OR ($mime_type->subtype=='TEXT')){
  
  	   $text_flag = 'y';	
      //$body =  '<pre>' . imap_qprint(imap_body($mbox, $mail_value)) . '</pre>';
      $body = nl2br(imap_qprint(imap_body($mbox, $mail_value)));

   }else{
	   
  		$text_flag = 'n';
		$body = imap_qprint(imap_body($mbox, $mail_value));
      //get and print the body

   }
   
   //close connection
imap_close($mbox);

if(isset($_GET['just_mobile'])){
	
	//strip media query then echo
	$patterns = array();
	$patterns[0] = '~@media screen and \(max-device-width: [\d]+px\) {~';
	$patterns[1] = '~@media screen and \(max-width: [\d]+px\) {~';
	$patterns[2] = '~}[\n\r]+</style>~';
	$replacements = array();
	$replacements[0] = '';
	$replacements[1] = '';
	$replacements[2] = '</style>';
   	$body = preg_replace($patterns, $replacements, $body);

}