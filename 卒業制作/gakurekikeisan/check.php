<?php
require("./dbconnect.php");
session_start();

// エラー変数を初期化
$error = '';

/* 会員登録の手続き以外のアクセスを飛ばす */
if (!isset($_SESSION['join'])) {
    header('Location: entry.php');
    exit();
}

if (!empty($_POST['check'])) {
    try {
        // パスワードを暗号化
        $hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);

        // 入力情報をデータベースに登録
        $statement = $db->prepare("INSERT INTO gakureki (id, name, name_kana, b_year, b_month, b_day, age, gender, email, tel1, tel2, tel3, postalcode1, prefecture1, prefecture_kana1, municipalities1, municipalities_kana1, housenumber1, housenumber_kana1, mansion1, mansion_kana1, postalcode2, prefecture2, prefecture_kana2, municipalities2, municipalities_kana2, housenumber2, housenumber_kana2, mansion2, mansion_kana2, p_name, p_year, j_name, j_year, h_name, h_year, u_name, u_year, pic) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute(array(
            $_SESSION['join']['id'],
            $_SESSION['join']['name1'],
            $_SESSION['join']['name_kana1'],
            $_SESSION['join']['b_year'],
            $_SESSION['join']['b_month'],
            $_SESSION['join']['b_day'],
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
            $_SESSION['join']['p_year'],
            $_SESSION['join']['j_name'],
            $_SESSION['join']['j_year'],
            $_SESSION['join']['h_name'],
            $_SESSION['join']['h_year'],
            $_SESSION['join']['u_name'],
            $_SESSION['join']['u_year'],
            $_SESSION['join']['pic'],
        ));

        unset($_SESSION['join']); // セッションを破棄
        header('Location: thank.php'); // thank.phpへ移動
        exit();
    } catch (PDOException $e) {
        $error = "error"; // エラーが発生した場合
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>確認画面</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
        }

        .header {
        background-color: #007bff;
        color: #fff;
        padding: 20px 0;
        text-align: center;
        }

        .header a {
        color: #fff;
        text-decoration: none;
        margin: 0 15px;
        font-weight: bold;
        }

        .logo {
        width: 200px;
        height: auto;
        position: absolute;
        top: -20px; /* 画像を上に10px移動 */
        left: 10px;
        }




            .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            }

            h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
            }

            label {
            font-weight: bold;
            color: #333;
            }

            input, textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            }

            button {
            background-color: #007bff;
            color: #000000;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            }

            button:hover {
            background-color: #0056b3;
            }
            .required {
            margin-left: .3em;
            color: #f33;
            font-size: .9em;
            padding: 3px;
            background-color: #fee;
            font-weight: bold;
            }
        </style>
</head>
<body>
    <div class="content">
        <form action="" method="POST">
            <input type="hidden" name="check" value="checked">
            <h1>入力情報の確認</h1>
            <p>ご入力情報に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
            <p>登録情報はあとから変更することもできます。</p>
            <?php if (!empty($error) && $error === "error"): ?>
                <p class="error">＊会員登録に失敗しました。</p>
            <?php endif ?>
            <hr>
 
            <div class="control">
                <p>学籍番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['id'], ENT_QUOTES); ?></span></p>
                <p>氏名</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES); ?></span></p>
                <p>氏名 ふりがな</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['name_kana'], ENT_QUOTES); ?></span></p>
                <p>生年月日</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['b_year'], ENT_QUOTES); ?></span></p>
                <p>/</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['b_month'], ENT_QUOTES); ?></span></p>
                <p>/</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['b_day'], ENT_QUOTES); ?></span></p>
                <p>年齢</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['age'], ENT_QUOTES); ?></span></p>
                <p>性別</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['gender'], ENT_QUOTES); ?></span></p>
                <p>メールアドレス</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES); ?></span></p>
                <p>電話番号1</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['tel1'], ENT_QUOTES); ?></span></p>
                <p>電話番号2</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['tel2'], ENT_QUOTES); ?></span></p>
                <p>電話番号3</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['tel3'], ENT_QUOTES); ?></span></p>
                <p>現住所に関する情報</p>
                <p>郵便番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['postalcode1'], ENT_QUOTES); ?></span></p>
                <p>都道府県名</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['prefecture1'], ENT_QUOTES); ?></span></p>
                <p>都道府県名 ふりがな</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['prefecture_kana1'], ENT_QUOTES); ?></span></p>
                <p>市区町村名</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['municipalities1'], ENT_QUOTES); ?></span></p>
                <p>市区町村名 ふりがな</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['municipalities_kana1'], ENT_QUOTES); ?></span></p>
                <p>番地等</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['housenumber1'], ENT_QUOTES); ?></span></p>
                <p>番地等 ふりがな</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['housenumber_kana1'], ENT_QUOTES); ?></span></p>
                <p>建物名・部屋番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['mansion1'], ENT_QUOTES); ?></span></p>
                <p>建物名・部屋番号 ふりがな</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['mansion_kana1'], ENT_QUOTES); ?></span></p>
                <p>実家等に関する情報</p>
                <p>郵便番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['postalcode2'], ENT_QUOTES); ?></span></p>
                <p>都道府県名</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['prefecture2'], ENT_QUOTES); ?></span></p>
                <p>都道府県名 ふりがな</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['prefecture_kana2'], ENT_QUOTES); ?></span></p>
                <p>市区町村名</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['municipalities2'], ENT_QUOTES); ?></span></p>
                <p>市区町村名 ふりがな</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['municipalities_kana2'], ENT_QUOTES); ?></span></p>
                <p>番地等</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['housenumber2'], ENT_QUOTES); ?></span></p>
                <p>番地等 ふりがな</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['housenumber_kana2'], ENT_QUOTES); ?></span></p>
                <p>建物名・部屋番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['mansion2'], ENT_QUOTES); ?></span></p>
                <p>建物名・部屋番号 ふりがな</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['mansion_kana2'], ENT_QUOTES); ?></span></p>
                <p>小学校名</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['p_name'], ENT_QUOTES); ?></span></p>
                <p>小学校卒業 及び 中学校入学 西暦</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['p_year'], ENT_QUOTES); ?></span></p>
                <p>中学校名</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['j_name'], ENT_QUOTES); ?></span></p>
                <p>中学校卒業 及び 高校入学 西暦</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['j_year'], ENT_QUOTES); ?></span></p>
                <p>高等学校名</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['h_name'], ENT_QUOTES); ?></span></p>
                <p>高等学校卒業 及び 高等教育機関(大学等)入学 西暦</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['h_year'], ENT_QUOTES); ?></span></p>
                <p>高等教育機関名(大学等)</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['u_name'], ENT_QUOTES); ?></span></p>
                <p>高等教育機関(大学等) 卒業年</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['u_year'], ENT_QUOTES); ?></span></p>
            </div>
            
            <br>
            <a href="entry.php" class="back-btn">変更する</a>
            <button type="submit" class="btn next-btn">登録する</button>
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>