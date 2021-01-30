<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';

$stock_id = $_GET['stock_id'];
$err[] = '';

try
{
    $sql = 'SELECT stock_id,purchase_date,deadline,stock_name,price,number FROM stocks WHERE stock_id = ?';
    $stmt = connect()->prepare($sql);
    $data[] = $stock_id;
    $stmt->execute($data);
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $stock_purchase_date = $rec['purchase_date'];
    $stock_deadline = $rec['deadline'];
    $stock_name = $rec['stock_name'];
    $stock_price = $rec['price'];
    $stock_number = $rec['number'];
    $dbh = null;
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('stock_purchase_date', $stock_purchase_date);
$smarty->assign('stock_deadline', $stock_deadline);
$smarty->assign('stock_name', $stock_name);
$smarty->assign('stock_price', $stock_price);
$smarty->assign('stock_number', $stock_number);
$smarty->assign('err', $err);

if (isset($err['exception']) == '') {
    $smarty->display('../smarty/templates/public/stock_disp.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
