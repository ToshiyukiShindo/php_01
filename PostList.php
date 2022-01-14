<?php
include(dirname(__FILE__).'/corplayout.php');
?>
<?php
function connect(){
  $pdo = new PDO('mysql:dbname=gs-project;port=3306;host=localhost;charset=utf8','root','root');
  return $pdo;
} 
?>

<?php
try{
    $pdo = connect();
    $statement = $pdo->exec("DELETE FROM `posts` WHERE `title`='' ");
    $statement = $pdo->prepare('SELECT * FROM posts');
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
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
        <div><h4><a href="/php_01/Post.php">Post</a> / PostList</h4></div>
        <div><input class="btn btn-dark btn-sm" type="submit" value="CSV download" id="download" style="margin-right: 20vw;"></div>
    </div>
    <hr>

    <table class="table table-hover" id="mainlist">
  <thead>
    <tr>
      <th class="small"  scope="col" style="width: 100px;">PostId</th>
      <th class="small"  scope="col" style="width: 150px;">Title</th>
      <th class="small"  scope="col" style="width: 100px;">Category</th>
      <th class="small"  scope="col" style="width: 400px;">Description</th>
      <th class="small"  scope="col" colspan="2">Btn</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($result as $record){ ?>
    <tr>
      <th scope="row" style="font-size: 14px;"><?php echo $record['postid'];?></th>
      <td style="font-size: 14px;"><?php echo $record['title'];?></td>
      <td style="font-size: 14px;"><?php echo $record['category'];?></td>
      <td style="font-size: 14px;"><?php echo $record['description'];?></td>
      <td ><input type="submit" class="btn btn-dark btn-sm h-50" role="button" style="margin-top: 20px;" value="edit"></input></td>
    </tr>
    <?php }?>
  </tbody>
</table>

</section>

<script src="../php_01/csv.js"></script>
</body>
</html>