<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';

$user_id = $_POST['user_id'];
$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_pass = $_POST['pass'];
$err[] = '';

try
{
    $sql = 'UPDATE users SET name = :name, email = :email, password = :pass WHERE id = :user_id';
    $stmt = connect()->prepare($sql);

    if (isset($user_id)) {
        $data[':user_id'] = (int) $user_id;
    }

    if (isset($user_name)) {
        $data[':name'] = $user_name;
    }

    if (isset($user_email)) {
        $data[':email'] = $user_email;
    }

    if (isset($user_pass)) {
        $data[':pass'] = $user_pass;
    }

    $stmt->execute($data);
    $dbh = null;
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('err', $err);

if (isset($err['exception']) == '') {
    $smarty->display('../smarty/templates/user/user_edit_done.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
