<?php 
session_start();
include("funcs.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- base font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@500&display=swap" rel="stylesheet">
    <!-- specific font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
    <title>あなたと百物語　｜　ログイン</title>

</head>

<body class="body">
    <?php 
    if($_SESSION["user_status"]==1){
        include("menu_user.php");
    }else if($_SESSION["user_status"]==2){
        include("menu_admin.php");
    }else if($_SESSION["user_status"]==3){
        include("menu_ban.php");
    }else{   //session: 0/なし
        include("menu_visit.php");
    }
    ?>

    <div id="mainImage">
        <div id="login_1">
            <form method="post" action="login_act.php">
                <div class="jumbotron mx-auto pb-3">
                    <h3 class="mb-4">「語り手」ログイン</h3>

                    <p>Email：<input type="email" name="email" class="form-control"></p>
                    <p>パスワード：<input type="password" name="passw" class="form-control"></p>

                <button type="submit" class="btn btn-lg btn-secondary" name='action' value='send'>入る</button>
                <a href="signin.php" style="color: blue"><b>「語り手」アカウントを作成</b></a>
                <p class="mt-5">（あなたの体験を語るには「語り手」への登録が必要です）</p>
                </div>
                
            </form>
        
        </div>
    </div>

<!-- copyright -->
    <?php include("copyright.php"); ?>



<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>