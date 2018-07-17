<?php
require_once('libaries/checkAccess.php');
isNotLoggin();

if($_SESSION['rang'] == "Admin"){
  header("Location: panel/admin.php");
}
if($_SESSION['rang'] == "User"){
  header("Location: user/account.php");
}

 ?>
