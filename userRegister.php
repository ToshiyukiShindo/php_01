<?php
include(dirname(__FILE__).'/userlayout.php');
?>

<?php
function connect(){
  $pdo = new PDO('mysql:dbname=gs-project;port=3306;host=localhost;charset=utf8','root','root');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
} 
?>

<?php
try{
    $pdo = connect();
    $statement = $pdo->exec("DELETE FROM `users` WHERE `username`='' ");
    $uid = $_POST['userid'];
    $uname = $_POST['username'];
    $uemail = $_POST['email'];
    $upass = $_POST['password'];
    $uhashedpass = password_hash($pass, PASSWORD_DEFAULT);
    $statement = $pdo->exec("INSERT INTO `users`(`user id`, `username`, `email`, `password`, `token`) VALUES ('$uid','$uname','$uemail','$upass','$uhashedpass')");
    $message="登録に成功しました。";
} catch (PDOException $e){
  $message="登録に失敗しました。";
}
$message = htmlspecialchars($message);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<section class="sectionright container">

<div class="title">
        <h4 class="titletext">User Entry</h4>
    </div>
    <hr>

<form class="userentry" action="/php_01/userRegister.php" method="post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">UserId</label>
  <input type="text" class="form-control" id="exampleFormControlInput0" name="userid" placeholder="Any char you like">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">UserName</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="Enter your name">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput2" name="email" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" class="form-control" id="exampleFormControlInput3" name="password">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" class="form-control" id="exampleFormControlInput4" placeholder="Enter your pass again">
</div>
<input type="submit" class="btn btn-dark btn-sm h-50" role="button" style="margin-top: 20px;" value="Entry"></input>
</form>
<div class="message"><?php echo $message;?></div>
</section>

</body>
</html>