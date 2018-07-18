<?php
$data = date("Y-m-d H:i:s");
echo $data;
echo "<br>";
$pass = password_hash("123qwe123",PASSWORD_DEFAULT);
echo $pass;

 ?>
