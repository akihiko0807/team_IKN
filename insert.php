<?php
//------------------------------------------
// 1. 入力チェック
//------------------------------------------
// registration.phpから飛んでくるのは、name, history, number, goal , fname
//受信チェック:name
if(!isset($_POST["name"]) || $_POST["name"]==""){
    exit("Param Error!: item");
}
//受信チェック:学生番号
if(!isset($_POST["number"]) || $_POST["number"]==""){
    exit("Param Error!: number");
}
//受信チェック:history
if(!isset($_POST["history"]) || $_POST["history"]==""){
    exit("Param Error!: history");
}
//受信チェック:goal
if(!isset($_POST["goal"]) || $_POST["goal"]==""){
    exit("Param Error!: goal");
}
//受信チェック:likes
if(!isset($_POST["likes"]) || $_POST["likes"]==""){
    exit("Param Error!: likes");
}
//ファイル受信チェック 受信チェック ※$_FILES["*****"]["name"]の場合
if(!isset($_FILES["fname"]["name"]) || $_FILES["fname"]["name"]==""){
    exit("Param Error!: files");
}

//------------------------------------------
// 2. POSTデータ取得
//------------------------------------------
$fname = $_FILES["fname"]["name"]; //ファイル名
$name = $_POST["name"]; //氏名
$number = $_POST["number"]; //学生番号
$history = $_POST["history"]; //略歴
$goal = $_POST["goal"]; //成し遂げたいこと
$likes = $_POST["likes"]; //趣味・好きなこと

// FileUpload処理
$upload = "../img/"; //画像アップロードフォルダへのパス
//アップロードされたファイルを../img/に移動させる
if(move_uploaded_file($_FILES['fname']['tmp_name'], $upload.$fname )){
    //FileUpload: OK
}else{
    //File upload: NG
    echo "Upload failed";
    echo $_FILE['upfile']['error'];
}

//-------------------------------------------
// 3. DB接続
//-------------------------------------------
try{
    //Password:MAMP='root',XAMPP=''
    //ID:'root', Password: 'root'
    $pdo = new PDO('mysql:dbname=gs_db; charset=utf8; host=localhost:3306','root','root');
}catch( PODException $e){
    exit('DbConnectError:'.$e->getMessage());
}

//-------------------------------------------
// 4. データ登録SQL作成 
//-------------------------------------------
$stmt = $pdo->prepare("INSERT INTO member_profile_table(
    id, name, history, number, goal, fname, indate)VALUES(
        NULL, :name, :history, :number, :goal, :fname, sysdate())");
$stmt->bindValue(':name', $item, PDO::PARAM_STR);
$stmt->bindValue(':history', $category, PDO::PARAM_STR);
$stmt->bindValue(':number', $value, PDO::PARAM_INT);
$stmt->bindValue(':goal', $goal, PDO::PARAM_STR);
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
$status = $stmt->execute();

//-------------------------------------------
// 5. データ登録処理後 
//-------------------------------------------
if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    // item.phpへリダイレクト（!!Location: 半角スペース注意!!）
    // exitも忘れず!!
    header("Location: index.php");
    exit;
}
?>
