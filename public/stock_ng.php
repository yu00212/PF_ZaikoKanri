<?php

require_once '../login_certification/certification.php';
certification();

require_once '../common/smarty.php';

$err[] = '';
$err['select'] = '商品が選択されていません。';

$smarty->assign('err', $err);

if (isset($err['select'])) {
    $smarty->display('../smarty/templates/err.tpl');
}
