<?php

require_once '../common/smarty.php';
require_once '../common/input_check.php';

$user_data = validateUser($post, $smarty);

if (isset($user_data)) {
    $smarty->assign('title', "ユーザー登録");
    $smarty->assign('user_data', $user_data);
    $smarty->display('../smarty/templates/user/user_add_check.tpl');
}
