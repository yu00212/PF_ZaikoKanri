<?php

require('../../../Smarty-master/libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->template_dir = dirname( __FILE__ , 3).'/templates';
$smarty->compile_dir  = dirname( __FILE__ , 3).'/templates_c';
$smarty->config_dir   = dirname( __FILE__ , 3).'/configs';
$smarty->cache_dir    = dirname( __FILE__ , 3).'/cache';

$smarty->escape_html  = true;

$err[] = '';

function connect()
{
  try
  {
    $dsn = 'mysql:dbname=user;host=localhost;charset=utf8';
    $user = 'yusei';
    $pass = 'rogin1111';
    $dbh = new PDO($dsn,$user,$pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $dbh;
  }
  catch(PDOExeption $e)
  {
    $err['exception'] = $e->getMessage();
    exit();
  }
}

$smarty->assign('err', $err);

if(isset($err['exception']))
{
  $smarty->display('../smarty/templates/err.tpl');
}
