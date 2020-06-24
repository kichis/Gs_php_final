<?php
// 怖　評価を+1する

session_start();
include("funcs.php");

ss_chg();
avoid();

$horror = $_GET["horror"];

// db接続,sql文
$pdo = db_conn();
$sql = "UPDATE stories SET horror = horror+1 WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $horror, PDO::PARAM_INT);
$status = $stmt->execute();

// 成功したら元のページに戻る
if($status==false) {
  sql_error();
}else{ 
  redirect("story.php?id=".$horror."");
}

?>