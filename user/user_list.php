<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';

$err[] = '';

try
{
    $sql = 'SELECT id,name FROM users WHERE 1';
    $stmt = connect()->prepare($sql);
    $stmt->execute();
    $dbh = null;
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('user', $stmt);
$smarty->assign('err', $err);

if (isset($err['exception']) == false) {
    $smarty->display('../smarty/templates/user/user_list.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
