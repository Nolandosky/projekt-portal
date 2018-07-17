<?php
  require_once('../libaries/checkAccess.php');
    require_once('../../connect.php');



    try{
    	$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8',$db_user,$db_pass);

  		$userQuery = $pdo->query('SELECT * FROM users');


  		//echo $userQuery->rowCount();



  		//echo $user['id'] . " " . $user['password'];

  		if ($userQuery) {
?>
<table class="table table-condensed">
    <thead>
      <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Email</th>
        <th>Nick</th>
        <th>Ranga</th>
      </tr>
    </thead>
    <tbody>
<?php
    foreach ($userQuery as $row) {
            $_SESSION['userImie'] = $row['imie'];
              $_SESSION['userNazwisko'] = $row['nazwisko'];
                $_SESSION['userLogin'] = $row['login'];
                  $_SESSION['userEmail'] = $row['email'];
                  $_SESSION['userRang'] = $row['rang'];
                ?>

                      <tr>
                        <td><?php echo $_SESSION['userImie'] ?></td>
                        <td><?php echo $_SESSION['userNazwisko'] ?></td>
                        <td><?php echo $_SESSION['userEmail'] ?></td>
                        <td><?php echo $_SESSION['userLogin'] ?></td>
                        <td><?php echo $_SESSION['userRang'] ?></td>
                      </tr>

  <?php
            }
            ?>
          </tbody>
        </table>
            <?php
  		} else {
  			$_SESSION['bad_attempt'] = true;
  			header('Location: admin.php');
  			exit();
  		}
    }catch(PDOException $e){
    echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
    }



 ?>
