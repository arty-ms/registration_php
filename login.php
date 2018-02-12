<?php
  class Login{
    private $login;
    private $password;
    private $errors;
    private $params;
    private $title;

    public function __construct() {
      $this->login = $_POST['login'];
      $this->password = $_POST['password'];
      $this->errors = [];
      $this->params = Array($this->login, $this->password);
      $this->title = Array('login','password');
    }

    function is_empty(){
      for ($i = 0; $i <= 1; $i++) {
        if (empty($this->params[$i])){
            $this->errors += [$this->title[$i]=>'is empty'];
        }
      }
      return $this->errors;
    }

    function user_exist(){
      $xml = simplexml_load_file("db.xml");
      foreach($xml->User as $user){
        if($user->login == $this->login){
          $errors = [];
          $pass = md5(stripslashes(trim($this->password)));
          if($user->password == $pass."wwqwq"){
            return $this->errors;;}
          else{
            $this->errors += [$this->title[1]=>'not correct'];
            return  $this->errors;
          }
        }
          
      }
      $this->errors += [$this->title[0]=>'not correct'];
      return  $this->errors;
    }

      
    function set_session_cookie(){
      setcookie("login",$this->login);
      session_start();
      $_SESSION['logged_user'] = $this->login;
    }
}

$log = new Login;
$errors = [];
$errors = $log->is_empty();
$errors = $log->user_exist();
if (!(empty($errors))){
  echo json_encode($errors);
}
else{
  $log->set_session_cookie();
}
?>