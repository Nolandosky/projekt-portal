<?php
  require_once('../libaries/checkAccess.php');
    require_once('../../connect.php');



    try{
    	$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8',$db_user,$db_pass);

  		$userQuery = $pdo->query('SELECT * FROM alerts');


  		//echo $userQuery->rowCount();



  		//echo $user['id'] . " " . $user['password'];

  		if ($userQuery) {
?>
<table class="table table-condensed">
    <thead>
      <tr>
        <th>Tytuł</th>
        <th>Treść</th>
        <th>Autor</th>
        <th>Data Wysłania</th>
        <th>Stan</th>
      </tr>
    </thead>
    <tbody>
<?php
    foreach ($userQuery as $row) {
            $_SESSION['alertTitle'] = $row['tytul'];
              $_SESSION['alertContnet'] = $row['tresc'];
                $_SESSION['alertAuthor'] = $row['autor'];
                  $_SESSION['alertDate'] = $row['data'];
                  $_SESSION['alertStatus'] = $row['active'];
                ?>

                      <tr>
                        <td><?php echo $_SESSION['alertTitle'] ?></td>
                        <td><?php echo $_SESSION['alertContnet'] ?></td>
                        <td><?php echo $_SESSION['alertAuthor'] ?></td>
                        <td><?php echo $_SESSION['alertDate'] ?></td>
                        <td><?php echo $_SESSION['alertStatus'] ?></td>
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
