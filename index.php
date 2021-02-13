<?php
session_start();
include("funcs.php");
$view="";

// 0.1 ログイン状況のチェック
if( $_SESSION["name"]!="" ){
    $u_name = '<p class="header-menu-text">ようこそ '.$_SESSION["name"].'さま</p>';
    $u_name .= '<p class="header-menu-text"><a href="./logout.php">ログアウト</a></p>';
}else{
    $u_name = '<p id="user_name" class="header-menu-text"><a href="./login.php">ログイン</a></p>';
}
// 0.2 管理者権限のチェック（"is_admin==1" で管理者画面へのリンクを表示）
if( $_SESSION["is_admin"]==1 ){
    $is_admin = 1;
}else{
    $is_admin = 0;
}

$_SESSION["login_status"] = true;

function getItems( $query ){
    $pdo = db_connect();
    $stmt = $pdo->prepare( $query );
    $status = $stmt->execute();

    $view="";

    if($status==false){
        $error = $stmt->errorInfo();
        exit("ErrorQuery".$error[2]);
    }else{
        //SELECTデータの数だけ自動でループしてくれる
        while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view .= '<div class="item-container">';
            $view .= '<a href="member.php?id='.$res["id"].'" style="text-decoration: none;">';
            $view .=    '<ul class="item-contents">';
            $view .=       '<li class="item-contents-upper">';
            $view .=          '<p><img class="item-thub" src="./img/'.$res['fname'].'" alt=""></p>';
            $view .=       '</li>';
            $view .=       '<li class="item-contents-middle">';
            $view .=          '<p class="products-text item-title">'.$res['name'].'</p>';
            $view .=          '<p class="products-text item-category">'.$res['history'].'</p>';
            $view .=       '</li>';
            $view .=       '<li class="item-contents-lower">';
            $view .=          '<p class="products-text item-price">¥'.$res['number'].'</p>';
            $view .=       '</li>';
            $view .=     '</ul>';
            $view .= '</a>';
            $view .= '</div>';
        }
        return $view;
    }
}

if( !isset($_SESSION["results"])||$_SESSION["results"] != "" ){
    $view = getItems( "SELECT * FROM member_profile_table" );
}else{
    $view = $_SESSION["results"];
    $_SESSION["results"] = "";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>G's Members</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style_main.css">
</head>
<body class="top">
    <!--header-->
    <header class="header">
        <div class="header__flex">
            <div class="div-top-logo"><a href="./index.php"><img 
            src="./img/gslogo.jpg" class="fig-site-logo" alt="G's logo 画像"></a>
            </div>
            <div class="site-title">
                <h1>G's Members</h1>
                <br>
                <p class="site-subtitle">DEV-18</p>
            </div>
            <nav>
                <ul>
                    <li id="registration">
                        <div class="header-menu registration">
                            <a href="./registration.php">
                            <img src="./img/common/registration-icon.png" class="fig-header-menu">
                            <p class="header-menu-text">登録画面へ</p>
                            </a>
                        </div>
                    </li>
                    <li id="admin">
                        <div class="header-menu admin" visibility="hidden">
                            <a href="./cms/item_list.php">
                            <img src="./img/common/admin-icon.png" class="fig-header-menu">
                            <p class="header-menu-text">管理画面へ</p>
                            </a>
                        </div>
                    </li>
                    <li id="login_user">
                        <div class="header-menu">
                        <img src="./img/common/user-icon.png" class="fig-header-menu" alt="ログイン">
                        <?php echo $u_name;?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!--end header-->

    <div class="outer">
        <div class="main-item-list">
            <div class="wrapper wrapper-main flex-parent">
                <main class="wrapper-main">
                    <div class="item-list">
                        <?php echo $view;?>
                    </div>
                </main>
            </div>
        </div>
    </div>

<!--footer -->
<footer class="footer">
    <p class="copyrights"><small>Copyrights Team IKN All Rights Reserved.</small></p>
</footer>
<!-- end footer-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    if(<?=$is_admin?>==1){
        $(".admin").css({"visibility":"visible"});
        console.log("activate_admin_mode");
    }
</script>
</body>
</html>