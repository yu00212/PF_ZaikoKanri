<?php

require_once('../login_certification/certification.php');
certification();

require_once('../db_connect/db_connect.php');

$smarty = new Smarty();

$smarty->template_dir = dirname( __FILE__ , 3).'/templates';
$smarty->compile_dir  = dirname( __FILE__ , 3).'/templates_c';
$smarty->config_dir   = dirname( __FILE__ , 3).'/configs';
$smarty->cache_dir    = dirname( __FILE__ , 3).'/cache';

$smarty->escape_html  = true;

$user_id = $_POST['user_id'];
$err[] = '';

try
{
  $sql = 'DELETE FROM users WHERE id = ?';
  $stmt = connect()->prepare($sql);
  $data[] = $user_id;
  $stmt->execute($data);
  $dbh = null;
}
catch (Exception $e)
{
  $err['exception'] = $e->getMessage();
}

$smarty->assign('err', $err);

if(isset($err['exception']) == '')
{
  $smarty->display('../smarty/templates/user/user_delete_done.tpl');
}
else
{
  $smarty->display('../smarty/templates/err.tpl');
}
