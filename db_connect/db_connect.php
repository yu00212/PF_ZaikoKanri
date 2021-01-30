<?php

require_once '../common/smarty.php';

$err[] = '';

function connect()
{
    try
    {
        $dsn = 'mysql:dbname=user;host=localhost;charset=utf8';
        $user = 'yusei';
        $pass = 'rogin1111';
        $dbh = new PDO($dsn, $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (PDOExeption $e) {
        $err['exception'] = $e->getMessage();
        exit();
    }
}

$smarty->assign('err', $err);

if (isset($err['exception'])) {
    $smarty->display('../smarty/templates/err.tpl');
}
