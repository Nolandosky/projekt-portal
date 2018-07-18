<?php
session_start();

function isNotLoggin(){
  if(!isset($_SESSION['login'])){
    header('Location: ../index.php');
  }
}

#Funkcja sprawdza czy istnieje zmienna sesyjna o nazwie "login"
#Jeśli jest przekieruje na panel.php
function isLoggin(){
  if(isset($_SESSION['login'])){
    header('Location: panel.php');
  }
}

#Funkcja sprawdza czy istnieją wartości wysłane POSTem o nazwie "email" oraz "pass"
function loginDataCorrect(){
  if(!isset($_POST['email']) || !isset($_POST['pass']) ){
      header('Location: index.php');
  }
}
 ?>
