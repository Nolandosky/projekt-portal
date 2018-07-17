<?php
require_once('libaries/checkAccess.php');

require_once('../connect.php');
isLoggin();
loginDataCorrect();

$email = $_POST['email'];
$password = $_POST['pass'];
//$password_hash = password_verify($password, );


  try{
  	$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name.'',$db_user,$db_pass);




	if (isset($_POST['email'])) {

		$email = filter_input(INPUT_POST, 'email');
		$password = filter_input(INPUT_POST, 'pass');

		//echo $login . " " .$password;

		$userQuery = $pdo->prepare('SELECT * FROM users WHERE email = :email');
		$userQuery->bindValue(':email', $email, PDO::PARAM_STR);
		$userQuery->execute();

		//echo $userQuery->rowCount();

		$user = $userQuery->fetch();

		//echo $user['id'] . " " . $user['password'];

		if ($user && password_verify($password, $user['password'])) {
      $_SESSION['login'] = True;
			$_SESSION['logged_id'] = $user['id'];
      $_SESSION['rang'] = $user['rang'];
      
			unset($_SESSION['bad_attempt']);
      header('Location: panel.php');
		} else {
			$_SESSION['bad_attempt'] = true;
			header('Location: index.php');
			exit();
		}

	} else {

		header('Location: index.php');
		exit();
	}


$usersQuery = $pdo->query('SELECT * FROM users');
$users = $usersQuery->fetchAll();

//print_r($users);





  }catch(PDOException $e){
  echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
  }



 ?>
