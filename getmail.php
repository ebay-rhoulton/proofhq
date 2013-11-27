<?php

/*To do
 * 1. Combine the same HTML/Text versions
 *
 * Done
 * 1. Sort subject line encoding issue
 * 2. Sort text version aligment issue
 * 3. Sort subject line look make it look nicer
 * 4. Add remove text version
 */

error_reporting(E_ALL);
ini_set('display_errors','1');


//Connect to mailbox
$mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", "rupert.edialog@gmail.com", "Elinorco26")
or die("can't connect: " . imap_last_error());
imap_errors();
imap_alerts();

//Search mailbox for any message that has a subject line with
$mail = imap_search($mbox,'UNSEEN SUBJECT "'.$_GET['cell_id'].'"');


   //sort throught message array to remove text versions
   if($_GET['text_flag']=='n'){
      
      $i = 0; //set new array counter
      
      //create a temp array
      $temp_message_array = $mail;
      //clear old array
      unset($mail);
      foreach($temp_message_array as $message_num){
         
         //get the message details
         $message_structure = imap_fetchstructure($mbox,$message_num);
         
         //if the message is not plain text then add to messsage array
         if($message_structure->subtype<>'PLAIN'){
             
            $mail[$i] = $message_num;
            $i++;
           
         }
      }
   }
       //return message number array
      echo json_encode($mail);

//close connection
imap_close($mbox);
?>
