<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/input_check.php';
require_once '../common/common.php';

try {
    $stock_data = validateStock($post, $smarty);
    $sql = 'INSERT INTO stocks(purchase_date,deadline,stock_name,price,number) VALUES (?,?,?,?,?)';
    $stmt = connect()->prepare($sql);
    $data[] = $stock_data['purchase_date'];
    $data[] = $stock_data['deadline'];
    $data[] = $stock_data['stock_name'];
    $data[] = $stock_data['price'];
    $data[] = $stock_data['number'];
    $stmt->execute($data);
    $dbh = null;
} catch (Exception $e) {
    err_common($e, $smarty);
}

$smarty->assign('title', "在庫登録");
$smarty->assign('stock_data', $stock_data);
$smarty->display('../smarty/templates/public/stock_register_done.tpl');
