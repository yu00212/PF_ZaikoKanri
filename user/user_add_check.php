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

$user_name = $post['name'];
$user_email = $post['email'];
$user_pass = $post['pass'];
$user_pass2 = $post['pass2'];
?>

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
  <p>上記のユーザーを登録します。</p>
  <p>問題なければOKを押してください。</p>
  <?php $user_pass = md5($user_pass); ?>
  <form method = "post" action = "user_add_done.php">
	<input type = "hidden" name = "name" value = "<?php print $user_name ?>">
	<input type = "hidden" name = "email" value = "<?php print $user_email ?>">
	<input type = "hidden" name = "pass" value = "<?php print $user_pass ?>">
  <input type = "button" onclick = "history.back()" value = "戻る">
	<input type = "submit" value = "ＯＫ">
	</form>
<?php endif; ?>

</body>
</html>
