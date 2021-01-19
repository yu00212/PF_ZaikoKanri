<?php
require_once('../login_certification/certification.php');
certification();

require_once('../db_connect/db_connect.php');
require('../../../Smarty-master/libs/Smarty.class.php');


$smarty = new Smarty();

$smarty->template_dir = dirname( __FILE__ , 3).'/templates';
$smarty->compile_dir  = dirname( __FILE__ , 3).'/templates_c';
$smarty->config_dir   = dirname( __FILE__ , 3).'/configs';
$smarty->cache_dir    = dirname( __FILE__ , 3).'/cache';

$smarty->escape_html  = true;

$err[] = '';

try
{
  if($_SESSION['POST'] === '')
  {
   $err['search'] = '検索ワードが入力されていません。';
  }
  else
  {
    $stmt = connect()->prepare("SELECT * FROM stocks WHERE stock_name LIKE (:stock_name)");

    if($stmt)
    {
      $search_name = $_SESSION['POST'];
      $smarty->assign('search_name', $search_name);

      if(isset($search_name))
      {
        $like_search_name = "%".$search_name."%";
      }

      //プレースホルダーへ実際の値を設定する
      if(isset($like_search_name))
      {
        $stmt->bindValue(':stock_name', $like_search_name, PDO::PARAM_STR);
      }

      if($stmt->execute())
      {
        //レコード件数取得
        $row_count = $stmt->rowCount();
        $smarty->assign('row_count', $row_count);

        while($row = $stmt->fetch())
        {
          $rows[] = $row;
          $smarty->assign('rows', $rows);
        }
      }
      else
      {
        $err['misSearch'] = "検索失敗しました。";
      }
      $dbh = null;
    }
  }
}
catch(PDOException $e)
{
  $err['exception'] = $e->getMessage();
}

unset($_SESSION['POST']);
$smarty->assign('err', $err);

if(isset($row_count) == true)
{
  $smarty->display('../smarty/templates/public/stock_search.tpl');
}
else
{
  $smarty->display('../smarty/templates/err.tpl');
}
?>
