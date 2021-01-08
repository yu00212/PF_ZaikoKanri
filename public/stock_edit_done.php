<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print'ログインされません。<br />';
    print'<a href="../user_login/login_form.html">ログイン画面へ</a>';
    exit();
}
else
{
    print $_SESSION['user_name'];
    print'さんログイン中<br />';
    print'<br />';
}
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

try
{

require_once('../sanitize/sanitize.php');
$post=sanitize($_POST);

if (!empty($_POST['stock_id'])) 
{
	$stock_id=$_POST['stock_id'];
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

$dsn='mysql:dbname=user;host=localhost;charset=utf8';
$user='yusei';
$password='rogin1111';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='UPDATE stocks SET purchase_date=:purchase_date,deadline=:deadline,stock_name=:stock_name,price=:price,number=:number WHERE stock_id=:stock_id';
$stmt=$dbh->prepare($sql);

if(isset($stock_id)) 
{
   $data[':stock_id']=(int)$stock_id;
}
		
if(isset($stock_purchase_date)) 
{
   $data[':purchase_date']=$stock_purchase_date;
}
		
if(isset($stock_deadline)) 
{
   $data[':deadline']=$stock_deadline;
}
		
if(isset($stock_name)) 
{
   $data[':stock_name']=$stock_name;
}
		
if(isset($stock_price)) 
{
   $data[':price']=(int)$stock_price;
}
		
if(isset($stock_number)) 
{
   $data[':number']=(int)$stock_number;
}
		
$stmt->execute($data);
		
$dbh=null;

print '修正しました。<br />';

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