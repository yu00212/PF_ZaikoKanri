<?php

require_once '../db_connect/db_connect.php';
require_once '../common/input_check.php';

try
{
    list($user_data, $err) = validateUser($post);
    $user_data['pass'] = password_hash($user_data['pass'], PASSWORD_DEFAULT);
    $sql = 'INSERT INTO users (name,email,password) VALUES (?,?,?)';
    $stmt = connect()->prepare($sql);
    $data[] = $user_data['name'];
    $data[] = $user_data['email'];
    $data[] = $user_data['pass'];
    $stmt->execute($data);
    $dbh = null;
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('user_data', $user_data);
$smarty->assign('err', $err);

if (isset($err['name']) == false && isset($err['email']) == false && isset($err['pass']) == false && isset($err['pass2']) == false && isset($err['exception']) == false) {
    $smarty->display('../smarty/templates/user/user_add_done.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
