# アプリ名：ZAIKO
<img width="1440" alt="スクリーンショット 2021-10-04 0 21 38" src="https://user-images.githubusercontent.com/72062892/135760672-47f4fb92-99cf-425a-855f-652fc74e9f24.png">

# 概要
自宅の日用品や食品の在庫を管理するアプリです。在庫の登録、表示、編集、削除、検索機能がスムーズに行えます。

# このアプリを作成した理由
コロナ禍による買い溜めで、母が自宅の日用品や食品の管理に困っていました。

買い出し先で自宅の在庫状況が確認できず買い忘れをしたり、気づかない内に食品の消費期限が切れてしまい、そのまま捨てざるを得ないといった状況を多々目の当たりにしてきました。

そんな母の不をこれまで学習してきた言語とITの技術で解決したいと思いこのアプリを作成しました。

# 工夫した点
- 顧客である母と実際にヒアリングを行い、フィードバックをもらいながら要望に合わせて機能を実装。
- スマホ一つで利用できるようにレスポンシブ対応。
- コードの可読性、メンテナンス性向上のため、テンプレートエンジンsmartyでビューとロジックのコードを分離。※一部記載。

```
//在庫一覧表示のロジック
<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/common.php';

$err[] = '';

try {
    $sql = 'SELECT stock_id,purchase_date,deadline,stock_name,price,number FROM stocks WHERE 1';
    $stmt = connect()->prepare($sql);
    $stmt->execute();
    $dbh = null;
} catch (Exception $e) {
    err_common($e, $smarty);
}

$smarty->assign('title', "在庫一覧");
$smarty->assign('stock', $stmt);
$smarty->display('../smarty/templates/public/list.tpl');
```

```
//在庫一覧表示のビュー
<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
<link rel = "stylesheet" href = "css/list.css">
<link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.0.4/css/all.css">
<script src = "https://www.w3schools.com/lib/w3.js"></script>
</head>

<body>

    <div id = "menu-list">
        <ul>
            <li><a href = "../user/user_list.php">アカウント編集</a></li>
            <li><a href = "../user_login/logout_check.php">ログアウト</a></li>
        </ul>
    </div>

    <form method = "post" action = "stock_branch.php">
        <input type = "submit" name = "disp" value = "参照">
        <input type = "submit" name = "edit" value = "修正">
        <input type = "submit" name="delete" value = "削除">
        <input type = "submit" name="add" value = "追加">
        <input type = "text" name = "search_name" class = "search">
        <input type  ="submit" value = "検索">
        <br>

        <table class = "sorttbl" id = "myTable" border = "2">
            <tr>
                <th></th>
                <th>購入日</th>
                <th>商品</th>
                <th>値段</th>
                <th>数量</th>
                <th onclick = "w3.sortHTML('#myTable','.item', 'td:nth-child(6)')">消費期限&nbsp;<i class = "fa fa-sort"></i></th>
            </tr>

            {foreach $stock as $s}
            <tr class = "item">
                <td><label><input type = "radio" name = "stock_id" value = "{$s[0]}"></label></td>
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
```

# 機能一覧（全12機能）
- ユーザー認証
   - アカウント作成、詳細表示、編集、削除
   - ログイン、ログアウト
   - アカウントの一覧表示

- 在庫管理
   - 在庫の登録、詳細表示、編集、削除
   - 一覧表示
   - キーワードで曖昧検索
   - 表示順切り替え

# ER図
<img width="849" alt="スクリーンショット 2021-10-04 0 27 44" src="https://user-images.githubusercontent.com/72062892/135760869-f88944a3-10ef-4bb0-aee9-23a6c79b657d.png">

# 画面遷移図
<img width="830" alt="スクリーンショット 2021-10-04 22 08 08" src="https://user-images.githubusercontent.com/72062892/135857080-a38fb544-266a-4680-a484-a28dcea5c413.png">


# 使用技術

フロントエンド：HTML5、CSS、JavaScript

バックエンド：PHP7.3.29

インフラ：MySQL7.4.2/phpMyAdmin、Apache2.2.34
