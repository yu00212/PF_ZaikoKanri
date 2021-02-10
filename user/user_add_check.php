<?php

require_once '../common/smarty.php';
require_once '../common/input_check.php';

list($user_data, $err) = validateUser($post);

$smarty->assign('err', $err);
$smarty->assign('user_data', $user_data);

if (isset($err['name']) == false && isset($err['email']) == false && isset($err['pass']) == false && isset($err['match']) == false) {
    $smarty->display('../smarty/templates/user/user_add_check.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
