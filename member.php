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
$stmt = $pdo->prepare("SELECT * FROM ec_table WHERE id=:id");
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
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/jquery.bxslider.css">
</head>
<body class="cms">

<!-- header
    <header class="header">
        <p class="site-title"><a href="../index.php"><img 
        src="../img/common/logo.png" alt="G's Academy Tokyo"></a></p>
        <a href="cart.pho" class="btn btn-cart"><img src="./img/cart.png" alt="G's Academy Tokyo"></a>
        <a href="#" class="btn btn-menu"><img src="./img/menu.png" alt=""></a>
    </header>
end header-->
<form action="cartadd.php" method="POST">
    <div class="outer">
        <!--商品本情報-->
        <div class="wrapper wrapper-item flex-parent">
            <main class="wrapper-main">

            <!--商品情報-->
            <p class="item-thumb"><img src="./img/<?=$row["fname"]?>" width="200"></p>
            <div class="flex-parent item-label">
                <h1 class="item-name"><?=$row["item"]?></h1>
                <p class="item-category"><?=$row["category"]?></p>
                <p class="item-price"><?=$row["value"]?></p>
                <p><input type="number" value="1" name="num" class="cartin-number"></p>
            </div>
            <!--カートボタン-->
            <div class="flex-parent item-label">
                <input type="submit" class="btn-cartin" value="カートに入れる">
            </div>
            <!--商品詳細情報-->
            <div class="flex-parent item-label">
                <p class="item-text"><?=$row["description"]?></p>
            </div>

            <!--ワザ：ここでは隠して、cartページに値を飛ばす-->
            <input type="hidden" name="item" value="<?=$row["item"]?>" >
            <input type="hidden" name="category" value="<?=$row["category"]?>" >
            <input type="hidden" name="value" value="<?=$row["value"]?>" >
            <input type="hidden" name="id" value="<?=$row["id"]?>" >
            <input type="hidden" name="fname" value="<?=$row["fname"]?>" >
            </main>
        </div>
    </div>
</form>

<!-- footer

<footer class="footer">
        <div class="wrapper wrapper-footer">
            <div class="footer-widget__long">
                <p><a href="#"><img src="./img/common/logo.png" alt="g's academy tokyo"></a></p>
            </div>
            <div class="footer-widget">
                <ul class="nav-footer">
                    <li class="nav-footer__item"><a href="#">Category</a></li>
                    <li class="nav-footer__item"><a href="#">Category</a></li>
                    <li class="nav-footer__item"><a href="#">Category</a></li>
                    <li class="nav-footer__item"><a href="#">Category</a></li>
                    <li class="nav-footer__item"><a href="#">Category</a></li>
                </ul>
            </div>

            <div class="footer-widget">
                <ul class="nav-footer">
                    <li class="nav-footer__item"><a href="#">G's Academy</a></li>
                    <li class="nav-footer__item"><a href="#">Contact Us</a></li>
                    <li class="nav-footer__item"><a href="#">Cart</a></li>
                    <li class="nav-footer__item"><a href="#">Member's page</a></li>
                </ul>
            </div>
        </div>
        <p class="copyrights"><small>Copyrights G's Academy Tokyo All Rights Reserved.</small></p>
    </footer>
end footer-->

</body>
</html>