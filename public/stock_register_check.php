<?php

require_once '../login_certification/certification.php';
certification();

require_once '../common/smarty.php';
require_once '../common/input_check.php';

list($stock_data, $err) = validateStock($post);

$smarty->assign('stock_data', $stock_data);
$smarty->assign('err', $err);

if (isset($err['purchase_date']) == false && isset($err['stock_deadline']) == false && isset($err['stock_name']) == false && isset($err['stock_price']) == false && isset($err['stock_number']) == false) {
    $smarty->display('../smarty/templates/public/stock_register_check.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
