<?php

require_once '../db_connect/db_connect.php';

$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_pass = $_POST['pass'];
$err[] = '';

try
{
    $sql = 'INSERT INTO users (name,email,password) VALUES (?,?,?)';
    $stmt = connect()->prepare($sql);
    $data[] = $user_name;
    $data[] = $user_email;
    $data[] = $user_pass;
    $stmt->execute($data);
    $dbh = null;
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('user_name', $user_name);
$smarty->assign('err', $err);

if (isset($err['exception']) == false) {
    $smarty->display('../smarty/templates/user/user_add_done.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
