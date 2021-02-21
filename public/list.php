<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/common.php';

$err[] = '';

try {
    $sql = 'SELECT stock_id,purchase_date,deadline,stock_name,price,number FROM stocks WHERE 1';
    $stmt = connect()->prepare($sql);
    $stmt->execute();
    $dbh = null;
} catch (Exception $e) {
    err_common($e, $smarty);
}

$smarty->assign('title', "在庫一覧");
$smarty->assign('stock', $stmt);
$smarty->display('../smarty/templates/public/list.tpl');
