<?php
// コメントを投稿する

session_start();
include("funcs.php");

ss_chg();
avoid();

$comment = $_POST["comment"];
$id = $_POST["id"];
$user = $_SESSION["user_id"];
var_dump($user);

// db接続,sql文
$pdo = db_conn();
$sql = "INSERT INTO comments(story_id, comm_user, comment) VALUES(:id, :user, :comm)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':user', $user, PDO::PARAM_INT);
$stmt->bindValue(':comm', $comment, PDO::PARAM_STR);
$status = $stmt->execute();

// 成功したら元のページに戻る
if($status==false) {
  sql_error();
}else{ 
  redirect("story.php?id=".$id."");
}
?>