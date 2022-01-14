<?php
include(dirname(__FILE__).'/corplayout.php');
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
    $id = $_POST['postid'];
    $title = $_POST['posttitle'];
    $cate = $_POST['category'];
    $des = $_POST['description'];
    $statement = $pdo->exec("INSERT INTO `posts`(`postid`, `title`, `category`, `description`) VALUES ('$id','$title','$cate','$des')");
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
        <h4 class="titletext">Post / <a href="/php_01/PostList.php">PostList</a></h4>
    </div>
    <hr>


<form class="userentry" action="/php_01/post.php" method="post">

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">PostId
  </label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="postid" placeholder="Enter the id">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">PostTitle
  </label>
  <input type="text" class="form-control" id="exampleFormControlInput2" name="posttitle" placeholder="Enter the title">
</div>
<div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category</label>
            <input type="text" class="form-control" id="exampleFormControlInput3" name="category" placeholder="Any keyword">
        </div>
<div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea4" name="description" rows="3"></textarea>
        </div>
<input type="submit" class="btn btn-dark btn-sm h-50" role="button" style="margin-top: 20px;" value="post"></input>
</form>
</section>



</body>
</html>