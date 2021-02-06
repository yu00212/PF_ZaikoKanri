<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/input_check.php';

try
{
    list($stock_data, $err) = validateStock($post);
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
    $err['exception'] = $e->getMessage();
}

$smarty->assign('stock_data', $stock_data);
$smarty->assign('err', $err);

if (isset($err['purchase_date']) == false && isset($err['stock_deadline']) == false && isset($err['stock_name']) == false && isset($err['stock_price']) == false && isset($err['stock_number']) == false && isset($err['exception']) == false) {
    $smarty->display('../smarty/templates/public/stock_register_done.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
