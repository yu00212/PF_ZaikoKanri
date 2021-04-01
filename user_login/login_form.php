<?php

require_once '../common/smarty.php';

$smarty->assign('title', "ログイン画面");
$smarty->display('../smarty/templates/user_login/login_form.tpl');
