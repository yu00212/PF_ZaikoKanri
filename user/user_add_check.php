<?php
require('../../../Smarty-master/libs/Smarty.class.php');


$smarty = new Smarty();

$smarty->template_dir = dirname( __FILE__ , 3).'/templates';
$smarty->compile_dir  = dirname( __FILE__ , 3).'/templates_c';
$smarty->config_dir   = dirname( __FILE__ , 3).'/configs';
$smarty->cache_dir    = dirname( __FILE__ , 3).'/cache';

$smarty->escape_html  = true;

$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_pass = $_POST['pass'];
$user_pass2 = $_POST['pass2'];

$err[] = '';
if($user_name == '')
{
  $err['name'] = '名前が入力されていません。';
}

if($user_email == '')
{
  $err['email'] = 'メールアドレスが入力されていません。';
}

if($user_pass == '')
{
  $err['pass'] = 'パスワードが入力されていません。';
}

if($user_pass2 == '')
{
  $err['pass2'] = '確認用パスワードが入力されていません。';
}

if($user_pass !== $user_pass2)
{
  $err['match'] = 'パスワードが一致しません。';
}
else
{
  $user_pass = md5($user_pass);
}

$smarty->assign('err', $err);
$smarty->assign('user_name', $user_name);
$smarty->assign('user_email', $user_email);
$smarty->assign('user_pass', $user_pass);

if(isset($err['name']) == '' && isset($err['email']) == '' && isset($err['pass']) == '' && isset($err['match']) == '')
{
  $smarty->display('../smarty/templates/user/user_add_check.tpl');
}
else
{
  $smarty->display('../smarty/templates/err.tpl');
}
?>
