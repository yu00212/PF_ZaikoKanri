<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
<link rel = "stylesheet" href = "css/common.css">
<title>在庫修正</title>
</head>
<body>

<?php
require_once('../sanitize/sanitize.php');
$post = sanitize($_POST);

if (!empty($_POST['stockid']))
{
	$stock_id = $_POST['stockid'];
}

if (!empty($_POST['purchase_date']))
{
	$stock_purchase_date = $_POST['purchase_date'];
}

if (!empty($_POST['deadline']))
{
	$stock_deadline = $_POST['deadline'];
}

if (!empty($_POST['stock_name']))
{
	$stock_name = $_POST['stock_name'];
}

if (!empty($_POST['price']))
{
	$stock_price = $_POST['price'];
}

if (!empty($_POST['number']))
{
	$stock_number = $_POST['number'];
}
?>

<?php list($year, $month, $day) = explode("-", $stock_purchase_date); ?>
<?php if(checkdate($month, $day, $year)) : ?>
  <p>購入日　：<?php print $stock_purchase_date ?></p>
<?php else : ?>
  <p>購入日をきちんと入力してください。</p>
<?php endif; ?>

<?php list($year, $month, $day) = explode("-", $stock_deadline); ?>
<?php if(checkdate($month, $day, $year)) : ?>
  <p>消費期限：<?php print $stock_deadline ?></p>
<?php else : ?>
  <p>消費期限をきちんと入力してください。</p>
<?php endif; ?>

<?php if($stock_name == '') : ?>
  <p>商品名をきちんと入力してください。</p>
<?php else : ?>
  <p>商品名　：<?php print $stock_name ?></p>
<?php endif; ?>

<?php if(preg_match('/\A[0-9]+\z/',$stock_price) == 0) : ?>
  <p>値段をきちんと入力してください。</p>
<?php else : ?>
  <p>値段　　：<?php print $stock_price ?></p>
<?php endif; ?>

<?php if(preg_match('/\A[0-9]+\z/',$stock_number) == 0) : ?>
  <p>数量をきちんと入力してください。</p>
<?php else : ?>
  <p>数量　　：<?php print $stock_number ?></p>
<?php endif; ?><br>

<?php if($stock_purchase_date == false || $stock_deadline == false || $stock_name == '' || preg_match('/\A[0-9]+\z/',$stock_price) == 0 || preg_match('/\A[0-9]+\z/',$stock_number) == 0) : ?>
  <form>
  <input type="button" onclick="history.back()" value="戻る">
  </form>
<?php else : ?>
  <p>上記のように変更します。</p>
  <p>問題なければOKを押してください</p>
  <form method = "post" action = "stock_edit_done.php">
  <input type = "hidden" name = "stock_id" value = " <?php print $stock_id ?>">
  <input type = "hidden" name = "purchase_date" value = " <?php print $stock_purchase_date ?>">
  <input type = "hidden" name = "deadline" value = "<?php print $stock_deadline ?>">
  <input type = "hidden" name = "stock_name" value = "<?php print $stock_name ?>">
  <input type = "hidden" name = "price" value = "<?php print $stock_price ?>">
  <input type = "hidden" name = "number" value = "<?php print $stock_number ?>">
  <input type = "button" onclick = "history.back()" value = "戻る">
  <input type = "submit" value = "ＯＫ">
  </form>
<?php endif; ?>

</body>
</html>
