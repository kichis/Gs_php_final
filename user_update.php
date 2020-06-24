<?php
// 「語り」を編集する

session_start();
include("funcs.php");

ss_chg();
avoid();

$id = $_POST["id"];
$title = $_POST["title"];
$content = $_POST["content"];

// -------------------------------おばけポイント部分（途中）
$user_id = $_SESSION["user_id"];
$hoge = $_POST["hoge"];

// dbへ接続
$pdo = db_conn();

// g-point
if($hoge=="1"){
  $sql = "UPDATE users SET g_point = g_point+1 WHERE user_id=:user_id";
  $stmt = $pdo->prepare($sql); 
  $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
  $status = $stmt->execute();
}
// ----------------------------------

//DB接続
$pdo = db_conn();
//データ登録SQL作成
$sql = "UPDATE stories SET title = :title, content = :content WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':content', $content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//データ登録処理後
if($status==false){
  sql_error();
}else{
  redirect("mystory.php");
}

?>