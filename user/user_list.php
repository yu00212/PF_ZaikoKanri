<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/common.php';

$err[] = '';

try
{
    $sql = 'SELECT id,name FROM users WHERE 1';
    $stmt = connect()->prepare($sql);
    $stmt->execute();
    $dbh = null;
} catch (Exception $e) {
    err_common($e, $smarty);
}

$smarty->assign('user', $stmt);
$smarty->display('../smarty/templates/user/user_list.tpl');
