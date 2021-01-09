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
<title>在庫登録</title>
</head>
<body>

<?php
require_once('../db_connect/db_connect.php');
require_once('../sanitize/sanitize.php');
$post=sanitize($_POST);

try
{
  if(!empty($_POST['purchase_date']))
  {
    $stock_purchase_date=$_POST['purchase_date'];
  }

  if(!empty($_POST['deadline']))
  {
    $stock_deadline=$_POST['deadline'];
  }

  if(!empty($_POST['stock_name']))
  {
    $stock_name=$_POST['stock_name'];
  }

  if(!empty($_POST['price']))
  {
    $stock_price=$_POST['price'];
  }

  if(!empty($_POST['number']))
  {
    $stock_number=$_POST['number'];
  }

  $sql='INSERT INTO stocks(purchase_date,deadline,stock_name,price,number) VALUES (?,?,?,?,?)';
  $stmt=connect()->prepare($sql);
  $data[]=$stock_purchase_date;
  $data[]=$stock_deadline;
  $data[]=$stock_name;
  $data[]=$stock_price;
  $data[]=$stock_number;
  $stmt->execute($data);
  $dbh=null;

  print $stock_name;
  print 'を追加しました。<br />';
}
catch(Exception$e)
{
  echo "エラー発生：" . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
  print'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

?>

<form action="list.php">
<input type="submit" value="在庫一覧へ">
</form>

</body>
</html>
