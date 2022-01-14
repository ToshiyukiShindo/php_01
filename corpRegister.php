<?php
include(dirname(__FILE__).'/corplayout_login.php');
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
    $id = $_POST['id'];
    $username = $_POST['corpname'];
    $email = $_POST['corpemail'];
    $pass = $_POST['corppass'];
    $hashedpass = password_hash($pass, PASSWORD_DEFAULT);
    $statement = $pdo->exec("INSERT INTO `corpusers`(`id`, `name`, `email`, `password`, `token`) VALUES ('$id','$username','$email','$pass','$hashedpass')");
    $message="登録に成功しました。";
} catch (PDOException $e){
  $message="登録に失敗しました。";
}
$message = htmlspecialchars($message);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<section class="sectionright container">

<div class="title">
        <h4 class="titletext">CorpUser Entry</h4>
    </div>
    <hr>

<form class="userentry" action="/php_01/corpRegister.php" method="post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Id</label>
  <input type="text" class="form-control" id="exampleFormControlInput0" name="id" placeholder="Enter your id">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">user name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="corpname" placeholder="Enter your name">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput2" name="corpemail" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" class="form-control" id="exampleFormControlInput3" name="corppass">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" class="form-control" id="exampleFormControlInput4" placeholder="Enter your pass again">
</div>
<input type="submit" class="btn btn-dark btn-sm h-50" role="button" style="margin-top: 20px;" value="register"></input>
</form>
<div class="message"><?php echo $message;?></div>
</section>

</body>
</html>