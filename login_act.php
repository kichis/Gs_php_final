<?php
session_start();

// ログインフォームからの値を受ける 
$email = $_POST["email"];
$passw = $_POST["passw"];

include("funcs.php");

// dbへ接続
$pdo = db_conn();

//データ検索SQL作成
$sql = "SELECT * FROM users WHERE email=:email";
$stmt = $pdo->prepare($sql); //* PasswordがHash化の場合→条件はlidのみ
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
// $stmt->bindValue(':passw', $passw, PDO::PARAM_STR); //* PasswordがHash化する場合はコメントする
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status==false){
  sql_error();
}

//抽出データ数を取得
$val = $stmt->fetch();   

//該当レコードがあればSESSIONに値を代入
if(password_verify($passw, $val["passw"])){ //* PasswordがHash化の場合はこっちのIFを使う
// if( $val["user_id"] != "" ){
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id(); //この認証が通ったときのKEYを渡しておく
  $_SESSION["user_name"] = $val['user_name'];
  $_SESSION["user_id"] = $val['user_id'];
  $_SESSION["user_status"] = $val['user_status'];
  redirect("home.php");
}else{
  //Login失敗時(Logout経由)
  redirect("login.php");
}
exit();

?>