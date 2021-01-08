<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/common.css">
<title>在庫修正</title>
</head>
<body>

<?php
require_once('../sanitize/sanitize.php');
$post=sanitize($_POST);

if (!empty($_POST['stockid']))
{
	$stock_id=$_POST['stockid'];
}

if (!empty($_POST['purchase_date']))
{
	$stock_purchase_date=$_POST['purchase_date'];
}

if (!empty($_POST['deadline']))
{
	$stock_deadline=$_POST['deadline'];
}

if (!empty($_POST['stock_name']))
{
	$stock_name=$_POST['stock_name'];
}

if (!empty($_POST['price']))
{
	$stock_price=$_POST['price'];
}

if (!empty($_POST['number']))
{
	$stock_number=$_POST['number'];
}

if($stock_purchase_date=='')
{
	print '購入日が入力されていません。<br />';
}
else
{
	print '購入日　：';
	print $stock_purchase_date;
	print '<br />';
}

if($stock_deadline=='')
{
	print '消費期限が入力されていません。<br />';
}
else
{
	print '消費期限：';
	print $stock_deadline;
	print '<br />';
}

if($stock_name=='')
{
	print '商品名が入力されていません。<br />';
}
else
{
	print '商品名　：';
	print $stock_name;
	print '<br />';
}

if(preg_match('/\A[0-9]+\z/',$stock_price)==0)
{
	print '価格をきちんと入力してください。<br />';
}
else
{
	print '価格　　：';
	print $stock_price;
	print '円<br />';
}

if($stock_number=='')
{
	print '数量が入力されていません。<br />';
}
else
{
	print '数量　　：';
	print $stock_number;
	print '<br />';
}

if($stock_name=='' || preg_match('/\A[0-9]+\z/',$stock_price)==0)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print '上記のように変更します。<br />';
	print '<form method="post" action="stock_edit_done.php">';

	if(isset($stock_id))
	{
		print '<input type="hidden" name="stock_id" value="'.$stock_id.'">';
	}

	if(isset($stock_purchase_date))
	{
		print '<input type="hidden" name="purchase_date" value="'.$stock_purchase_date.'">';
	}

	if(isset($stock_deadline))
	{
		print '<input type="hidden" name="deadline" value="'.$stock_deadline.'">';
	}

	if(isset($stock_name))
	{
		print '<input type="hidden" name="stock_name" value="'.$stock_name.'">';
	}

	if(isset($stock_price))
	{
		print '<input type="hidden" name="price" value="'.$stock_price.'">';
	}

	if(isset($stock_number))
	{
		print '<input type="hidden" name="number" value="'.$stock_number.'">';
	}

	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}
?>

</body>
</html>
