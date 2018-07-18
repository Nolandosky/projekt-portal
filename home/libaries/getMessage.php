<?php
require_once('checkAccess.php');

require_once('../../connect.php');
isNotLoggin();

$tytul = $_POST['tytul'];
$tresc = $_POST['tresc'];
$autor = $_SESSION['nick'];
try{

 $pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8',$db_user,$db_pass);
  function getHowMuch($table){
    global $pdo;
    global $tytul;
    global $tresc;
    global $autor;
    $data = date("Y-m-d H:i:s");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_SESSION['login'])) {
        $userQuery = $pdo->exec("INSERT into $table VALUES('','$tytul','$tresc','$autor','$data')");
        $_SESSION['info'] = "Wysłano do chuja pana";
        header("Location: ../user/message.php");

      }
    else{
        header('Location: index.php');
        exit();
        }
      }
      }catch(PDOException $e){
          echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
getHowMuch(messages)
 ?>
