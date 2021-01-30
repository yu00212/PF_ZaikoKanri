<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';

$user_id = $_GET['user_id'];
$err[] = '';

try
{
    $sql = 'SELECT name,email FROM users WHERE id = ?';
    $stmt = connect()->prepare($sql);
    $data[] = $user_id;
    $stmt->execute($data);
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_name = $rec['name'];
    $user_email = $rec['email'];
    $dbh = null;
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('user_id', $user_id);
$smarty->assign('user_name', $user_name);
$smarty->assign('user_email', $user_email);
$smarty->assign('err', $err);

if (isset($err['exception']) == '') {
    $smarty->display('../smarty/templates/user/user_delete.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
