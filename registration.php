<?php
  class Registration{
    private $name;
    private $email;
    private $login;
    private $password;
    private $cpassword;
    private $errors;
    private $params;
    private $title;

    public function __construct() {
      $this->name= $_POST['name'];
      $this->email = $_POST['email'];
      $this->login = $_POST['login'];
      $this->password = $_POST['password'];
      $this->cpassword = $_POST['cpassword'];
      $this->errors = [];
      $this->params = Array($this->name, $this->email, $this->login, $this->password, $this->cpassword);
      $this->title = Array('name', 'email','login','password', 'retype password');
    }

    function is_empty(){
    for ($i = 0; $i <= 4; $i++) {
      if (empty($this->params[$i])){
        $this->errors += [$this->title[$i]=>'is empty'];
        }
      }
      return $this->errors;
    }


    function validate_email(){
    if (!(filter_var($this->email, FILTER_VALIDATE_EMAIL))) {
      $this->errors += [$this->title[1]=>'incorrect email'];
      }
      return $this->errors;
    }

    function validate_unique(){
    $xml = simplexml_load_file("db.xml");
    foreach($xml->User as $this->user){
      if($user->login == $_POST['login']){
        $this->errors += [$this->title[2]=>'not unique'];}
      if($user->email == $_POST['email']){
        $this->errors += [$this->title[1]=>'not unique'];
        }
      }
      return $this->errors;
    }

    function password_equal(){
    if (!($this->password == $this->cpassword)){
      $this->errors += [$this->title[4]=>'not equal password'];
      }
      return $this->errors;
    }

    function session_cookie(){
      session_start();
      setcookie("login",$this->login);
      $_SESSION['logged_user'] = $this->login;
    }

    function db_write(){
      $xml = new DOMDocument("1.0", "UTF-8");
      $xml->load("db.xml");
      $rootTag = $xml->getElementsbyTagName("database")->item(0);
      $dataTag = $xml->createElement("User");
      $userTag = $xml->createElement("name", $this->name);
      $emailTag = $xml->createElement("email", $this->email);
      $loginTag = $xml->createElement("login", $this->login);
      $pass = md5(stripslashes(trim($this->password)));
      $passwordTag = $xml->createElement("password", $pass."wwqwq");
      $dataTag->appendChild($userTag);
      $dataTag->appendChild($emailTag);
      $dataTag->appendChild($passwordTag);
      $dataTag->appendChild($loginTag);
      $rootTag->appendChild($dataTag);
      $xml->save("db.xml");           
    }
}
$reg = new Registration;
$errors = [];
$errors += $reg->is_empty();
$errors +=$reg->validate_email();
$errors +=$reg->password_equal();

if (empty($errors)){
  $reg->session_cookie();
  $reg->db_write();}
else{
  echo json_encode($errors);
}
?>