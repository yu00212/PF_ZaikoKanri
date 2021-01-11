<?php
require_once('../login_certification/certification.php');
certification();

if(isset($_POST['disp']) == true)
{
  if(isset($_POST['user_id']) == false)
  {
    header('Location:user_ng.php');
    exit();
  }
  $user_id = $_POST['user_id'];
  header('Location:user_disp.php?user_id='.$user_id);
  exit();
}

if(isset($_POST['add']) == true)
{
  header('Location:user_add.php');
  exit();
}

if(isset($_POST['edit']) == true)
{
  if(isset($_POST['user_id']) == false)
  {
    header('Location:user_ng.php');
    exit();
  }
  $user_id = $_POST['user_id'];
  header('Location:user_edit.php?user_id='.$user_id);
  exit();
}

if(isset($_POST['delete']) == true)
{
  if(isset($_POST['user_id']) == false)
  {
    header('Location:user_ng.php');
    exit();
  }

  $user_id = $_POST['user_id'];
  header('Location:user_delete.php?user_id='.$user_id);
  exit();

}

?>
