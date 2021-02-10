<?php

require_once '../login_certification/certification.php';
certification();

require_once '../common/smarty.php';
require_once '../common/input_check.php';

list($user_data, $err) = validateUser($post);

$smarty->assign('user_data', $user_data);
$smarty->assign('err', $err);

if (isset($err['name']) == false && isset($err['email']) == false && isset($err['pass']) == false && isset($err['pass2']) == false && isset($err['match']) == false) {
    $smarty->display('../smarty/templates/user/user_edit_check.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
