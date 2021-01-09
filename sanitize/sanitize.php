<?php
<<<<<<< HEAD
//削除してエスケープ処理変える
function sanitize($before) {

    if (is_array($before)) {

        $after = array();
=======

function sanitize($before) 
{
    if (is_array($before)) 
    {
        $after = array();  
>>>>>>> 4f9f9768e41baa5903ae2f66eb7ed0bc07269f36

        foreach ($before as $key=>$value) 
        {
          $after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

        return $after;

    }
    else 
    {
      return htmlspecialchars($before, ENT_QUOTES, 'UTF-8');
    }

}

//htmlspecialchars関数
function h($s)
{
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

?>


