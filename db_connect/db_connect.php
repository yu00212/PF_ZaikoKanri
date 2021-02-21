<?php

require_once '../common/smarty.php';
require_once '../common/common.php';

$err[] = '';

function connect() {
    try {
        $dsn = 'mysql:dbname=user;host=localhost;charset=utf8';
        $user = 'yusei';
        $pass = 'rogin1111';
        $dbh = new PDO($dsn, $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (PDOExeption $e) {
        err_common($e, $smarty);
    }
}
