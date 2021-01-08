<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../public/css/common.css">
<title>ユーザー登録</title>
</head>
<body>

<?php

require_once('../sanitize/sanitize.php');
$post=sanitize($_POST);

$user_name=$post['name'];
$user_email=$post['email'];
$user_pass=$post['pass'];
$user_pass2=$post['pass2'];

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

if($user_pass !== $user_pass2)
{
	print 'パスワードが一致しません。<br />';
}

if($user_name=='' || $user_email=='' || $user_pass=='' || $user_pass!=$user_pass2)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	$user_pass=md5($user_pass);
	print '<form method="post" action="user_add_done.php">';
	print '<input type="hidden" name="name" value="'.$user_name.'">';
	print '<input type="hidden" name="email" value="'.$user_email.'">';
	print '<input type="hidden" name="pass" value="'.$user_pass.'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}

?>
</body>
</html>
