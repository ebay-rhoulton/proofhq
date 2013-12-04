<?php require 'getbody.php'; ?>
<?php require 'mob_img.php'; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
<body bgcolor="#FFFFFF">
   <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;" bgcolor="#FFFFFF">
   <tr><td>
   <table align="center" width="70%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="padding: 5px; font-family: Arial, sans-serif; font-size: 17px; line-height: 20px; color: #fff; background-color: #0064d2; text-decoration: none; border: #0064d2; border-style: solid; border-width: 2px;"><strong>Subject line</strong></td>
	</tr>
	<tr>
            <td style="font-family: Arial, sans-serif; font-size: 17px; line-height: 20px; color: #0064d2; text-decoration: none; border: #0064d2; border-style: solid; border-width: 2px; padding: 5px;"><?php echo $subject; ?></td></tr>
        
        <tr><td style="padding-top: 10px;"><?php echo $body . '</td></tr></table>'; if($_GET['mobile_flag']==='y' and $text_flag === 'n'){ ?>

  <table align="center" width="70%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
	<tr>
		<td style="padding: 5px; font-family: Arial, sans-serif; font-size: 17px; line-height: 20px; color: #fff; background-color: #0064d2; text-decoration: none; border: #0064d2; border-style: solid; border-width: 2px;"><strong>Mobile Version</strong></td>
	</tr>
      
      
        <tr><td align="center">
        
                <style>
.clear{clear: both;}
#top{height:100px; z-index:1; position:relative; top: 0px}
#phone_body{ margin-top: 45px; background-image:url(images/iphone_border.png); background-repeat:repeat-y; background-position:center; z-index:0; position:relative; top: -345px}
#phone_body img{ margin-left:25px;}
#bottom{position:relative; top: -360px}
</style>

<div id="top"><img src="images/iphone_top.png"/></div>
<div id="phone_body">
<img src="http://ec2-54-229-74-229.eu-west-1.compute.amazonaws.com/proofhq/mob_img/<?php echo mob_image($mail_value, $proof_version);  ?>"/>
</div>
<div id="bottom"><img src="images/iphone_bottom.png"/></div>
</div>
        
        
        </td></tr></table>
        
            <?php  }?></body>