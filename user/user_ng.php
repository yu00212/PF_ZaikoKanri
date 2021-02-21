<?php

require_once '../login_certification/certification.php';
certification();

require_once '../common/smarty.php';

$err[] = '';
$err['select'] = 'ユーザーが選択されていません。';

if (isset($err['select'])) {
	$smarty->assign('err', $err);
    $smarty->display('../smarty/templates/err.tpl');
}
