<?php 
session_start();
include("funcs.php");

ss_chg();
avoid();

$id = $_GET["id"];

// dbへ接続
$pdo = db_conn();
// 該当の語り情報取得
$sql = "SELECT * FROM stories WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

// 語りデータ取り出し
$view="";
if($status==false) {
    sql_error();
}else{
    $r = $stmt->fetch();
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

    <title>あなたと百物語　｜　「語り」を編集</title>
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
        <div id="user_edit_1">
            <form method="post" action="user_update.php">
                <h4 style="color:blue;margin-bottom:16px">題</h4><input type="text" name="title" id="" class="form-control w-75" style="margin-bottom:16px" value="<?=$r["title"];?>">

                <p style="color:blue;">語り</p><textarea name="content" id="" cols="30" rows="20" class="form-control w-75 mb-3"><?=$r["content"];?></textarea>

                <input type="hidden" name="id" value="<?=$r["id"];?>">
                <input type="submit" value="上書き" class="btn bg-gray text-white border-white">
                <input type="hidden" name="hoge" value="1">
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