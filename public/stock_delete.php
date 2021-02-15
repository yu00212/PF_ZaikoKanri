<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/get_data.php';
require_once '../common/common.php';

$stock_id = $_GET['stock_id'];
$err[] = '';

// 暗号学的的に安全なランダムなバイナリを生成し、それを16進数に変換することでASCII文字列に変換
$toke_byte = openssl_random_pseudo_bytes(16);
$token = bin2hex($toke_byte);
// 生成したトークンをセッションに保存
$_SESSION['token'] = $token;

try
{
    getStockById($stock_id);
    $stock_data = getStockById($stock_id);
    $dbh = null;
} catch (Exception $e) {
    err_common($e, $smarty);
}

$smarty->assign('token', $token);
$smarty->assign('stock_data', $stock_data);
$smarty->display('../smarty/templates/public/stock_delete.tpl');
