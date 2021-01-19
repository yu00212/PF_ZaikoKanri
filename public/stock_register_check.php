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

$stock_purchase_date = $_POST['purchase_date'];
$stock_deadline = $_POST['deadline'];
$stock_name = $_POST['stock_name'];
$stock_price = $_POST['price'];
$stock_number = $_POST['number'];
$err[] = '';

list($year, $month, $day) = explode("-", $stock_purchase_date);
if(checkdate($month, $day, $year))
{
  $smarty->assign('stock_purchase_date', $stock_purchase_date);
}
else
{
  $err['purchase_date'] = '購入日をきちんと入力してください。';
}

list($year, $month, $day) = explode("-", $stock_deadline);
if(checkdate($month, $day, $year))
{
  $smarty->assign('stock_deadline', $stock_deadline);
}
else
{
  $err['stock_deadline'] = '消費期限をきちんと入力してください。';
}

if($stock_name == '')
{
  $err['stock_name'] = '商品名が入力されていません。';
}
else
{
  $smarty->assign('stock_name', $stock_name);
}

if($stock_price == '')
{
  $err['stock_price'] = '値段が入力されていません。';
}
elseif(preg_match('/\A[0-9]+\z/',$stock_price) == 0)
{
  $err['stock_price'] = '値段は数字で入力してください。';
}
else
{
  $smarty->assign('stock_price', $stock_price);
}

if($stock_number == '')
{
  $err['stock_number'] = '数量が入力されていません。';
}
elseif(preg_match('/\A[0-9]+\z/',$stock_number) == 0)
{
  $err['stock_number'] = '数量は数字で入力してください。';
}
else
{
  $smarty->assign('stock_number', $stock_number);
}

$smarty->assign('err', $err);

if(isset($err['purchase_date']) == '' && isset($err['stock_deadline']) == '' && isset($err['stock_name']) == '' && isset($err['stock_price']) == '' && isset($err['stock_number']) == '')
{
  $smarty->display('../smarty/templates/public/stock_register_check.tpl');
}
else
{
  $smarty->display('../smarty/templates/err.tpl');
}
?>
