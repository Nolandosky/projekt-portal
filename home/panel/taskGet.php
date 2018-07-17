<?php
  require_once('../libaries/checkAccess.php');
    require_once('../../connect.php');



    try{
    $pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8',$db_user,$db_pass);

  		$userQuery = $pdo->query('SELECT * FROM task');


  		//echo $userQuery->rowCount();



  		//echo $user['id'] . " " . $user['password'];

  		if ($userQuery) {
?>
<table class="table table-condensed">
    <thead>
      <tr>
        <th>Treść</th>
        <th>Autor</th>
        <th>Data Wysłania</th>
        <th>Stan</th>
      </tr>
    </thead>
    <tbody>
<?php
    foreach ($userQuery as $row) {
              $_SESSION['taskContnet'] = $row['tresc'];
                $_SESSION['taskAuthor'] = $row['autor'];
                  $_SESSION['taskDate'] = $row['data'];
                  $_SESSION['taskStatus'] = $row['active'];
                ?>

                      <tr>
                        <td><?php echo $_SESSION['taskContnet'] ?></td>
                        <td><?php echo $_SESSION['taskAuthor'] ?></td>
                        <td><?php echo $_SESSION['taskDate'] ?></td>
                        <td><?php echo $_SESSION['taskStatus'] ?></td>
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
