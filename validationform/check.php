<?php
  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

  if (mb_strlen($login)<5){
    echo "Введений логін занадто короткий, кількість символів повинна перевищувати 5";
    exit();
  }
  if (mb_strlen($name)==0){
    echo "Введіть ім'я, поле не може бути пустим";
    exit();
  }
  if (mb_strlen($pass)<5){
    echo "Занадто короткий пароль, кількість символів повинна перевищувати 5";
    exit();
  }
  $passmodify = md5($pass."f,bhdfkr");
  $mysql = new mysqli('localhost','root','112233','gora-users-bd');
  $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) 
   VALUES('$login','$passmodify','$name')");
  $mysql->close();
 
  header('Location: /Gora/author.html');
?>