<?php
// ユーザー情報を一括して更新

session_start();
include("funcs.php");

ss_chg();
avoidUser();

$user_status = $_POST["user_status"];
$user_id = $_POST["user_id"];

//DB接続
$pdo = db_conn();

//データ登録SQL作成、実行
for($i=0 ; $i<count($user_id); $i++){
    $sql .= "UPDATE users SET user_status = $user_status[$i] WHERE user_id = $user_id[$i];";
    // $stmt->bindValue(':user_status', $user_status[$i], PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    // $stmt->bindValue(':user_id', $user_id[$i], PDO::PARAM_INT);
}
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ登録処理後
if($status==false){
  sql_error();
}else{
  redirect("users.php");
}
?>