<?php

if(isset($_POST['disp']) == true)
{
  if(isset($_POST['stock_id']) == false)
  {
    header('Location:stock_ng.php');
    exit();
  }
  $stock_id = $_POST['stock_id'];
  header('Location:stock_disp.php?stock_id='.$stock_id);
  exit();
}

if(isset($_POST['add']) == true)
{
  header('Location:stock_register.php');
  exit();
}

if(isset($_POST['edit']) == true)
{
  if(isset($_POST['stock_id']) == false)
  {
    header('Location:stock_ng.php');
    exit();
  }
  $stock_id = $_POST['stock_id'];
  header('Location:stock_edit.php?stock_id='.$stock_id);
  exit();
}

if(isset($_POST['delete']) == true)
{
  if(isset($_POST['stock_id']) == false)
  {
    header('Location:stock_ng.php');
    exit();
  }
  $stock_id = $_POST['stock_id'];
  header('Location:stock_delete.php?stock_id='.$stock_id);
  exit();
}

if(isset($_POST['search_name']) == true)
{
  session_start();
  $_SESSION['POST'] = $_POST['search_name'];

  if(isset($_POST['search_name']) == false)
  {
    header('Location:stock_ng.php');
    exit();
  }
  $search_name = $_POST['search_name'];
  header('Location:stock_search.php?search_name='.$search_name);
  exit();
}
