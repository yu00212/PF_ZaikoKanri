<?php

$post = $_POST;

function validateStock($post)
{
    $err[] = '';
    $stock_data[] = '';
    $limit = 20;
    $stockLength = mb_strlen($_POST['stock_name']);

    if (!empty($_POST['stock_id'])) {
        $stock_data['stock_id'] = $_POST['stock_id'];
    }

    list($year, $month, $day) = explode("-", $_POST['purchase_date']);
    if (checkdate($month, $day, $year)) {
        $stock_data['purchase_date'] = $_POST['purchase_date'];
    } else {
        $err['purchase_date'] = '購入日をきちんと入力してください。';
    }

    list($year, $month, $day) = explode("-", $_POST['deadline']);
    if (checkdate($month, $day, $year)) {
        $stock_data['deadline'] = $_POST['deadline'];
    } else {
        $err['stock_deadline'] = '消費期限をきちんと入力してください。';
    }

    if ($_POST['stock_name'] == '') {
        $err['stock_name'] = '商品名が入力されていません。';
    } elseif ($stockLength > $limit) {
        $err['stock_name'] = '商品名は２0字以内で入力してください。';
    } else {
        $stock_data['stock_name'] = $_POST['stock_name'];
    }

    if ($_POST['price'] == '') {
        $err['stock_price'] = '値段が入力されていません。';
    } elseif (preg_match('/\A[0-9]{1,5}+\z/', $_POST['price']) == 0) {
        $err['stock_price'] = '値段は1~5桁の数字で入力してください。';
    } else {
        $stock_data['price'] = $_POST['price'];
    }

    if ($_POST['number'] == '') {
        $err['stock_number'] = '数量が入力されていません。';
    } elseif (preg_match('/\A[0-9]{1,3}+\z/', $_POST['number']) == 0) {
        $err['stock_number'] = '数量は1~3桁の数字で入力してください。';
    } else {
        $stock_data['number'] = $_POST['number'];
    }

    return array($stock_data, $err);

}
