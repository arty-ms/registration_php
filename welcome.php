<?php 
session_start();
?>
<!DOCTYPE html>
<html><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <div>Привет, <?php  echo $_SESSION['logged_user'];?></div>
</body>
</html>