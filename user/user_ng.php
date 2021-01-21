<?php

require_once('../login_certification/certification.php');
certification();

require('../../../Smarty-master/libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->template_dir = dirname( __FILE__ , 3).'/templates';
$smarty->compile_dir  = dirname( __FILE__ , 3).'/templates_c';
$smarty->config_dir   = dirname( __FILE__ , 3).'/configs';
$smarty->cache_dir    = dirname( __FILE__ , 3).'/cache';

$smarty->escape_html  = true;

$err[] = '';
$err['select'] = 'ユーザーが選択されていません。';

$smarty->assign('err', $err);

if(isset($err['select']))
{
  $smarty->display('../smarty/templates/err.tpl');
}

?>
