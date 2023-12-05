<?php
require_once("./dbconnect.php");
session_start();

/* 会員登録の手続き以外のアクセスを飛ばす */
if (!isset($_SESSION['join'])) {
    header('Location: entry.php');
    exit();
}

if (!empty($_POST['check'])) {

    // 入力情報をデータベースに登録
    $statement = $db->prepare("INSERT INTO rirekisho SET id=?,name=?,name_kana=?,burthday=?,age=?,gender=?,email=?,tel1=?,tel2=?,tel3=?,postalcode1=?,prefecture1=?,prefecture_kana1=?,municipalities1=?,municipalities_kana1=?,housenumber1=?,housenumber_kana1=?,mansion1=?,mansion_kana1=?,postalcode2=?,prefecture2=?,prefecture_kana2=?,municipalities2=?,municipalities_kana2=?,housenumber2=?,housenumber_kana2=?,mansion2=?,mansion_kana2=?,p_name=?,j_name=?,h_name=?,u_name=?,pic=?");
    $statement->execute(array(
        $_SESSION['join']['id'],
        $_SESSION['join']['name'],
        $_SESSION['join']['name_kana'],
        $_SESSION['join']['birthday'],
        $_SESSION['join']['age'],
        $_SESSION['join']['gender'],
        $_SESSION['join']['email'],
        $_SESSION['join']['tel1'],
        $_SESSION['join']['tel2'],
        $_SESSION['join']['tel3'],
        $_SESSION['join']['postalcode1'],
        $_SESSION['join']['prefecture1'],
        $_SESSION['join']['prefecture_kana1'],
        $_SESSION['join']['municipalities1'],
        $_SESSION['join']['municipalities_kana1'],
        $_SESSION['join']['housenumber1'],
        $_SESSION['join']['housenumber_kana1'],
        $_SESSION['join']['mansion1'],
        $_SESSION['join']['mansion_kana1'],
        $_SESSION['join']['postalcode2'],
        $_SESSION['join']['prefecture2'],
        $_SESSION['join']['prefecture_kana2'],
        $_SESSION['join']['municipalities2'],
        $_SESSION['join']['municipalities_kana2'],
        $_SESSION['join']['housenumber2'],
        $_SESSION['join']['housenumber_kana2'],
        $_SESSION['join']['mansion2'],
        $_SESSION['join']['mansion_kana2'],
        $_SESSION['join']['p_name'],
        $_SESSION['join']['j_name'],
        $_SESSION['join']['h_name'],
        $_SESSION['join']['u_name'],
        $_SESSION['join']['pic'],
    ));

    unset($_SESSION['join']);   // セッションを破棄
    header('Location: thank.php');   // thank.phpへ移動
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" >
    <title>確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <form action="" method="POST">
            <input type="hidden" name="check" value="checked">
            <div class="content">
   <form action="" method="POST">
    <div class="header">
        <h1>就職活動支援サイト JOB SUPPORT</h1>
            <a href="toppage.php">
            <img src="image/jobsupport2.png" alt="Job Support" class="logo">
            </a>
            <a href="gakurekikeisan/entry.php">履歴書作成</a> |
            <a href="sikaku.php">資格登録</a> |
            <a href="mail/index.php">メール</a> |
            <a href="todolist/todolist.php">To do</a> |
               <a href="#">カレンダー</a>
        </div>
            <h1 class="index">入力情報の確認</h1>
            <p>ご入力情報に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
            <p>登録情報はあとから変更することもできます。</p>
            <?php if (!empty($error) && $error === "error"): ?>
                <p class="error">＊会員登録に失敗しました。</p>
            <?php endif ?>
            <hr>

            <div class="control">
                <p>学籍番号:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['id'], ENT_QUOTES); ?></p>
            
                <p>氏名:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES); ?></p>

                <p>氏名(ふりがな):</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['name_kana'], ENT_QUOTES); ?></p>

                <p>生年月日:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['birthday'], ENT_QUOTES); ?></p>

                <p>年齢:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['age'], ENT_QUOTES); ?></p>

                <p>:性別</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['gender'], ENT_QUOTES); ?></p>

                <p>携帯電話番号:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['tel1'], ENT_QUOTES); ?></p>

                <p>電話番号:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['tel2'], ENT_QUOTES); ?></p>

                <p>その他記載の必要な電話番号:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['tel3'], ENT_QUOTES); ?></p>

                <br>
                <p>現住所に関して</p>
                <p>郵便番号:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['postalcode1'], ENT_QUOTES); ?></p>

                <p>都道府県:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['prefecture1'], ENT_QUOTES); ?></p>

                <p>都道府県(ふりがな):</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['prefecture_kana1'], ENT_QUOTES); ?></p>

                <p>市区町村:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['municipalities1'], ENT_QUOTES); ?></p>

                <p>市区町村(ふりがな):</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['municipalities_kana1'], ENT_QUOTES); ?></p>

                <p>建物名・部屋番号:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['mansion1'], ENT_QUOTES); ?></p>

                <p>建物名・部屋番号(ふりがな):</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['mansion_kana1'], ENT_QUOTES); ?></p>

                <br>
                <p>帰省先等 住所に関して</p>
                <p>郵便番号:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['postalcode2'], ENT_QUOTES); ?></p>

                <p>都道府県:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['prefecture2'], ENT_QUOTES); ?></p>

                <p>都道府県(ふりがな):</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['prefecture_kana2'], ENT_QUOTES); ?></p>

                <p>市区町村:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['municipalities2'], ENT_QUOTES); ?></p>

                <p>市区町村(ふりがな):</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['municipalities_kana2'], ENT_QUOTES); ?></p>

                <p>建物名・部屋番号:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['mansion2'], ENT_QUOTES); ?></p>

                <p>建物名・部屋番号(ふりがな):</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['mansion_kana2'], ENT_QUOTES); ?></p>

                <br>
                <p>小学校名:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['p_name'], ENT_QUOTES); ?></p>

                <p>中学校名:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['j_name'], ENT_QUOTES); ?></p>

                <p>高等学校名:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['h_name'], ENT_QUOTES); ?></p>

                <p>大学等 高等教育機関名:</p>
                <p><?php echo htmlspecialchars($_SESSION['join']['u_name'], ENT_QUOTES); ?></p>


            </div>
            
            <br>
            <a href="entry.php" class="back-btn">変更する</a>
            <button type="submit" class="btn next-btn">登録する</button>
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>