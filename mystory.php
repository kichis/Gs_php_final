<?php 
session_start();
include("funcs.php");

ss_chg();
avoid();

$user = $_SESSION["user_id"];

// dbへ接続
$pdo = db_conn();
// 語り情報取得（新しい順に表示）
$sql = "SELECT stories.id AS id, stories.title AS title, users.user_name AS user, stories.date AS date, stories.content AS content, stories.horror AS horror FROM stories INNER JOIN users ON stories.user = users.user_id WHERE status = 1 AND user = $user ORDER BY id DESC;";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//語りデータ取り出し
$view="";
if($status==false) {
    sql_error();
}else{

}
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

    <title>あなたと百物語　｜　私の「語り」</title>

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
            <div id="mystory">
                <h4>私の「語り」</h4>
            <?php 
            while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <p style="margin-bottom:5px"><b>題：<a href="story.php?id=<?=$r["id"]?>"><?=$r["title"]?></a></b></p>
            <p>&#160;&#160;&#160;(<?=$r["date"]?>)&#160;&#160;&#160;<i class="fas fa-ghost"></i>&#160;<?=$r["horror"];?></p>
            <button class="btn btn-sm border-white mr-3 mb-5" value="<?=$r[`id`]?>" ><a href="user_edit.php?id=<?=$r["id"]?>" class="text-white">編集</a></button>
            <button class="btn btn-sm border-white mb-5"><a href="user_delete.php?id=<?=$r["id"]?>" class="text-white">削除</a></button>

            <?php
            }
            ?>
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