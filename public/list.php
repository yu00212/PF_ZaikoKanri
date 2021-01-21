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

$err[] = '';

try
{
  $sql = 'SELECT stock_id,purchase_date,deadline,stock_name,price,number FROM stocks WHERE 1';
  $stmt = connect()->prepare($sql);
  $stmt->execute();
  $dbh = null;
}
catch(Exception $e)
{
  $err['exception'] = $e->getMessage();
}

$smarty->assign('stock', $stmt);
$smarty->assign('err', $err);

if(isset($err['exception']) == '')
{
  $smarty->display('../smarty/templates/public/list.tpl');
}
else
{
  $smarty->display('../smarty/templates/err.tpl');
}

?>



