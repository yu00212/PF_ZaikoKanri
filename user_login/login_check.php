<?php

require_once '../db_connect/db_connect.php';
require_once '../common/common.php';

$reg_str = "/\A[a-z\d]{6,50}+\z/i";

if ($_POST['email'] == '') {
    $err['email'] = 'メールアドレスが入力されていません。';
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $err['email'] = 'メールアドレスを正しい形式で入力してください。';
} else {
    $user_email = $_POST['email'];
}

if ($_POST['pass'] == '') {
    $err['pass'] = 'パスワードが入力されていません。';
} elseif (!preg_match($reg_str, $_POST['pass'])) {
    $err['pass'] = 'パスワードは半角英数字6~50文字で入力してください。';
} else {
    $user_pass = $_POST['pass'];
}

try {
    $sql = 'SELECT * FROM users WHERE email = ?';
    $stmt = connect()->prepare($sql);
    $data[] = $user_email;
    $stmt->execute($data);
    $dbh = null;
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($rec['password'])) {
        if (password_verify($user_pass, $rec['password'])) {
            session_start();
            $_SESSION['login'] = 1;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_pass'] = $user_pass;
            $_SESSION['user_name'] = $rec['name'];
            header('Location:../public/list.php');
            exit();
        } else {
            $err['mis'] = 'パスワードが違います。';
        }
    } else {
        $err['mis'] = 'メールアドレス又はパスワードが違います。';
    }

} catch (Exception $e) {
    err_common($e, $smarty);
}

if (isset($err['email']) == true || isset($err['pass']) == true || isset($err['mis']) == true) {
    $smarty->assign('title', "エラー");
    $smarty->assign('err', $err);
    $smarty->display('../smarty/templates/err.tpl');
}
