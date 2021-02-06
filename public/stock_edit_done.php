<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/input_check.php';

try
{

    list($stock_data, $err) = validateStock($post);

    $sql = 'UPDATE stocks SET purchase_date = :purchase_date,deadline = :deadline,stock_name = :stock_name,price = :price,number = :number WHERE stock_id = :stock_id';
    $stmt = connect()->prepare($sql);

    if (isset($stock_data['stock_id'])) {
        $data[':stock_id'] = (int) $stock_data['stock_id'];
    }

    if (isset($stock_data['purchase_date'])) {
        $data[':purchase_date'] = $stock_data['purchase_date'];
    }

    if (isset($stock_data['deadline'])) {
        $data[':deadline'] = $stock_data['deadline'];
    }

    if (isset($stock_data['stock_name'])) {
        $data[':stock_name'] = $stock_data['stock_name'];
    }

    if (isset($stock_data['price'])) {
        $data[':price'] = (int) $stock_data['price'];
    }

    if (isset($stock_data['number'])) {
        $data[':number'] = (int) $stock_data['number'];
    }

    $stmt->execute($data);
    $dbh = null;
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('err', $err);

if (isset($err['purchase_date']) == false && isset($err['stock_deadline']) == false && isset($err['stock_name']) == false && isset($err['stock_price']) == false && isset($err['stock_number']) == false && isset($err['exception']) == false) {
    $smarty->display('../smarty/templates/public/stock_edit_done.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
