<?php

require_once '../db_connect/db_connect.php';

if (!empty($_POST['email'])) {
    $user_email = $_POST['email'];
} else {
    $err['email'] = 'メールアドレスが入力されていません。';
}

if (!empty($_POST['pass'])) {
    $user_pass = $_POST['pass'];
} else {
    $err['pass'] = 'パスワードが入力されていません。';
}

if (isset($user_pass)) {
    $user_pass = md5($user_pass);
}

try
{
    $sql = 'SELECT name FROM users WHERE email = ? AND password = ?';
    $stmt = connect()->prepare($sql);
    $data[] = $user_email;
    $data[] = $user_pass;

    $stmt->execute($data);
    $dbh = null;
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rec == false) {
        $err['mis'] = 'メールアドレスかパスワードが間違っています。';
    } else {
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_pass'] = $user_pass;
        $_SESSION['user_name'] = $rec['name'];
        header('Location:../public/list.php');
        exit();
    }
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('err', $err);
$smarty->display('../smarty/templates/err.tpl');
