<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../public/css/common.css">
<title>ユーザー修正</title>
</head>
<body>

<?php
require_once 'libs/Smarty.class.php';
require_once '/path/to/Smarty.class.php';

$smarty = new Smarty();

$smarty->template_dir = '/path/to/templates/';
$smarty->compile_dir  = '/path/to/templates_c/';
$smarty->config_dir   = '/path/to/configs/';
$smarty->cache_dir    = '/path/to/cache/';

$smarty->escape_html  = true; // デフォルトでエスケープ処理を行う

// アサイン
$smarty->assign('name','Ned');

// 出力
$smarty->display('index.tpl');

if (!empty($_POST['userid']))
{
	$user_id=$_POST['userid'];
}

if (!empty($_POST['name']))
{
	$user_name=$post['name'];
}

if (!empty($_POST['email']))
{
	$user_email=$post['email'];
}

if (!empty($_POST['pass']))
{
	$user_pass=$post['pass'];
}

if (!empty($_POST['pass2']))
{
	$user_pass2=$post['pass2'];
}

if($user_name=='')
{
	print '名前が入力されていません。<br />';
}
else
{
	print '名前：';
	print $user_name;
	print '<br />';
}

if($user_email=='')
{
	print 'メールアドレスが入力されていません。<br />';
}
else
{
	print 'メールアドレス：';
	print $user_email;
	print '<br />';
}

if($user_pass=='')
{
	print 'パスワードが入力されていません。<br />';
}

if($user_pass!=$user_pass2)
{
	print 'パスワードが一致しません。<br />';
}

if($user_name=='' ||$user_email=='' ||$user_pass=='' || $user_pass!=$user_pass2)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	$user_pass=md5($user_pass);
	print '上記のように変更します。<br />';
	print '<form method="post" action="user_edit_done.php">';

	if(isset($user_id))
	{
		print '<input type="hidden" name="userid" value="'.$user_id.'">';
	}

	if(isset($user_name))
	{
		print '<input type="hidden" name="name" value="'.$user_name.'">';
	}

    if(isset($user_email))
	{
		print '<input type="hidden" name="email" value="'.$user_email.'">';
	}

	if(isset($user_pass))
	{
		print '<input type="hidden" name="pass" value="'.$user_pass.'">';
	}

	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}

?>
</body>
</html>
