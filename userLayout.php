<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/php_01/portal.css">
    <title>portal</title>
</head>
<body>
    <header class="header">
        <div class="headerleft">
            <p>G's platform</p>
        </div>
        <div class="headerright">
            <a class="btn btn-dark btn-sm h-50" href="/php_01/portal.php" role="button">Home</a>
            <a class="btn btn-dark btn-sm h-50" href="/php_01/userLogin.php" role="button">Login</a>
            <a class="btn btn-dark btn-sm h-50" href="/php_01/userRegister.php" role="button">Register</a>
            <a class="btn btn-dark btn-sm h-50" href="/php_01/corpLogin.php" role="button">Corp</a>
            </div>
    </header>
    
    <!-- 左の検索画面 -->
    <section class="main">        
        <section class="sectionleft">
            <p class="undertext">Search</p>

            <!-- search1 -->
            <hr style="border: 0.5px solid white;">
            <p class="undertext">Items:</p>
            <form class="search" action="/php_01/portal.php" method="get">
                <select class="form-select form-select-sm w-75" name="itemslist" style="margin-top:10px;" aria-label=".form-select-sm example">
                    <option value="itemcode">ItemCode</option>
                    <option value="category">category</option>
                    <option value="itemname">ItemName</option>
                    <option value="description">Description</option>
                </select>
                <input class="form-control form-control-sm w-75" name="itemskey" style="margin-top:10px;" type="text" placeholder="keyword" aria-label=".form-control-sm example">
                <input class="btn btn-dark btn-sm w-50" type="submit" value="Set" style="margin-top:10px;">
            </form>

            <!-- search2 -->
            <hr style="border: 0.5px solid white;">
            <p class="undertext">Posts:</p>
            <form class="search" action="/php_01/portal.php" method="get">
                <select class="form-select form-select-sm w-75" name="postslist" style="margin-top:10px;" aria-label=".form-select-sm example">
                    <option value="postid">PostId</option>
                    <option value="title">Title</option>
                    <option value="category">Category</option>
                    <option value="description">Description</option>
                </select>
                <input class="form-control form-control-sm w-75" name="postskey" style="margin-top:10px;" type="text" placeholder="keyword" aria-label=".form-control-sm example">
                <input class="btn btn-dark btn-sm w-50" type="submit" value="Set" style="margin-top:10px;">
            </form>
        </section>
        
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>