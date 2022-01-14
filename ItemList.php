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
    $statement = $pdo->prepare('SELECT * FROM items');
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

<!-- 商品登録欄 -->
<div class="ItemEntry">

    <div class="title">
        <div><h4><a href="/php_01/ItemEntry.php">ItemEntry</a> / ItemList</h4></div>
        <div><input class="btn btn-dark btn-sm" type="submit" value="CSV download" id="download" style="margin-right: 20vw;"></div>
    </div>
    <hr>
    
    <table class="table table-hover" id="mainlist">
  <thead>
    <tr>
      <th class="small" scope="col" style="width: 100px;">Image</th>
      <th class="small" scope="col" style="width: 100px;">Itemcode</th>
      <th class="small"  scope="col" style="width: 100px;">category</th>
      <th class="small"  scope="col" style="width: 100px;">Itemname</th>
      <th class="small"  scope="col" style="width: 100px;">Price</th>
      <th class="small"  scope="col" style="width: 200px;">Description</th>
      <th class="small"  scope="col" style="width: 100px;">Created at</th>
      <th class="small"  scope="col" colspan="2">Btn</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($result as $record){ ?>
    <tr>
      <th scope="row" ><img src="<?= $record['imgurl']?>" alt="" style="width:100px; height:100px;"></th>
      <td><?php echo $record['itemcode'];?></td>
      <td><?php echo $record['category'];?></td>
      <td><?php echo $record['itemname'];?></td>
      <td><?php echo $record['price'];?></td>
      <td><?php echo $record['description'];?></td>
      <td><?php echo $record['created_at'];?></td>
      <td><a type="submit" class="btn btn-dark btn-sm h-50" style="margin-top: 20px;">edit</a></td>
    </tr>
    <?php }?>
  </tbody>
</table>

</div>

</section>

<script src="../php_01/csv.js"></script>
</body>
</html>