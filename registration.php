<?php
session_start();
include("funcs.php");
loginCheck();
$pdo = db_connect();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>登録画面</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/jquery.bxslider.css">
</head>
<body class="cms">

<!-- header -->
<header class="header">
    <p class="site-title"><a href="index.php"><img 
    src="../img/common/gslogo.png" alt="G's Academy Tokyo"></a></p>
</header>

<!-- end header-->

    <div class="outer">
    <h1 class="page-title page-title_cms">個人情報登録</h1>
        <!--個人情報-->
        <div class="wrapper wrapper-cms">
            <!--商品選択フォーム-->
            <form action="insert.php" method="post" class="flex-parent cart cms-area"
            enctype="multipart/form-data">

            <!--個人情報-->
            <!-- id, name, history, number, goal , fname, indate -->
            <p class="cms-thumb"><img src="hoge" wodth="200"></p>
            <dl class="cms-list">
                <dt>ご自身の画像</dt>
                <dd><input type="file" name="fname" class="cms-item" acccept="image/*"></dd>
                <dt>お名前</dt>
                <dd><input type="text" name="name" placeholder="氏名を入力" class="cms-item"></dd>
                <dt>学生番号</dt>
                <dd><input type="text" name="nunber" placeholder="学生番号を入力（わからない場合は空欄）" class="cms-item"></dd>
                <dt>略歴</dt>
                <dd><textarea name="history" cols="30" rows="10" placeholder="学歴・職歴を簡単にご紹介ください" class="cms-item"></textarea></dd>
                <dt>G'sで成し遂げたいこと</dt>
                <dd><textarea name="goal" id="" cols="30" rows="10" placeholder="意気込みを！" class="cms-item"></textarea></dd>
                <dt>趣味・好きなこと</dt>
                <dd><textarea name="likes" id="" cols="30" rows="10" class="cms-item"></textarea></dd>
            </dl>
            <!--end 個人情報-->

            <input type="submit" id="btn-update" value="登録">
            </form>
            <!--end 商品選択フォーム-->
        </div>
        <!--end 商品本情報-->
</div>

    <script src="http://code.jquery.com/jquery-3.0.0.js"></script>
    <script>
    //----------------------------------------------
    //画像サムネイル表示
    //----------------------------------------------
    //アップロードするファオルを選択
    $('input[type=file]').change( function(){
        //選択したファイルを取得し、file変数に格納
        var file = $(this).prop('files')[0];
        //画像以外は処理を中止
        if(!file.type.match('image.*')){
            //クリア
            $(this).val(''); //選択されているファイルを空にする
            $('.cms-thumb > img').html(''); //画像表示を空にする
            return;
        }
        //画像表示
        var reader = new FileReader();
        reader.onload = function(){
            $('.cms-thumb > img').attr('src', reader.result);
        }
        reader.readAsDataURL(file);
    });
    </script>
</body>
</html>