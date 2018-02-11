<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$errors = [];
	$params = Array($name, $email, $login, $password, $cpassword);
	$title = Array('name', 'email','login','password', 'retype password');

	for ($i = 0; $i <= 4; $i++) {
		if (empty($params[$i])){
			$errors += [$title[$i]=>'is empty'];
		}
	}

	if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
    	$errors += [$title[1]=>'incorrect email'];
	}

	$xml = simplexml_load_file("db.xml");
	foreach($xml->User as $user){
		if($user->login == $_POST['login']){
			$errors += [$title[2]=>'not unique'];}
		if($user->email == $_POST['email']){
			$errors += [$title[1]=>'not unique'];
		}
	}

	if (!($password == $cpassword)){
		$errors += [$title[4]=>'not equal password'];
	}

	if (empty($errors)){
		$username = $_POST['name'];
		$email = $_POST["email"];
		$xml = new DOMDocument("1.0", "UTF-8");
		$xml->load("db.xml");
		$rootTag = $xml->getElementsbyTagName("database")->item(0);
		$dataTag = $xml->createElement("User");
		$userTag = $xml->createElement("name", $name);
		$emailTag = $xml->createElement("email", $email);
		$loginTag = $xml->createElement("login", $login);
		$pass = md5(stripslashes(trim($password)));
		$passwordTag = $xml->createElement("password", $pass."wwqwq");
		$dataTag->appendChild($userTag);
		$dataTag->appendChild($emailTag);
		$dataTag->appendChild($passwordTag);
		$dataTag->appendChild($loginTag);
		$rootTag->appendChild($dataTag);
		$xml->save("db.xml");			
	}
	else{
		echo json_encode($errors);
	}

?>