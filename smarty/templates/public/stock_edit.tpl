<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title = $title}
<link rel = "stylesheet" href = "../public/css/list.css">
</head>

<body>

    <p>全ての項目を入力後、修正ボタンを押してください。</p>
    <form method = "post" action = "stock_edit_check.php">

		<input type = "hidden" name = "stock_id" value = "{$stock_data['stock_id']}">

        <p>
            <label for = "purchase_date">
				購入日<font color = "red">※</font>：　
				<input type = "date" name = "purchase_date" id = "purchase_date" value = "{$stock_data['purchase_date']}" required><br>
			</label>
        </p>

        <p>
            <label for = "deadline">
				消費期限<font color = "red">※</font>：
				<input type = "date" name = "deadline" id = "deadline" value = "{$stock_data['deadline']}" required><br>
			</label>
        </p>

        <p>
            <label for = "stock_name">
				商品名<font color = "red">※</font>：　
				<input type = "text" name = "stock_name" id = "stock_name" style = "width:160px"  value = "{$stock_data['stock_name']}" required><br>
			</label>
        </p>

        <p>
            <label for = "price">
				値段<font color = "red">※</font>：　　
				<input type = "text" name = "price" id = "price" style = "width:80px" value = "{$stock_data['price']}" required><br>
			</label>
        </p>

        <p>
            <label for = "number">
				在庫数<font color = "red">※</font>：　
				<input type = "number" name = "number" id = "number" style = "width:80px" value = "{$stock_data['number']}" required><br>
			</label>
		</p>

        <input type = "button" onclick = "history.back()" value = "戻る">
        <input type = "submit" value = "修正">
    </form>

</body>

</html>
