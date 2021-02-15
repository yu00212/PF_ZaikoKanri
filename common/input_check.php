<?php

$post = $_POST;

function validateStock($post, $smarty)
{
    $err[] = '';
    $stock_data[] = '';
    $limit = 20;
    $stockLength = mb_strlen($_POST['stock_name']);

    if (!empty($_POST['stock_id'])) {
        $stock_data['stock_id'] = $_POST['stock_id'];
    }

    if ($_POST['purchase_date'] == '') {
        $err['purchase_date'] = '購入日が入力されていません。';
    } else {
        list($year, $month, $day) = explode("-", $_POST['purchase_date']);
        if (!checkdate($month, $day, $year)) {
            $err['purchase_date'] = '購入日を正しい形式で入力してください。';
        } else {
            $stock_data['purchase_date'] = $_POST['purchase_date'];
        }
    }

    if ($_POST['deadline'] == '') {
        $err['deadline'] = '消費期限が入力されていません。';
    } else {
        list($year, $month, $day) = explode("-", $_POST['deadline']);
        if (!checkdate($month, $day, $year)) {
            $err['deadline'] = '消費期限を正しい形式で入力してください。';
        } else {
            $stock_data['deadline'] = $_POST['deadline'];
        }
    }

    if ($_POST['stock_name'] == '') {
        $err['name'] = '商品名が入力されていません。';
    } elseif ($stockLength > $limit) {
        $err['name'] = '商品名は２0字以内で入力してください。';
    } else {
        $stock_data['stock_name'] = $_POST['stock_name'];
    }

    if ($_POST['price'] == '') {
        $err['price'] = '値段が入力されていません。';
    } elseif (preg_match('/\A[0-9]{1,5}+\z/', $_POST['price']) == 0) {
        $err['price'] = '値段は1~5桁の数字で入力してください。';
    } else {
        $stock_data['price'] = $_POST['price'];
    }

    if ($_POST['number'] == '') {
        $err['number'] = '数量が入力されていません。';
    } elseif (preg_match('/\A[0-9]{1,3}+\z/', $_POST['number']) == 0) {
        $err['number'] = '数量は1~3桁の数字で入力してください。';
    } else {
        $stock_data['number'] = $_POST['number'];
    }

    $smarty->assign('err', $err);
    if (isset($err)) {
        $smarty->display('../smarty/templates/err.tpl');
    }

    return array($stock_data);
}

function validateUser($post, $smarty)
{
    $err[] = '';
    $user_data[] = '';
    $limit = 20;
    $userLength = mb_strlen($_POST['name']);
    $reg_str = "/\A[a-z\d]{6,50}+\z/i";

    if (!empty($_POST['user_id'])) {
        $user_data['user_id'] = $_POST['user_id'];
    }

    if ($_POST['name'] == '') {
        $err['name'] = '名前が入力されていません。';
    } elseif ($userLength > $limit) {
        $err['name'] = '名前は２0字以内で入力してください。';
    } else {
        $user_data['name'] = $_POST['name'];
    }

    if ($_POST['email'] == '') {
        $err['email'] = 'メールアドレスが入力されていません。';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $err['email'] = 'メールアドレスを正しい形式で入力してください。';
    } else {
        $user_data['email'] = $_POST['email'];
    }

    if ($_POST['pass'] == '' || $_POST['pass2'] == '') {
        $err['pass'] = 'パスワードもしくは、確認用パスワードが入力されていません。';
    } elseif (!preg_match($reg_str, $_POST['pass'])) {
        $err['pass'] = 'パスワードは半角英数字6~50文字で入力してください。';
    } elseif (!preg_match($reg_str, $_POST['pass2'])) {
        $err['pass2'] = '確認用パスワードは半角英数字6~50文字で入力してください。';
    } elseif ($_POST['pass'] !== $_POST['pass2']) {
        $err['match'] = 'パスワードが一致しません。';
    } else {
        $user_data['pass'] = $_POST['pass'];
        $user_data['pass2'] = $_POST['pass2'];
    }

    $smarty->assign('err', $err);
    if (isset($err)) {
        $smarty->display('../smarty/templates/err.tpl');
    }

    return array($user_data);
}
