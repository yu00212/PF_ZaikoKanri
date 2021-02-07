<?php

require_once '../common/smarty.php';

$user_data['name'] = $_POST['name'];
$user_data['email'] = $_POST['email'];
$user_data['pass'] = $_POST['pass'];
$user_data['pass2'] = $_POST['pass2'];

$err[] = '';

if ($user_data['name'] == '') {
    $err['name'] = '名前が入力されていません。';
}

if ($user_data['email'] == '') {
    $err['email'] = 'メールアドレスが入力されていません。';
}

if ($user_data['pass'] == '') {
    $err['pass'] = 'パスワードが入力されていません。';
}

if ($user_data['pass2'] == '') {
    $err['pass2'] = '確認用パスワードが入力されていません。';
}

if ($user_data['pass'] !== $user_data['pass2']) {
    $err['match'] = 'パスワードが一致しません。';
} else {
    $user_data['pass'] = md5($user_data['pass']);
}

$smarty->assign('err', $err);
$smarty->assign('user_data', $user_data);

if (isset($err['name']) == false && isset($err['email']) == false && isset($err['pass']) == false && isset($err['match']) == false) {
    $smarty->display('../smarty/templates/user/user_add_check.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
