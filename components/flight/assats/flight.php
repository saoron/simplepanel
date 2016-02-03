<?
if (letter_en($_GET["q"])=='inbox' ){  $input = MAILBOX_TYPE; $tpe='UNANSWERED';}
if (letter_en($_GET["q"])=='archive'){ $input = MAILBOX_TYPE; $tpe='ANSWERED'; }
else if (letter_en($_GET["q"])=='sent'){ $input = MAILBOX_TYPE_SENT;   }  
else if (letter_en($_GET["q"])=='trash'){ $input = MAILBOX_TYPE_TRASH;   }   

   $mailbox = new ImapMailbox('{mail.simplepanel.co.il:143/imap/novalidate-cert}'.$input, USER_EMAIL, USER_PASSWORD, ATTACHMENTS_DIR, 'utf-8');
	$mails = array();
   // Get UNANSWERED
	$mailsIds = $mailbox->searchMailBox($tpe);
	if(!$mailsIds && letter_en($_GET["q"])=='inbox') {
		redirect('index.php?q=archive');
	}
   ?>

   <div class="container-fluid">
      <div class="row-fluid">
	  
 

        <div id="mail_panel" class="span10 full">

		<table id="mail_items" class="hero-unit table table-hover rtl" style="background-color: #FFFFFF">
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
				  <td class="span2 mailContact bigandbright">
					 <?=$mail->fromName;?>   
				  </td>
				  
				  <td class="span8">
					
					<span class="mailSubject">
					  <?=$mail->subject;?>   
					</span>
					
					<span class="mailMessage">
					  - 
					  <a href="#">
						<?= Cut($mail->textPlain, 100);?>
					  </a>
					  
					</span>
					
				  </td>
				  
				</tr>
			<?}?>

		  </tbody>
		</table>
		
        </div>
      </div>
    </div>

    <div id="compose_box" class="compose-box modal hide fade in"></div>

    <div id="move_to_selector" class="move-to-selector hide"></div>


