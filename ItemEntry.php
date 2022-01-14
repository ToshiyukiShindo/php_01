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
    $itemcode = $_POST['itemcode'];
    $cate = $_POST['category'];
    $itemname = $_POST['itemname'];
    $price = $_POST['price'];
    $des = $_POST['description'];
    $url = $_POST['imgurl'];
    $date = date('y-m-d');
    $statement = $pdo->exec("INSERT INTO `items`(`itemcode`, `category`, `itemname`, `price`, `description`, `imgurl`, `created_at`, `updated_at`) VALUES ('$itemcode','$cate','$itemname','$price','$des','$url','$date','$date')");
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
        <h4 class="titletext">ItemEntry / <a href="/php_01/ItemList.php">ItemList</a></h4>
    </div>
    <hr>
    
    <form class="userentry" action="/php_01/ItemEntry.php" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Itemcode</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="itemcode" placeholder="Item_number">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category</label>
            <input type="number" class="form-control" id="exampleFormControlInput2" name="category" placeholder="1/2/3">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Itemname</label>
            <input type="text" class="form-control" id="exampleFormControlInput3" name="itemname" placeholder="Enter the name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input type="number" class="form-control" id="exampleFormControlInput4" name="price" placeholder="10000">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea6" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Image url</label>
            <input type="text" class="form-control" id="exampleFormControlInput7" name="imgurl" placeholder="/php_01/asset/xxx.png">
        </div>
        <input type="submit" class="btn btn-dark btn-sm h-50" role="button" style="margin-top: 20px;" value="register"></input>
    </form>

</div>

</section>



</body>
</html>