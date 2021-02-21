<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
</head>

<body>

    <p>全ての項目を入力後「登録」を押してください。</p>
    <p>※登録内容はログイン時に必要になります。<br>　メモしておいてください。</p>

    <form method="post" action = "user_add_check.php">
        <p>
            <label for = "name">
				ユーザー名<font color = "red">※</font>：
				<input type = "text" name = "name" id = "name" style = "width:200px" required>
			</label>
        </p>

        <p>
            <label for = "email">
				メールアドレス<font color = "red">※</font>：
				<input type = "email" name = "email" id = "email" required>
			</label>
        </p>

        <p>
            <label for = "pass">
				パスワード<font color = "red">※</font>：
				<input type = "password" name = "pass" id = "pass" required>
			</label>
        </p>

        <p>
            <label for = "pass2">
				パスワード再入力<font color = "red">※</font>：
				<input type = "password" name = "pass2" id = "pass2" required>
			</label>
		</p>

        <input type = "button" onclick = "history.back()" value = "戻る">
        <input type = "submit" value = "登録">
    </form>

</body>

</html>
