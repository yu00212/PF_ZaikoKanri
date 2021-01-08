<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/common.css">
<title>在庫参照</title>
</head>
<body>

<?php

require_once('../db_connect/db_connect.php');
$stock_id=$_GET['stockid'];

try
{
  $sql='SELECT stock_id,purchase_date,deadline,stock_name,price,number FROM stocks WHERE stock_id=?';
  $stmt=connect()->prepare($sql);
  $data[]=$stock_id;
  $stmt->execute($data);

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  $stock_purchase_date=$rec['purchase_date'];
  $stock_deadline=$rec['deadline'];
  $stock_name=$rec['stock_name'];
  $stock_price=$rec['price'];
  $stock_number=$rec['number'];
  $dbh=null;
}
catch(Exception $e)
{
	echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<!--以下、テンプレエンジン化-->

<p>購入日　：<?php print $stock_purchase_date; ?></p>
<p>商品名　：<?php print $stock_name; ?></p>
<p>値段　　：<?php print $stock_price; ?></p>
<p>数量　　：<?php print $stock_number; ?></p>
<p>消費期限：<?php print $stock_deadline; ?></p>

<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>
