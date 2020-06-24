<?php 
session_start();
include("funcs.php");

ss_chg();
avoidUser();

// db接続・SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM users ORDER BY user_id ASC;";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ表示取得
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

    <div id="adminImage">
        <div id="kumo"></div>
        <div id="clear">
            <table class="table text-danger">
                <tr>
                    <th class="px-4">user_id</th>
                    <th class="px-4">user_name</th>
                    <th class="px-4">email</th>
                    <th class="px-4">user_status</th>
                    
                </tr>
                <form method="post" action="admin_update.php">
                <?php
                while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
                    ?>
                <tr>
                    <td class="px-4"><?=$r["user_id"]?></td>
                    <input type="hidden" name="user_id[]" value="<?=$r["user_id"]?>">
                    <td class="px-4"><?=$r["user_name"]?></td>
                    <td class="px-4"><?=$r["email"]?></td>
                    <td class="px-4">
                        <input type="number" min="0" max="3" name="user_status[]" id="" value="<?=$r["user_status"]?>">
                    </td>
                </tr>
                 <?php 
                }
                ?>
            </table>
            <button type="submit" class="btn btn-md bg-secondary text-white" style="margin-left:220px;">更新する</button>
            </form>
            <p>※ user_status <br>
            0:退会済み<br> 1:登録ユーザー<br> 2:管理者<br> 3:ブラックリストユーザー</p>
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