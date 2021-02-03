<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/get_data.php';

$stock_id = $_GET['stock_id'];
$err[] = '';

try
{
    getStockById($stock_id);
    $stock_data = getStockById($stock_id);
    $dbh = null;
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('stock_data', $stock_data);
$smarty->assign('err', $err);

if (isset($err['exception']) == false) {
    $smarty->display('../smarty/templates/public/stock_disp.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
