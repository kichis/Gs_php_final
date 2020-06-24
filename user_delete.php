<?php
// 「語り」を削除する

// //id データ取得
$id = $_GET["id"];

session_start();
include("funcs.php");

ss_chg();
avoid();

//DB接続します
$pdo = db_conn();

//データ登録SQL作成
$stmt = $pdo->prepare("UPDATE stories SET status = 0 WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error();
}else{
  redirect("mystory.php");
}

?>