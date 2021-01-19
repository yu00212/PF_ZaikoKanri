<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "css/common.css">
  <link rel = "stylesheet" href = "css/list.css">
  <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.0.4/css/all.css">
  <script src = "https://www.w3schools.com/lib/w3.js"></script>
  <title>在庫一覧</title>
</head>
<body>

  <div id = "menu-list">
  　<ul>
    　<li><a href = "../user/user_list.php">アカウント編集</a></li>
    　<li><a href = "../user_login/user_logout_check.php">ログアウト</a></li>
  　</ul>
  </div>

  <form method = "post" action = "stock_branch.php">
  <input type = "submit" name = "disp" value = "参照">
  <input type = "submit" name = "edit" value = "修正">
  <input type = "submit" name = "delete" value = "削除">
  <input type = "submit" name = "add" value = "追加">
  <input type = "text" name = "search_name" class = "search">
  <input type = "submit" value = "検索">
  <br>

  <table class = "sorttbl" id = "myTable" border = "2">
    <tr>
      <th class = "radio-th"></th>
      <th class = "purchase_date-th">購入日</th>
      <th class = "stock_name-th">商品</th>
      <th class = "price-th">値段</th>
      <th class = "number-th">数量</th>
      <th class = "deadline-th" onclick = "w3.sortHTML('#myTable','.item', 'td:nth-child(6)')">消費期限&nbsp;<i class = "fa fa-sort"></i></th>
    </tr>

    {foreach $stock as $s}
      <tr class = "item">
        <td><input type = "radio" name = "stock_id" value = "{$s[0]}"></td>
        <td>{$s[1]}</td>
        <td>{$s[3]}</td>
        <td>¥{$s[4]}</td>
        <td>{$s[5]}</td>
        <td>{$s[2]}</td>
      </tr>
    {/foreach}
  </table>

  <input type = "submit" name = "disp" value = "参照">
  <input type = "submit" name = "edit" value = "修正">
  <input type = "submit" name = "delete" value = "削除">
  <input type = "submit" name = "add" value = "追加">
  </form>

</body>
</html>
