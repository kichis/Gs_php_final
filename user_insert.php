<?php
// ユーザーが語りを投稿する

session_start(); 
include("funcs.php");

ss_chg();
avoid();

$user = $_SESSION["user_id"];
$title = $_POST["title"];
$content = $_POST["content"];

$pdo = db_conn();
// データ登録SQL作成
$sql = "INSERT INTO stories(user, title, content, date, horror, status) VALUES(:user, :title, :content, sysdate(), 0, 1)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user', $user, PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', $title, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':content', $content, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//データ登録処理後
if($status==false){
  sql_error();
}else{
  redirect("mystory.php");
}
?>