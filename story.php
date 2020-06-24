<?php 
session_start();
include("funcs.php");

$id = $_GET["id"];

// dbへ接続・指定idのレコード取得
$pdo = db_conn();
$sql = "SELECT stories.id AS id, stories.title AS title, users.user_name AS user, stories.date AS date, stories.content AS content, stories.horror AS horror FROM stories INNER JOIN users ON stories.user = users.user_id WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// レコードを変数へ
if($status==false) {
  sql_error();
}else{
  $r = $stmt->fetch();
}

// コメントを取得
$comm = showComm($id);

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

    <title>あなたと百物語</title>
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
        <!-- <div id="gray">a</div> -->
            <div id="story_1">
                <h4 style="color:blue;"><?= $r["title"];?></h4>
            
                <p style="color:white;">[&#160;語り手：<?= $r["user"];?>&#160;&#160;&#160;/&#160;&#160;&#160;<?= $r["date"];?>&#160;]</p>
                <p style="color:white;"><?= $r["content"];?></p>
                <p style="float:left; margin-right:10px;"><i class="fas fa-ghost"></i> <?= $r["horror"]?></p>
            
                <?php
                if($_SESSION["user_status"]==1||$_SESSION["user_status"]==2){
                 echo "<form mehod='get' action='add_horror.php'>
                 <button type='submit' name='horror' value='".$r["id"]."' class='btn btn-sm bg-dark text-white'>怖！</button>
                 </form>";
                }
                ?>
                <p><br>感想：</p>
                <?php
                echo $comm;
            
                if($_SESSION["user_status"]==1||$_SESSION["user_status"]==2){
                echo "<br><form method='post' action='comm_act.php'>
                <textarea name='comment' rows='3' class='form-control w-50' style='float:left'></textarea>
                <button type='submit' class='btn btn-sm bg-dark text-white ml-3' name='id' value='".$r["id"]."'>感想</button>
                </form>";
                }
                ?>
            </div>
        
         <!-- </div> -->
            <div id="story_2">
                <a href="home.php">▽ホームへ戻る</a>
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