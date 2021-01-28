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

$user_id = $_GET['user_id'];
$err[] = '';

try
{
  $sql = 'SELECT name,email FROM users WHERE id = ?';
  $stmt = connect()->prepare($sql);
  $data[] = $user_id;
  $stmt->execute($data);
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $user_name = $rec['name'];
  $user_email = $rec['email'];
  $dbh = null;
}
catch(Exception $e)
{
  $err['exception'] = $e->getMessage();
}

$smarty->assign('user_name', $user_name);
$smarty->assign('user_email', $user_email);
$smarty->assign('err', $err);

if(isset($err['exception']) == '')
{
  $smarty->display('../smarty/templates/user/user_disp.tpl');
}
else
{
  $smarty->display('../smarty/templates/err.tpl');
}
