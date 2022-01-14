<?php
include(dirname(__FILE__).'/corplayout_login.php');
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

// 継続ログインチェック
// if (isset($_COOKIE['corpLoginCode'])) {
//   header('Location: ItemEntry.php');
// } else {
//   header('Location: corpLogin.php');
// }

// ログイン処理
if (count($_POST) === 0) {
  $message = "データを入力してください";
} else {
  if(empty($_POST["email"]) || empty($_POST["password"])) {
    $message = "メールアドレスとパスワードを入力してください";
  } else {
    try {
      $stmt = $pdo -> prepare('SELECT * FROM corpusers WHERE email=?');
      $stmt -> bindParam(1, $_POST['email'], PDO::PARAM_STR, 10);
      $stmt -> execute();
      $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    } 
    catch (PDOException $e) {
      exit('データベースエラー');
    }

    if (!password_hash($_POST['password'], PASSWORD_DEFAULT) === $result['token']) {
      $message="ユーザー名かパスワードが違います";
    } else {
      setcookie('corpLoginCode',password_hash($_POST['password'], PASSWORD_DEFAULT),time()+60*60*24*7);
      header("Location: ItemEntry.php"); //ログイン後のページにリダイレクト
      exit();
    }}}
$message = htmlspecialchars($message);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portal</title>
</head>
<body>
    
    <section class="main"> 
    <section class="sectionright container"> 

    <div class="title">
        <h4 class="titletext">CorpUser Login</h4>
    </div>
    <hr>


<form class="userentry" method="post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" class="form-control" id="exampleFormControlInput2" name="password">
</div>
<input type="submit" class="btn btn-dark btn-sm h-50" role="button" style="margin-top: 20px;" value="login"></input>
</form>
</section>
</section>
 
</body>
</html>