<?php
require_once('../login_certification/certification.php');
certification();

require_once '../common/smarty.php';

$smarty->assign('title', "ログアウト");
$smarty->display('../smarty/templates/user_login/logout_check.tpl');
?>
