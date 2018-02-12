<?php
  $login = $_POST['login'];
  $password = $_POST['password'];
  $errors = [];
  $params = Array($login, $password);
  $title = Array('login','password');
  for ($i = 0; $i <= 1; $i++) {
    if (empty($params[$i])){
        $errors += [$title[$i]=>'is empty'];
    }
  }

  $xml = simplexml_load_file("db.xml");
  foreach($xml->User as $user){
    if($user->login == $login){
      $errors = [];
      $pass = md5(stripslashes(trim($password)));
      if($user->password == $pass."wwqwq"){
        break;}
      else{
        $errors += [$title[1]=>'not correct'];
      }
    }
    else{
      $errors += [$title[0]=>'not correct'];
    }
  }

  if (!(empty($errors))){
    echo json_encode($errors);      
  }
  else{
    setcookie("login",$login);
    session_start();
    $_SESSION['logged_user'] = $login;    
  }
?>