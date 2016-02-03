  <?
  //word wrap with cut
function Cut($string, $max_length){
    if (strlen($string) > $max_length){
        $string = substr($string, 0, $max_length);
        $pos = strrpos($string, " ");
        if($pos === false) {
                return substr($string, 0, $max_length)."...";
        }
            return substr($string, 0, $pos)."...";
    }else{
        return $string;
    }
}


  	include('SetImap.php');
	$mailbox = new ImapMailbox('{mail.simplepanel.co.il:143/imap/novalidate-cert}'.MAILBOX_TYPE, USER_EMAIL, USER_PASSWORD, ATTACHMENTS_DIR, 'utf-8');
	$mails = array();

   // Get UNANSWERED
	$mailsIds = $mailbox->searchMailBox('ANSWERED');
	if(!$mailsIds) {
		echo 'Mailbox is empty';
	}
   ?>


		  <tbody id="mail_items_TB">
			<?	$mailsIds = array_reverse($mailsIds);
				foreach($mailsIds as &$value){
				$mail = $mailbox->getMail($value);
			?>
				<tr id="mail" value="<?=$value;?>" class="mail-item">
				  
				<td class="span1">
					<span class="label label-important">
						מייל
					</span>
				</td>
				<td class="span1">
					<span >
						<?if ($mail->getAttachments()) echo '<span class="fs1" aria-hidden="true" data-icon=""></span>';?>
					</span>
				</td>			  
				  <td class="span2 mailContact">
					 <?=$mail->fromName;?>   
				  </td>
				  
				  <td class="span8">
					
					<span class="mailSubject">
					  <?=$mail->subject;?>   
					</span>
					
					<span class="mailMessage">
					  - 
					  <a href="#">
						<?= Cut($mail->textPlain, 150);?>
					  </a>
					  
					</span>
					
				  </td>
				  
				</tr>
			<?}?>

		  </tbody>
		