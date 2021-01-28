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

$stock_id = $_POST['stock_id'];
$err[] = '';

if (isset($_POST["token"]) && $_POST["token"]  ===  $_SESSION['token'])
{
  try
  {
    $sql = 'DELETE FROM stocks WHERE stock_id = ?';
    $stmt = connect()->prepare($sql);
    $data[] = $stock_id;
    $stmt->execute($data);
    $dbh = null;
  }
  catch (Exception $e)
  {
    $err['exception'] = $e->getMessage();
  }
}
else
{
  $err['token'] = '不正なリクエストです';
}

$smarty->assign('err', $err);

if(isset($err['exception']) == '' && isset($err['token']) == '')
{
  $smarty->display('../smarty/templates/public/stock_delete_done.tpl');
}
else
{
  $smarty->display('../smarty/templates/err.tpl');
}


