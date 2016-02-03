<?

require_once('SetImap.php');

// Get some mail
$mailsIds = $mailbox->searchMailBox('UNANSWERED');
if(!$mailsIds) {
	//echo 'Mailbox is empty';
}

echo count($mailsIds);

?>