<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/get_data.php';
require_once '../common/common.php';

$user_id = $_GET['user_id'];
$err[] = '';

try
{
    $sql = 'SELECT id,name,email FROM users WHERE id = ?';
    getUserByID($sql, $user_id);
    $user_data = getUserByID($sql, $user_id);
    $dbh = null;
} catch (Exception $e) {
    err_common($e, $smarty);
}

$smarty->assign('user_data', $user_data);
$smarty->display('../smarty/templates/user/user_delete.tpl');
