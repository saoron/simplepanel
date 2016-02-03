   <?
	if (letter_en($_GET["q"])=='inbox' ){  $input = MAILBOX_TYPE; $tpe='UNANSWERED';}
	if (letter_en($_GET["q"])=='archive'){ $input = MAILBOX_TYPE; $tpe='ANSWERED'; }
	else if (letter_en($_GET["q"])=='sent'){ $input = MAILBOX_TYPE_SENT;   }  
	else if (letter_en($_GET["q"])=='trash'){ $input = MAILBOX_TYPE_TRASH;   }   

   $mailbox = new ImapMailbox('{mail.simplepanel.co.il:143/imap/novalidate-cert}'.$input, USER_EMAIL, USER_PASSWORD, ATTACHMENTS_DIR, 'utf-8');
	$mails = array();

	$mail = $mailbox->getMail((int)$_GET["id"]);
	$mailbox->markMailAsAnswered(array($mail->id));
   ?>

   <div class="container-fluid">
      <div class="row-fluid">
	  
 

        <div id="mail_panel" class="span10 full">

          <div id="mail_controls" class="btn-toolbar" style="margin: 0 0 13px">
            <div class="btn-group fix_grp">
              <button id="delete_mail" class="btn mail-action rtl" ><i class="icon-trash"></i>מחק</button>
              <button id="forward" class="btn compose mail-action single-item rtl" ><i class="icon-arrow-right"></i>העבר</button>
              <button id="reply" class="btn compose mail-action single-item rtl" ><i class="icon-pencil"></i>הגב</button>
            </div>
          </div>

			<div class="span12 well rtl">
			<form accept-charset="UTF-8" action="" method="POST">

				<h3 class="pull-right"><?=$mail->subject;?></h3>				<h6 class="right gray frm_mail"><?=$mail->fromAddress;?></h6> 
				<?=$mail->getAttachments()?'<h6 class="left gray"><span class="fs1" aria-hidden="true" data-icon="">הורד קובץ</span></h6>':'';?>
				<br><br>
				<hr class="hr-stylish-1">

				<div class="mail_text right"><?=  ($mail->textHtml);?></div>
				
			</form>
		</div>
		
        </div>
      </div>
    </div>

    <div id="compose_box" class="compose-box modal hide fade in"></div>

    <div id="move_to_selector" class="move-to-selector hide"></div>


