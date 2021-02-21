<?php
session_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()]) == true)
{
	setcookie(session_name(),'',time()-4200,'/');
}
session_destroy();

require_once '../common/smarty.php';

$smarty->assign('title', "ログアウト");
$smarty->display('../smarty/templates/user_login/logout.tpl');
?>
