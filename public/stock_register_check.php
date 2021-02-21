<?php

require_once '../login_certification/certification.php';
certification();

require_once '../common/smarty.php';
require_once '../common/input_check.php';

$stock_data = validateStock($post, $smarty);

if(isset($stock_data) == true) {
	$smarty->assign('title', "在庫登録");
	$smarty->assign('stock_data', $stock_data);
	$smarty->display('../smarty/templates/public/stock_register_check.tpl');
}

