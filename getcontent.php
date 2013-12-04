<?php require 'getbody.php'; ?>
<?php require 'mob_img.php'; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
   <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;" bgcolor="#FFFFFF">
   <tr><td>
   <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="padding: 5px; font-family: Arial, sans-serif; font-size: 17px; line-height: 20px; color: #fff; background-color: #0064d2; text-decoration: none; border: #0064d2; border-style: solid; border-width: 2px;"><strong>Subject line</strong></td>
	</tr>
	<tr>
		<td style="font-family: Arial, sans-serif; font-size: 17px; line-height: 20px; color: #0064d2; text-decoration: none; border: #0064d2; border-style: solid; border-width: 2px; padding: 5px;"><?php echo $subject; ?></td></tr></table>
        
        <?php echo $body . '</table>'; if($_GET['mobile_flag']==='y'){ ?>

 <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
	<tr>
		<td style="padding: 5px; font-family: Arial, sans-serif; font-size: 17px; line-height: 20px; color: #fff; background-color: #0064d2; text-decoration: none; border: #0064d2; border-style: solid; border-width: 2px;"><strong>Mobile Version</strong></td>
	</tr>
      
      
        <tr><td align="center"><img src="http://ec2-54-229-74-229.eu-west-1.compute.amazonaws.com/proofhq/mob_img/<?php echo mob_image($mail_value, $proof_version);  ?>" /></td></tr></table><?php  }?>