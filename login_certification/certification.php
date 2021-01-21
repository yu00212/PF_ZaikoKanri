<?php


function certification()
{
  session_start();
  session_regenerate_id(true);
  if(isset($_SESSION['login']) == false)
  {
    print'ログインされません。<br />';
    print'<a href = "../user_login/login_form.html">ログイン画面へ</a>';
    exit();
  }
  else
  {
    print $_SESSION['user_name'];
    print'さんログイン中<br />';
    print'<br />';
  }
}

?>
