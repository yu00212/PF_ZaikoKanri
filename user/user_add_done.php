<?php

require_once '../db_connect/db_connect.php';
require_once '../common/input_check.php';
require_once '../common/common.php';

try
{
    $user_data = validateUser($post, $smarty);
    $user_data['pass'] = password_hash($user_data['pass'], PASSWORD_DEFAULT);
    $sql = 'INSERT INTO users (name,email,password) VALUES (?,?,?)';
    $stmt = connect()->prepare($sql);
    $data[] = $user_data['name'];
    $data[] = $user_data['email'];
    $data[] = $user_data['pass'];
    $stmt->execute($data);
    $dbh = null;
} catch (Exception $e) {
    err_common($e, $smarty);
}

$smarty->assign('user_data', $user_data);
$smarty->display('../smarty/templates/user/user_add_done.tpl');
