<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "gakureki";

try {
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラーモードを設定
} catch (PDOException $e) {
    echo "データベースエラー:" . $e->getMessage();
}

session_start();

// エラー変数を初期化
$error = '';

// フォームデータのセットアップ
$formData = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : array();

if (!empty($_POST['check'])) {
    // 入力情報をデータベースに登録
    $statement = $db->prepare("INSERT INTO rirekisho SET id=?,name=?,name_kana=?,burthday=?,age=?,gender=?,email=?,tel1=?,tel2=?,tel3=?,postalcode1=?,prefecture1=?,prefecture_kana1=?,address1=?,address_kana1=?,postalcode2=?,prefecture2=?,prefecture_kana2=?,address2=?,address_kana2=?,p_name=?,j_name=?,h_name=?,u_name=?");
    $statement->execute(array(
        $formData['id'],
        $formData['name'],
        $formData['name_kana'],
        $formData['birthday'],
        $formData['age'],
        $formData['gender'],
        $formData['email'],
        $formData['tel1'],
        $formData['tel2'],
        $formData['tel3'],
        $formData['postalcode1'],
        $formData['prefecture1'],
        $formData['prefecture_kana1'],
        $formData['address1'],
        $formData['address_kana1'],
        $formData['postalcode2'],
        $formData['prefecture2'],
        $formData['prefecture_kana2'],
        $formData['address2'],
        $formData['address_kana2'],
        $formData['p_name'],
        $formData['j_name'],
        $formData['h_name'],
        $formData['u_name'],
    ));
   // セッションを破棄
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
        <form action="thank.php" method="POST">
            <input type="hidden" name="check" value="checked">
            <div class="content">
   <form action="check.php" method="POST">
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
                <p><?php echo isset($_SESSION['join']['id']) ? htmlspecialchars($_SESSION['join']['id'], ENT_QUOTES) : ''; ?></p>
            
                <p>氏名:</p>
                <p><?php echo isset($_SESSION['join']['name']) ? htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES) : ''; ?></p>

                <p>氏名(ふりがな):</p>
                <p><?php echo isset($_SESSION['join']['name_kana']) ? htmlspecialchars($_SESSION['join']['name_kana'], ENT_QUOTES) : ''; ?></p>

                <p>生年月日:</p>
                <p><?php echo isset($_SESSION['join']['birthday']) ? htmlspecialchars($_SESSION['join']['birthday'], ENT_QUOTES) : ''; ?></p>

                <p>年齢:</p>
                <p><?php echo isset($_SESSION['join']['age']) ? htmlspecialchars($_SESSION['join']['age'], ENT_QUOTES) : ''; ?></p>

                <p>性別:</p>
                <p><?php echo isset($_SESSION['join']['gender']) ? htmlspecialchars($_SESSION['join']['gender'], ENT_QUOTES) : ''; ?></p>

                <p>メールアドレス:</p>
                <p><?php echo isset($_SESSION['join']['email']) ? htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES) : ''; ?></p>

                <p>携帯電話番号:</p>
                <p><?php echo isset($_SESSION['join']['tel1']) ? htmlspecialchars($_SESSION['join']['tel1'], ENT_QUOTES) : ''; ?></p>

                <p>電話番号:</p>
                <p><?php echo isset($_SESSION['join']['tel2']) ? htmlspecialchars($_SESSION['join']['tel2'], ENT_QUOTES) : ''; ?></p>

                <p>その他記載の必要な電話番号:</p>
                <p><?php echo isset($_SESSION['join']['tel3']) ? htmlspecialchars($_SESSION['join']['tel3'], ENT_QUOTES) : ''; ?></p>

                <br>
                <p>現住所</p>
                <p>郵便番号:</p>
                <p><?php echo isset($_SESSION['join']['postalcode1']) ? htmlspecialchars($_SESSION['join']['postalcode1'], ENT_QUOTES) : ''; ?></p>


                <p>都道府県:</p>
                <p><?php echo isset($_SESSION['join']['prefecture1']) ? htmlspecialchars($_SESSION['join']['prefecture1'], ENT_QUOTES) : ''; ?></p>

                <p>都道府県(ふりがな):</p>
                <p><?php echo isset($_SESSION['join']['prefecture_kana1']) ? htmlspecialchars($_SESSION['join']['prefecture_kana1'], ENT_QUOTES) : ''; ?></p>

                <p>都道府県名以降の住所:</p>
                <p><?php echo isset($_SESSION['join']['address1']) ? htmlspecialchars($_SESSION['join']['address1'], ENT_QUOTES) : ''; ?></p>

                <p>都道府県名以降の住所(ふりがな):</p>
                <p><?php echo isset($_SESSION['join']['address_kana1']) ? htmlspecialchars($_SESSION['join']['address_kana1'], ENT_QUOTES) : ''; ?></p>

                <br>
                <p>帰省先等</p>
                <p>郵便番号:</p>
                <p><?php echo isset($_SESSION['join']['postalcode2']) ? htmlspecialchars($_SESSION['join']['postalcode2'], ENT_QUOTES) : ''; ?></p>

                <p>都道府県:</p>
                <p><?php echo isset($_SESSION['join']['prefecture2']) ? htmlspecialchars($_SESSION['join']['prefecture2'], ENT_QUOTES) : ''; ?></p>

                <p>都道府県(ふりがな):</p>
                <p><?php echo isset($_SESSION['join']['prefecture_kana2']) ? htmlspecialchars($_SESSION['join']['prefecture_kana2'], ENT_QUOTES) : ''; ?></p>

                <p>都道府県名以降の住所:</p>
                <p><?php echo isset($_SESSION['join']['address2']) ? htmlspecialchars($_SESSION['join']['address2'], ENT_QUOTES) : ''; ?></p>

                <p>都道府県以降の住所(ふりがな):</p>
                <p><?php echo isset($_SESSION['join']['address_kana2']) ? htmlspecialchars($_SESSION['join']['address_kana2'], ENT_QUOTES) : ''; ?></p>


                <br>
                <p>小学校名:</p>
                <p><?php echo isset($_SESSION['join']['p_name']) ? htmlspecialchars($_SESSION['join']['p_name'], ENT_QUOTES) : ''; ?></p>

                <p>中学校名:</p>
                <p><?php echo isset($_SESSION['join']['j_name']) ? htmlspecialchars($_SESSION['join']['j_name'], ENT_QUOTES) : ''; ?></p>

                <p>高等学校名:</p>
                <p><?php echo isset($_SESSION['join']['h_name']) ? htmlspecialchars($_SESSION['join']['h_name'], ENT_QUOTES) : ''; ?></p>

                <p>大学等 高等教育機関名:</p>
                <p><?php echo isset($_SESSION['join']['u_name']) ? htmlspecialchars($_SESSION['join']['u_name'], ENT_QUOTES) : ''; ?></p>


            </div>
            
            <br>
            <a href="entry.php" class="back-btn">変更する</a>
            <button type="submit" class="btn next-btn">登録する</button>
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>