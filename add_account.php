<?php
session_start();
include("funcs.php");

//------------------------------------------
// 1. 入力チェック
//------------------------------------------
//ユーザー名 受信チェック:
if(!isset($_POST["name"]) || $_POST["name"]==""){
    exit("Param Error!: name");
}
//ユーザーid 受信チェック:
if(!isset($_POST["id"]) || $_POST["id"]==""){
    exit("Param Error!: id");
}
//パスワード 受信チェック:
if(!isset($_POST["pw"]) || $_POST["pw"]==""){
    exit("Param Error!: pw");
}

//------------------------------------------
// 2. POSTデータ取得
//------------------------------------------
$name = $_POST["name"]; //ユーザー名
$id = $_POST["id"]; //ユーザーid
$pw = $_POST["pw"]; //パスワード
$is_admin = $_POST["is_admin"]; //管理者権限の有無

//-------------------------------------------
// 3. DB接続
//-------------------------------------------
$pdo = db_connect();

//-------------------------------------------
// 4. データ登録SQL作成 
//-------------------------------------------
<<<<<<< HEAD
$stmt = $pdo->prepare("INSERT INTO login_user_table(
=======
$stmt = $pdo->prepare("INSERT INTO ec_user_table(
>>>>>>> 5d3bc7c24536b983f14d705a0872cddf49ad6ffd
    id, u_name, u_id, u_pw, is_admin, indate)VALUES(
        id, :u_name, :u_id, :u_pw, :is_admin, sysdate())");
$stmt->bindValue(':u_name', $name, PDO::PARAM_STR);
$stmt->bindValue(':u_id', $id, PDO::PARAM_STR);
$stmt->bindValue(':u_pw', $pw, PDO::PARAM_STR);
$stmt->bindValue(':is_admin', $is_admin, PDO::PARAM_INT);
$status = $stmt->execute();

//-------------------------------------------
// 5. データ登録処理後 
//-------------------------------------------
if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    // member.phpへリダイレクト（!!Location: 半角スペース注意!!）
    // exitも忘れず!!
    header("Location: login.php");
    exit;
}
?>
