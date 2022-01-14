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
    $statement = $pdo->prepare('SELECT * FROM Inqueries');
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    $message="失敗しました。";
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
    
<section class="sectionright container" style="width: 70vw;">

<!-- 商品登録欄 -->
<div class="ItemEntry">

    <div class="title">
        <div><h4>InquieriesList</h4></div>
        <div><input class="btn btn-dark btn-sm" type="submit" value="CSV download" id="download"></div>
    </div>
    <hr style="width: 120vw;">
    
  <table class="table table-hover" id="mainlist">
  <thead>
    <tr>
      <th class="small"  scope="col" style="width: 100px;">Date</th>
      <th class="small"  scope="col" style="width: 100px;">CustomerName</th>
      <th class="small"  scope="col" style="width: 100px;">email</th>
      <th class="small"  scope="col" style="width: 150px;">Title</th>
      <th class="small"  scope="col" style="width: 100px;">Category</th>
      <th class="small"  scope="col" style="width: 300px;">お問い合せ内容</th>
      <th class="small"  scope="col" style="width: 100px;">担当者</th>
      <th class="small"  scope="col" style="width: 120px;">対応ステータス</th>
      <th class="small"  scope="col" style="width: 100px;">完了日</th>
      <th class="small"  scope="col">btn</th>
    </tr>
  </thead>
  <tbody class="table2">
  <?php foreach($result as $record){ ?>
    <tr>
      <th scope="row" style="font-size: 12px;"><?php echo $record['created_at'];?></th>
      <td style="font-size: 12px;"><?php echo $record['customer_name'];?></td>
      <td style="font-size: 12px;"><?php echo $record['email'];?></td>
      <td style="font-size: 12px;"><?php echo $record['title'];?></td>
      <td style="font-size: 12px;"><?php echo $record['category'];?></td>
      <td style="font-size: 12px;"><?php echo $record['description'];?></td>
        <td style="font-size: 12px;"><p><?php echo $record['in_charge'];?></p></td>
        <td style="font-size: 12px;"><p><?php echo $record['status'];?></p></td>
        <td style="font-size: 12px;"><p><?php echo $record['close_date'];?></p></td>
        <td><input type="submit" class="btn btn-dark btn-sm h-50" style="margin-top: 20px;" value="edit"></input></td>
      <td></td>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>
</section>

<script src="../php_01/csv.js"></script>
</body>
</html>