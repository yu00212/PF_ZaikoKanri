<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
　<meta charset = "UTF-8">
　<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
　<link rel = "stylesheet" href = "css/common.css">
　<link rel = "stylesheet" href = "css/stock_search.css">
　<title>検索結果</title>
</head>
<body>

<?php
require_once('../db_connect/db_connect.php');

try
{
  if($_SESSION['POST'] === '')
  {
   echo '検索ワードが入力されていません。<br>';
  }
  else
  {
    $stmt = connect()->prepare("SELECT * FROM stocks WHERE stock_name LIKE (:stock_name) ");

    if($stmt)
    {
      $search_name = $_SESSION['POST'];

      if(isset($search_name))
      {
        $like_search_name = "%".$search_name."%";
      }

      //プレースホルダーへ実際の値を設定する
      if(isset($like_search_name))
      {
        $stmt->bindValue(':stock_name', $like_search_name, PDO::PARAM_STR);
      }

      $errors = [];
      if($stmt->execute())
      {
        //レコード件数取得
        $row_count = $stmt->rowCount();

        while($row = $stmt->fetch())
        {
          $rows[] = $row;
        }
      }
      else
      {
        $errors['error'] = "検索失敗しました。";
      }
      $dbh = null;
    }
  }
}
catch(PDOException $e)
{
	print('Error:'.$e->getMessage());
	$errors['error'] = "データベース接続失敗しました。";
}
?>

<?php if($_SESSION['POST'] === '') : ?>
  <?php unset($_SESSION['POST']); ?>
<?php else : ?>
  <?php unset($_SESSION['POST']); ?>

  <?php if(count($errors) === 0): ?>
    <p><?= "「".htmlspecialchars($search_name, ENT_QUOTES, 'UTF-8')."」で検索しました。"?></p>

      <?php if($row_count === 0) : ?>
        <p>該当商品はありません。</p>
      <?php else : ?>
        <p><?= $row_count?>件の該当商品がありました。</p>
          <table class = "sorttbl" id = "myTable" border = '1'>
            <tr><th>ID</th><th>購入日</th><th>商品名</th><th>値段</th><th>数量</th><th>消費期限</th></tr>
              <?php foreach ((array)$rows as $row) : ?>
                <tr>
                  <td><?=  $row['stock_id']?></td>
                  <td><?=  htmlspecialchars($row['purchase_date'], ENT_QUOTES, 'UTF-8') ?></td>
                  <td><?=  htmlspecialchars($row['stock_name'], ENT_QUOTES, 'UTF-8') ?></td>
                  <td>¥<?=  htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') ?></td>
                  <td><?=  htmlspecialchars($row['number'], ENT_QUOTES, 'UTF-8') ?></td>
                  <td><?=  htmlspecialchars($row['deadline'], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
              <?php endforeach; ?>
          </table>
      <?php endif; ?>

    <?php elseif(count($errors) > 0) : ?>
      <?php foreach($errors as $value) : ?>
        <p><?php print $value; ?></p>
      <?php endforeach; ?>
    <?php endif; ?>

<?php endif; ?><br>

<form>
<input type = "button" onclick = "history.back()" value = "戻る">
</form>

</body>
</html>
