<?php
require_once('checkAccess.php');
require_once('../../connect.php');
isNotLoggin();

try{

 $pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name.'',$db_user,$db_pass);
  function getHowMuch($table){
    global $pdo;
    if (isset($_SESSION['login'])) {
        $userQuery = $pdo->prepare('SELECT COUNT(*) FROM '.$table.'');
        $userQuery->execute();
        $wynik = $userQuery->fetchColumn();
        echo $wynik;
      }
    else{
        header('Location: index.php');
        exit();
        }
      }
      }catch(PDOException $e){
          echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }

 ?>
