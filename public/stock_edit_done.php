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
$stock_purchase_date = $_POST['purchase_date'];
$stock_deadline = $_POST['deadline'];
$stock_name = $_POST['stock_name'];
$stock_price = $_POST['price'];
$stock_number = $_POST['number'];
$err[] = '';

try
{
  if(!empty($_POST['stock_id']))
  {
    $stock_id = $_POST['stock_id'];
  }

  if(!empty($_POST['purchase_date']))
  {
    $stock_purchase_date = $_POST['purchase_date'];
  }

  if(!empty($_POST['deadline']))
  {
    $stock_deadline = $_POST['deadline'];
  }

  if(!empty($_POST['stock_name']))
  {
    $stock_name = $_POST['stock_name'];
  }

  if(!empty($_POST['price']))
  {
    $stock_price = $_POST['price'];
  }

  if(!empty($_POST['number']))
  {
    $stock_number = $_POST['number'];
  }

  $sql = 'UPDATE stocks SET purchase_date = :purchase_date,deadline = :deadline,stock_name = :stock_name,price = :price,number = :number WHERE stock_id = :stock_id';
  $stmt = connect()->prepare($sql);

  if(isset($stock_id))
  {
    $data[':stock_id'] = (int)$stock_id;
  }

  if(isset($stock_purchase_date))
  {
    $data[':purchase_date'] = $stock_purchase_date;
  }

  if(isset($stock_deadline))
  {
    $data[':deadline'] = $stock_deadline;
  }

  if(isset($stock_name))
  {
    $data[':stock_name'] = $stock_name;
  }

  if(isset($stock_price))
  {
    $data[':price'] = (int)$stock_price;
  }

  if(isset($stock_number))
  {
    $data[':number'] = (int)$stock_number;
  }

  $stmt->execute($data);
  $dbh = null;
}
catch(Exception$e)
{
  $err['exception'] = $e->getMessage();
}

$smarty->assign('err', $err);

if(isset($err['exception']) == '')
{
  $smarty->display('../smarty/templates/public/stock_edit_done.tpl');
}
else
{
  $smarty->display('../smarty/templates/err.tpl');
}

?>
