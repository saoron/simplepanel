<?
require_once($dest.'class/class.header.php');
$head_tag = new Header();
$head_tag->insertHeader('<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>');
$head_tag->insertHeader('<link href="'.$dest.'icomoon/style.css" rel="stylesheet">');
$head_tag->insertHeader('<!--[if lte IE 7]><script src="'.$dest.'css/icomoon-font/lte-ie7.js">    </script>    <![endif]-->');
$head_tag->insertHeader('<link href="'.$dest.'css/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet">');
$head_tag->insertHeader('<link href="'.$dest.'css/wysiwyg/wysiwyg-color.css" rel="stylesheet">');
$head_tag->insertHeader('<link href="'.$dest.'css/main.css" rel="stylesheet">');
$head_tag->insertHeader('<link href="'.$dest.'css/custom.css" rel="stylesheet">');
$head_tag->insertHeader('<link href="'.$dest.'css/charts-graphs.css" rel="stylesheet">');
//js
$head_tag->insertHeader('<script src="'.$dest.'js/jquery.min.js"></script>'); //jquery
?>
 