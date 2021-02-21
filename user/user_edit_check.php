<?php

require_once '../login_certification/certification.php';
certification();

require_once '../common/smarty.php';
require_once '../common/input_check.php';

$user_data = validateUser($post, $smarty);

$smarty->assign('title', "ユーザー編集");
$smarty->assign('user_data', $user_data);
$smarty->display('../smarty/templates/user/user_edit_check.tpl');

