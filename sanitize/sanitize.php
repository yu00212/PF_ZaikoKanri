<?php
//削除してエスケープ処理変える
function sanitize($before) {

    if (is_array($before)) {

        $after = array();

        foreach ($before as $key=>$value) {
            $after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

        return $after;

    }else {
        return htmlspecialchars($before, ENT_QUOTES, 'UTF-8');
    }

}

//htmlspecialchars関数
function h($s)
{
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

?>


