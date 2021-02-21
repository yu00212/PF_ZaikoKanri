<?php

require_once '../common/smarty.php';

$smarty->assign('title', "ユーザー登録");
$smarty->display('../smarty/templates/user/user_add.tpl');
