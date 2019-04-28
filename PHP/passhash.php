<html>
 <head>
  <title>Password Hash</title>
 </head>
<?php

$password = 'passwordtest';
$passwordHashed = password_hash($password, PASSWORD_BCRYPT);
echo $passwordHashed;

?>
</html>




