<?php echo 'im here';
include 'getbody.php' ?>
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

          </td></tr><?php } ?></table><?php }?>