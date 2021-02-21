<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
<link rel = "stylesheet" href = "../public/css/list.css">
</head>

<body>

    <form method="post" action = "user_edit_check.php">
		<input type = "hidden" name = "user_id" value = "{$user_id}">

        <p>
            <label for = "name">
				名前<font color = "red">※</font>：
				<input type = "text" name = "name" id = "name" style = "width:200px" value = "{$user_data['name']}" required>
			</label>
        </p>

        <p>
            <label for = "email">
				メールアドレス<font color = "red">※</font>：
				<input type = "email" name = "email" id = "email" style = "width:200px" value = "{$user_data['email']}" required>
			</label>
        </p>

        <p>
            <label for = "pass">
				パスワード<font color = "red">※</font>：
				<input type = "password" name = "pass" id ="pass" style = "width:200px" required>
			</label>
        </p>

        <p>
            <label for = "pass2">
				パスワード再入力<font color = "red">※</font>：
				<input type = "password" name = "pass2" id ="pass2" style = "width:200px" required>
			</label>
		</p>

        <input type = "button" onclick = "history.back()" value = "戻る">
        <input type = "submit" value = "ＯＫ">
    </form>

</body>

</html>
