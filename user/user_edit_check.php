<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
<link rel = "stylesheet" href = "../public/css/common.css">
<title>ユーザー修正</title>
</head>
<body>

<?php
if (!empty($_POST['user_id']))
{
	$user_id = $_POST['user_id'];
}

if (!empty($_POST['name']))
{
	$user_name = $_POST['name'];
}

if (!empty($_POST['email']))
{
	$user_email = $_POST['email'];
}

if (!empty($_POST['pass']))
{
	$user_pass = $_POST['pass'];
}

if (!empty($_POST['pass2']))
{
	$user_pass2 = $_POST['pass2'];
}
?>

<?php var_dump($_POST['user_id']);?>
<?php var_dump($user_id);?>


<?php if($user_name == '') : ?>
  <p>名前が入力されていません。</p>
<?php else : ?>
  <p>名前：<?php print $user_name ?></p>
<?php endif; ?>

<?php if($user_email == '') : ?>
  <p>メールアドレスが入力されていません。</p>
<?php else : ?>
  <p>メールアドレス：<?php print $user_email ?></p>
<?php endif; ?>

<?php if($user_pass == '') : ?>
  <p>パスワードが入力されていません。</p>
<?php endif; ?>

<?php if($user_pass !== $user_pass2) : ?>
  <p>パスワードが一致しません。</p>
<?php endif; ?>

<?php if($user_name == '' || $user_email == '' || $user_pass == '' || $user_pass != $user_pass2) : ?>
  <form>
  <input type="button" onclick="history.back()" value="戻る">
  </form>
<?php else : ?>
  <p>上記のように変更します。</p>
  <p>問題なければOKを押してください。</p>
  <?php $user_pass = md5($user_pass); ?>
  <form method = "post" action = "user_edit_done.php">
  <input type = "hidden" name　=　"user_id" value　=　"<?php print $user_id ?>">
	<input type = "hidden" name = "name" value = "<?php print $user_name ?>">
	<input type = "hidden" name = "email" value = "<?php print $user_email ?>">
	<input type = "hidden" name = "pass" value = "<?php print $user_pass ?>">
  <input type = "button" onclick = "history.back()" value = "戻る">
	<input type = "submit" value = "ＯＫ">
	</form>
<?php endif; ?>

</body>
</html>
