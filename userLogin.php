<?php
include(dirname(__FILE__).'/userlayout.php');
?>
<?php
function connect(){
  $pdo = new PDO('mysql:dbname=gs-project;port=3306;host=localhost;charset=utf8','root','root');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  return $pdo;
}
?>

<?php
session_start();

$pdo = connect();

if (isset($_SESSION["login"])) {
  session_regenerate_id(TRUE);
  header("Location: portal.php");
  exit();
}
if (count($_POST) === 0) {
  $message = "データを入力してください";
} else {
  if(empty($_POST["useremail"]) || empty($_POST["userpassword"])) {
    $message = "メールアドレスとパスワードを入力してください";
  } else {
    try {
      $sql = "SELECT * FROM `users` WHERE `email` LIKE :email";
      $stmt = $pdo -> prepare($sql);
      $stmt -> bindValue(':email', $_POST['useremail'], PDO::PARAM_STR);
      $stmt -> execute();
      $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    } 
    catch (PDOException $e) {
      exit('データベースエラー');
    }

    if (!password_hash($_POST['password'], PASSWORD_DEFAULT) === $result['token']) {
      $message="ユーザー名かパスワードが違います";
    } else {
      setcookie('LoginCode',password_hash($_POST['password'], PASSWORD_DEFAULT),time()+60*60*24*7);
      header("Location: portal.php"); //ログイン後のページにリダイレクト
      exit();
    }}}
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
  <section class="main"> 

<section class="sectionright container">

<div class="title">
        <h4 class="titletext">User Login</h4>
    </div>
    <hr>

    <form class="userentry" action="/php_01/userLogin.php" method="post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="useremail" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput2" class="form-label">Password</label>
  <input type="password" class="form-control" id="exampleFormControlInput2" name="userpassword">
</div>
<input type="submit" class="btn btn-dark btn-sm h-50" role="button" style="margin-top: 20px;" value="login"></input>
</form>
</section>
</section>

</body>
</html>