<?php

require_once('../db_connect/db_connect.php');

$smarty = new Smarty();

$smarty->template_dir = dirname( __FILE__ , 3).'/templates';
$smarty->compile_dir  = dirname( __FILE__ , 3).'/templates_c';
$smarty->config_dir   = dirname( __FILE__ , 3).'/configs';
$smarty->cache_dir    = dirname( __FILE__ , 3).'/cache';

$smarty->escape_html  = true;

$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_pass = $_POST['pass'];
$err[] = '';

try
{
  $sql = 'INSERT INTO users (name,email,password) VALUES (?,?,?)';
  $stmt = connect()->prepare($sql);
  $data[] = $user_name;
  $data[] = $user_email;
  $data[] = $user_pass;
  $stmt->execute($data);
  $dbh = null;
}
catch (Exception $e)
{
	$err['exception'] = $e->getMessage();
}

$smarty->assign('user_name', $user_name);
$smarty->assign('err', $err);

if(isset($err['exception']) == '')
{
  $smarty->display('../smarty/templates/user/user_add_done.tpl');
}
else
{
  $smarty->display('../smarty/templates/err.tpl');
}

?>


