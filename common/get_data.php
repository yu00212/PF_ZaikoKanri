<?php

require_once '../db_connect/db_connect.php';

function getUserByID($sql, $user_id)
{
    $stmt = connect()->prepare($sql);
    $data[] = $user_id;
    $stmt->execute($data);
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user_data;
}

function getStockById($stock_id)
{
    $sql = 'SELECT * FROM stocks WHERE stock_id = ?';
    $stmt = connect()->prepare($sql);
    $data[] = $stock_id;
    $stmt->execute($data);
    $stock_data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $stock_data;
}
