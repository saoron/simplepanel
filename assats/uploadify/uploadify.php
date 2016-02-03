<?PHP
session_id($_GET["PHPSESSID"]);
session_start();

	require_once('../../class/class.include.php');
	$dest = new getDestination($_SERVER['REQUEST_URI']);
	require_once($dest.'class/class.log.php');
	require_once($dest.'shadow/user_hanlde.php');
	require_once($dest.'class/class.gallery.php');
	//photo handler
	require_once($dest.'class/class.photo.php');
	$connection->connect();

	if (!empty($_FILES)) {
	$folder = (int)$_POST["gid"];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/gallery/'.$folder;
		//create user folder if new
		if (!is_dir($targetPath)) {
			mkdir($targetPath, 0755);
		}
		$tempFile = $_FILES['Filedata']['tmp_name'];
		$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
		
		// Validate the file type
		$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
		$fileParts = pathinfo($_FILES['Filedata']['name']);
		
		if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
			move_uploaded_file($tempFile,$targetFile);
			$pic = new Photo($connection);
			echo $pic->AddPhoto($_FILES['Filedata']['name'], '', $folder);
			
		} else {
			echo 'Invalid file type.';
		}
	}
?>