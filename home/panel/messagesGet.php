<?php
  require_once('../libaries/checkAccess.php');
    require_once('../../connect.php');



    try{
    	$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8',$db_user,$db_pass);

  		$userQuery = $pdo->query('SELECT * FROM messages');


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
      </tr>
    </thead>
    <tbody>
<?php
    foreach ($userQuery as $row) {
            $_SESSION['messageTitle'] = $row['tytul'];
              $_SESSION['messageContnet'] = $row['tresc'];
                $_SESSION['messageAuthor'] = $row['autor'];
                  $_SESSION['messageDate'] = $row['data'];
                ?>

                      <tr>
                        <td><?php echo $_SESSION['messageTitle'] ?></td>
                        <td><?php echo $_SESSION['messageContnet'] ?></td>
                        <td><?php echo $_SESSION['messageAuthor'] ?></td>
                        <td><?php echo $_SESSION['messageDate'] ?></td>
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
