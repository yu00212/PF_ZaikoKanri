<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';

$user_data['user_id'] = $_POST['user_id'];
$user_data['name'] = $_POST['name'];
$user_data['email'] = $_POST['email'];
$user_data['pass'] = $_POST['pass'];
$err[] = '';

try
{
    $sql = 'UPDATE users SET name = :name, email = :email, password = :pass WHERE id = :user_id';
    $stmt = connect()->prepare($sql);

    if (isset($user_data['user_id'])) {
        $data[':user_id'] = (int) $user_data['user_id'];
    }

    if (isset($user_data['name'])) {
        $data[':name'] = $user_data['name'];
    }

    if (isset($user_data['email'])) {
        $data[':email'] = $user_data['email'];
    }

    if (isset($user_data['pass'])) {
        $data[':pass'] = $user_data['pass'];
    }

    $stmt->execute($data);
    $dbh = null;
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('user_data', $user_data);
$smarty->assign('err', $err);

if (isset($err['exception']) == false) {
    $smarty->display('../smarty/templates/user/user_edit_done.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
