<?php 
error_reporting(E_ALL);
ini_set('display_errors','1');
//Connect to mailbox
$mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", "rupert.edialog@gmail.com", "Elinorco26")
or die("can't connect: " . imap_last_error());
imap_errors();
imap_alerts();
	
   $subject_line = "[l proof|H]";
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
      // print_r($decoded_header[$i]);
      if($decoded_header[$i]->charset=='default'){
		
        // echo $decoded_header[$i]->text;
		
		$subject = $subject . $decoded_header[$i]->text;
		
		
      }else{
         //echo iconv ($decoded_header[$i]->charset , 'UTF-8' ,$decoded_header[$i]->text);
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
   	echo preg_replace($patterns, $replacements, $body);

	

}else{
	
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
   <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;" bgcolor="#FFFFFF">
   <tr><td>
   <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="padding: 5px; font-family: Arial, sans-serif; font-size: 17px; line-height: 20px; color: #fff; background-color: #0064d2; text-decoration: none; border: #0064d2; border-style: solid; border-width: 2px;"><strong>Subject line</strong></td>
	</tr>
	<tr>
		<td style="font-family: Arial, sans-serif; font-size: 17px; line-height: 20px; color: #0064d2; text-decoration: none; border: #0064d2; border-style: solid; border-width: 2px; padding: 5px;"><?php echo $subject; ?></td></tr></table>
        
        <?php 
		echo $body; 
		if(($_GET['mobile_flag']=='y') and ($text_flag == 'n')){ ?>
        
        
      <!--Only use for mobile-->
      
      <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
	<tr>
		<td style="padding: 5px; font-family: Arial, sans-serif; font-size: 17px; line-height: 20px; color: #fff; background-color: #0064d2; text-decoration: none; border: #0064d2; border-style: solid; border-width: 2px;"><strong>Mobile Version</strong></td>
	</tr></table>
      
      
      <tr><td align="center">
  
  <script language="JavaScript">

		/*
		 * When the iframe is on a different subdomain, uncomment the following line
		 * and change "example.com" to your domain.
		 */
		// document.domain = "example.com";
		function setIframeHeight(iframe) {
			if (iframe) {
				var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
				if (iframeWin.document.body) {
					iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
				}
			}
		};

		window.onload = function () {
			setIframeHeight(document.getElementById('mob_version'));
		};
	
</script>
<style>
.clear{clear: both;}
#top{height:100px; z-index:1; margin-top:20px; position:relative; top: 0px}
#phone_body{ margin-top: 45px; background-image:url(images/iphone_frame_border.png); background-repeat:repeat-y; background-position:center; z-index:0; position:relative; top: -250px}
#bottom{position:relative; top: -250px}
</style>

<div id="top"><img src="images/iphone_frame_top.png"/></div>
<div id="phone_body">
<iframe scrolling="" src="http://ec2-54-229-74-229.eu-west-1.compute.amazonaws.com/proofhq/getcontent.php?message_num=<?php echo $mail_value; ?>&mobile_flag=n&just_mobile=y" width="383px" height="100%" id="mob_version" marginheight="0" frameborder="0" ></iframe>
</div>
<div id="bottom"><img src="images/iphone_frame_bottom.png"/></div>
</div>

</td></tr><?php } ?></table><?php } //end of is set for just mobile?>