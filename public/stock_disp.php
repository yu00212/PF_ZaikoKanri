<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/get_data.php';
require_once '../common/common.php';

$stock_id = $_GET['stock_id'];
$err[] = '';

try
{
    getStockById($stock_id);
    $stock_data = getStockById($stock_id);
    $dbh = null;
} catch (Exception $e) {
    err_common($e, $smarty);
}

$smarty->assign('stock_data', $stock_data);
$smarty->display('../smarty/templates/public/stock_disp.tpl');
