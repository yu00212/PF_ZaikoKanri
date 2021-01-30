<?php

require_once '../login_certification/certification.php';
certification();

require_once '../common/smarty.php';

$user_id = $_POST['user_id'];
$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_pass = $_POST['pass'];
$user_pass2 = $_POST['pass2'];
$err[] = '';

if ($user_name == '') {
    $err['name'] = '名前が入力されていません。';
}

if ($user_email == '') {
    $err['email'] = 'メールアドレスが入力されていません。';
}

if ($user_pass == '') {
    $err['pass'] = 'パスワードが入力されていません。';
}

if ($user_pass2 == '') {
    $err['pass2'] = '確認用パスワードが入力されていません。';
}

if ($user_pass !== $user_pass2) {
    $err['match'] = 'パスワードが一致しません。';
} else {
    $user_pass = md5($user_pass);
}

$smarty->assign('err', $err);
$smarty->assign('user_id', $user_id);
$smarty->assign('user_name', $user_name);
$smarty->assign('user_email', $user_email);
$smarty->assign('user_pass', $user_pass);

if (isset($err['name']) == '' && isset($err['email']) == '' && isset($err['pass']) == '' && isset($err['match']) == '') {
    $smarty->display('../smarty/templates/user/user_edit_check.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
