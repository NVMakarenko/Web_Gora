
<?php
  $login = filter_var(trim($_POST['loginauth']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['passauth']), FILTER_SANITIZE_STRING);

  $passmodify = md5($pass."f,bhdfkr");

  $mysql = new mysqli('localhost','root','112233','gora-users-bd');

  $result = $mysql-> query ("SELECT * FROM `users` WHERE `login`= '$login' AND `pass`='$passmodify'");
  $user = $result->fetch_assoc();
  if ($user == 0){
    echo "Wrong user or password";
    exit();}
  else{
    setcookie ('user', $user['name'],time()+3600,"/");
    header('Location: /Gora/route.html');
  }
  
  $mysql->close();
 
?>