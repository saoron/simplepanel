<?
if ((int)$_POST["count"]==1) $desta = '../../../';
else $desta = $dest;
require_once($desta.'class/class.ImapMailbox.php');

// IMAP must be enabled
define('USER_EMAIL', 'support@simplepanel.co.il');
define('USER_PASSWORD', 'support_this_now!');

define('ATTACHMENTS_DIR', $desta.'components/flight/attachments');  
define('MAILBOX_TYPE', 'INBOX'); 
define('MAILBOX_TYPE_SENT', 'INBOX.Sent'); 
define('MAILBOX_TYPE_TRASH', 'INBOX.Trash'); 


$mailbox = new ImapMailbox('{mail.simplepanel.co.il:143/imap/novalidate-cert}'.MAILBOX_TYPE, USER_EMAIL, USER_PASSWORD, ATTACHMENTS_DIR, 'utf-8');
$mails = array();


?>