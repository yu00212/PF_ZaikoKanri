<?php
require_once '../login_certification/certification.php';
certification();

require_once '../common/smarty.php';

$smarty->assign('title', "在庫登録");
$smarty->display('../smarty/templates/public/stock_register.tpl');
