<?php
session_start();

//GETでidを取得
if(!isset($_GET["id"]) || $_GET["id"]=="" ){
    exit("ParamError!!");
}else{
    $id = intval($_GET["id"]);
}

// DB接続
try{
    //Password:MAMP='root',XAMPP=''
    //ID:'root', Password: 'root'
    $pdo = new PDO('mysql:dbname=gs_db; charset=utf8; host=localhost:3306','root','root');
}catch( PODException $e){
    exit('DbConnectError:'.$e->getMessage());
}

// データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM member_profile_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ表示
$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //1レコードだけ取れればよい（と言うかuniqueだし)
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style_main.css">
    <link rel="stylesheet" href="./css/style_csm.css">
</head>
<body class="cms">

<form action="cartadd.php" method="POST">
    <div class="outer">
        <!--商品本情報-->
        <div class="wrapper wrapper-item flex-parent">
            <main class="wrapper-main">

            <!--商品情報-->
            <p class="item-thumb"><img src="./img/<?=$row["fname"]?>" width="200"></p>
            <div class="flex-parent item-label">
                <h1 class="item-name"><?=$row["name"]?></h1>
                <p class="item-category"><?=$row["history"]?></p>
                <p class="item-price"><?=$row["number"]?></p>
            </div>
            <!--商品詳細情報-->
            <div class="flex-parent item-label">
                <p class="item-text">わたしのゴールは<?=$row["goal"]?></p>
            </div>

            <!--ワザ：ここでは隠して、cartページに値を飛ばす-->
            <input type="hidden" name="item" value="<?=$row["name"]?>" >
            <input type="hidden" name="category" value="<?=$row["history"]?>" >
            <input type="hidden" name="value" value="<?=$row["number"]?>" >
            <input type="hidden" name="id" value="<?=$row["id"]?>" >
            <input type="hidden" name="fname" value="<?=$row["fname"]?>" >
            </main>
        </div>
    </div>
</form>



</body>
</html>