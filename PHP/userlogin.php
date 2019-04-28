<?php

	require_once("db_login.php");
		
	try {
	$login = "mysql:host=$host;dbname=$dbname";	
	$pdo = new PDO($login, $dbusername, $dbpassword, $options);
	}
	catch (\PDOException $e){
		throw new \PDOException($e->getMessage(), (int)$e->getCode());
	}
	
	$username = $_POST['username'];
	$loginpassword = $_POST['password'];
	$stmt = $pdo->prepare('Select password from user_login where username = ?');
	$stmt->execute([$username]);

	if($stmt !== false){
	$user = $stmt->fetch(PDO::FETCH_ASSOC);	
    $validPassword = password_verify($loginpassword, $user['password']);
    if($validPassword){
    echo "Welcome, " . $username ."! Your connection was successful!";
	}else{
    echo "Sorry, that information does not match our hash record. Please try again. " . "<a href='index.html'>Go back</a>";
		 }
	}
?>
