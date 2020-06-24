<?php 
// アカウントを作成する

include("funcs.php");

$uname = $_POST["uname"];
$email = $_POST["email"];
$passw = password_hash($_POST["passw"], PASSWORD_DEFAULT);

// dbへ接続
$pdo = db_conn();

// データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO users(user_name, email, passw, user_status) VALUES(:user_name, :email, :passw, 1)");
$stmt->bindValue(':user_name', $uname, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':passw', $passw, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//データ登録処理後
if($status==false){
  sql_error();
}else{
  redirect("login.php");
}

?>