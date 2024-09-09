<?php
session_start();
$_SESSION['auth']=FALSE;

if (isset($_POST['login']) && isset($_POST['password'])) {
	if (!empty($_POST['login']) && !empty($_POST['password'])) {
		$conn=new PDO("sqlite:db/baza_nastaw.db");
		$sql='SELECT * FROM user WHERE username=:login AND password=:password';
		// var_dump($conn);
		$st=$conn->prepare($sql);
		$st->bindValue(":login", $_POST['login'], PDO::PARAM_STR);
		$st->bindValue(":password", $_POST['password'], PDO::PARAM_STR);
		$st->execute();


		if(!$row=$st->fetch(PDO::FETCH_ASSOC)) {
			$_SESSION['auth_err'] = "Brak takiego użytkownika lub niepoprawne hasło";
			header('Location: login.php');			
		} else {
			$_SESSION['auth'] = true;
			$_SESSION['user'] = $_POST['login'];
			$_SESSION['admin'] = (boolean)$row['admin_flag'];
			header("Location: index.php");
		}
		$conn=null;
	} else {
		$_SESSION['auth_err'] = "Uzupełnij obydwa pola";
		header('Location: login.php');
	}
}




