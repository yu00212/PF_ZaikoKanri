<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/common.css">
    <title>在庫登録</title>
</head>

<body>

    <p>{$stock_data['stock_name']}を追加しました。</p>
    <form action="../public/list.php">
        <input type="submit" value="在庫一覧へ">
    </form>

</body>

</html>