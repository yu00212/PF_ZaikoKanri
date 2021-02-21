<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/common.php';

$stock_id = $_POST['stock_id'];
$err[] = '';

if (isset($_POST["token"]) && $_POST["token"] === $_SESSION['token']) {
    try {
        $sql = 'DELETE FROM stocks WHERE stock_id = ?';
        $stmt = connect()->prepare($sql);
        $data[] = $stock_id;
        $stmt->execute($data);
        $dbh = null;
    } catch (Exception $e) {
        err_common($e, $smarty);
    }
} else {
    $err['token'] = '不正なリクエストです';
}

if (isset($err['token']) == false) {
	$smarty->assign('title', "在庫削除");
    $smarty->display('../smarty/templates/public/stock_delete_done.tpl');
} else {
	$smarty->assign('title', "エラー");
	$smarty->assign('err', $err);
    $smarty->display('../smarty/templates/err.tpl');
}
