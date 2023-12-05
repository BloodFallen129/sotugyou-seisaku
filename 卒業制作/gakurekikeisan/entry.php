<?php
require_once("./dbconnect.php");
session_start();

// エラー変数を初期化
$error = '';

/* 会員登録の手続き以外のアクセスを飛ばす */

$id = isset($_SESSION['join']['id']) ? $_SESSION['join']['id'] : null;
$name = isset($_SESSION['join']['name']) ? $_SESSION['join']['name'] : null;
$name_kana = isset($_SESSION['join']['name_kana']) ? $_SESSION['join']['name_kana'] : null;
$birthday = isset($_SESSION['join']['birthday']) ? $_SESSION['join']['birthday'] : null;
$age = isset($_SESSION['join']['age']) ? $_SESSION['join']['age'] : null;
$gender = isset($_SESSION['join']['gender']) ? $_SESSION['join']['gender'] : null;
$email = isset($_SESSION['join']['email']) ? $_SESSION['join']['email'] : null;
$tel1 = isset($_SESSION['join']['tel1']) ? $_SESSION['join']['tel1'] : null;
$tel2 = isset($_SESSION['join']['tel2']) ? $_SESSION['join']['tel2'] : null;
$tel3 = isset($_SESSION['join']['tel3']) ? $_SESSION['join']['tel3'] : null;
$postalcode1 = isset($_SESSION['join']['postalcode1']) ? $_SESSION['join']['postalcode1'] : null;
$prefecture1 = isset($_SESSION['join']['prefecture1']) ? $_SESSION['join']['prefecture1'] : null;
$prefecture_kana1 = isset($_SESSION['join']['prefecture_kana1']) ? $_SESSION['join']['prefecture_kana1'] : null;
$municipalities1 = isset($_SESSION['join']['municipalities1']) ? $_SESSION['join']['municipalities1'] : null;
$municipalities_kana1 = isset($_SESSION['join']['municipalities_kana1']) ? $_SESSION['join']['municipalities_kana1'] : null;
$housenumber1 = isset($_SESSION['join']['housenumber1']) ? $_SESSION['join']['housenumber1'] : null;
$housenumber_kana1 = isset($_SESSION['join']['housenumber_kana1']) ? $_SESSION['join']['housenumber_kana1'] : null;
$mansion1 = isset($_SESSION['join']['mansion1']) ? $_SESSION['join']['mansion1'] : null;
$mansion_kana1 = isset($_SESSION['join']['mansion_kana1']) ? $_SESSION['join']['mansion_kana1'] : null;
$postalcode2 = isset($_SESSION['join']['postalcode2']) ? $_SESSION['join']['postalcode2'] : null;
$prefecture2 = isset($_SESSION['join']['prefecture2']) ? $_SESSION['join']['prefecture2'] : null;
$prefecture_kana2 = isset($_SESSION['join']['prefecture_kana2']) ? $_SESSION['join']['prefecture_kana2'] : null;
$municipalities2 = isset($_SESSION['join']['municipalities2']) ? $_SESSION['join']['municipalities2'] : null;
$municipalities_kana2 = isset($_SESSION['join']['municipalities_kana2']) ? $_SESSION['join']['municipalities_kana2'] : null;
$housenumber2 = isset($_SESSION['join']['housenumber2']) ? $_SESSION['join']['housenumber2'] : null;
$housenumber_kana2 = isset($_SESSION['join']['housenumber_kana2']) ? $_SESSION['join']['housenumber_kana2'] : null;
$mansion2 = isset($_SESSION['join']['mansion2']) ? $_SESSION['join']['mansion2'] : null;
$mansion_kana2 = isset($_SESSION['join']['mansion_kana2']) ? $_SESSION['join']['mansion_kana2'] : null;
$p_name = isset($_SESSION['join']['p_name']) ? $_SESSION['join']['p_name'] : null;
$j_name = isset($_SESSION['join']['j_name']) ? $_SESSION['join']['j_name'] : null;
$h_name = isset($_SESSION['join']['h_name']) ? $_SESSION['join']['h_name'] : null;
$u_name = isset($_SESSION['join']['u_name']) ? $_SESSION['join']['u_name'] : null;
$pic = isset($_SESSION['join']['pic']) ? $_SESSION['join']['pic'] : null;

if (!empty($_POST['check'])) {
    try {
        $db->beginTransaction();

        $sqlSelect = "SELECT * FROM rirekisho WHERE id = :id";
        $stmtSelect = $db->prepare($sqlSelect);
        $stmtSelect->bindValue(':id', $id);
        $stmtSelect->execute();
        $member = $stmtSelect->fetch();
        $db->commit();

        if ($member !== false && $member['id'] === $id) {
            echo 'この学籍番号は既に登録されています。';
        } else {
            $sqlInsert = "INSERT INTO rirekisho(id, name, name_kana, birthday, age, gender, email, tel1, tel2, tel3, postalcode1, prefecture1, prefecture_kana1, municipalities1, municipalities_kana1, housenumber1, housenumber_kana1, mansion1, mansion_kana1, postalcode2, prefecture2, prefecture_kana2, municipalities2, municipalities_kana2, housenumber2, housenumber_kana2, mansion2, mansion_kana2, p_name, j_name, h_name, u_name, pic) VALUES (:id, :name, :name_kana, :birthday, :age, :gender, :email, :tel1, :tel2, :tel3, :postalcode1, :prefecture1, :prefecture_kana1, :municipalities1, :municipalities_kana1, :housenumber1, :housenumber_kana1, :mansion1, :mansion_kana1, :postalcode2, :prefecture2, :prefecture_kana2, :municipalities2, :municipalities_kana2, :housenumber2, :housenumber_kana2, :mansion2, :mansion_kana2, :p_name, :j_name, :h_name, :u_name, :pic)";
            $stmtInsert = $db->prepare($sqlInsert);

            $stmtInsert->bindValue(':id', $id);
            $stmtInsert->bindValue(':name', $name);
            $stmtInsert->bindValue(':name_kana', $name_kana);
            $stmtInsert->bindValue(':birthday', $birthday);
            $stmtInsert->bindValue(':age', $age);
            $stmtInsert->bindValue(':gender', $gender);
            $stmtInsert->bindValue(':email', $email);
            $stmtInsert->bindValue(':tel1', $tel1);
            $stmtInsert->bindValue(':tel2', $tel2);
            $stmtInsert->bindValue(':tel3', $tel3);
            $stmtInsert->bindValue(':postalcode1', $postalcode1);
            $stmtInsert->bindValue(':prefecture1', $prefecture1);
            $stmtInsert->bindValue(':prefecture_kana1', $prefecture_kana1);
            $stmtInsert->bindValue(':municipalities1', $municipalities1);
            $stmtInsert->bindValue(':municipalities_kana1', $municipalities_kana1);
            $stmtInsert->bindValue(':housenumber1', $housenumber1);
            $stmtInsert->bindValue(':housenumber_kana1', $housenumber_kana1);
            $stmtInsert->bindValue(':mansion1', $mansion1);
            $stmtInsert->bindValue(':mansion_kana1', $mansion_kana1);
            $stmtInsert->bindValue(':postalcode2', $postalcode2);
            $stmtInsert->bindValue(':prefecture2', $prefecture2);
            $stmtInsert->bindValue(':prefecture_kana2', $prefecture_kana2);
            $stmtInsert->bindValue(':municipalities2', $municipalities2);
            $stmtInsert->bindValue(':municipalities_kana2', $municipalities_kana2);
            $stmtInsert->bindValue(':housenumber2', $housenumber2);
            $stmtInsert->bindValue(':housenumber_kana2', $housenumber_kana2);
            $stmtInsert->bindValue(':mansion2', $mansion2);
            $stmtInsert->bindValue(':mansion_kana2', $mansion_kana2);
            $stmtInsert->bindValue(':p_name', $p_name);
            $stmtInsert->bindValue(':j_name', $j_name);
            $stmtInsert->bindValue(':h_name', $h_name);
            $stmtInsert->bindValue(':u_name', $u_name);
            $stmtInsert->bindValue(':pic', $pic);

            $stmtInsert->execute();

        }
        $db->commit();
 

        unset($_SESSION['join']); // セッションを破棄
        header('Location: check.php'); 
        exit();
    } catch (PDOException $e) {
        $error = "error"; // エラーが発生した場合
        $db->rollback(); // ロールバック
        echo "エラー: " . $e->getMessage(); // エラーメッセージを表示
    }
}

$sql = "SELECT * FROM rirekisho WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$member = $stmt->fetch();





if(!empty($_POST)){
    if($_POST['id']===""){
        $error['id'] = "blank";
    }
    if($_POST['name']===""){
        $error['name'] = "blank";
    }
    if($_POST['name_kana']===""){
        $error['name_kana'] = "blank";
    }
    if($_POST['birthday']===""){
        $error['birthday'] = "blank";
    }
    
    if($_POST['age']===""){
        $error['age'] = "blank";
    }
    if($_POST['gender']===""){
        $error['gender'] = "blank";
    }
    if($_POST['email']===""){
        $error['email'] = "blank";
    }
    if($_POST['tel1']===""){
        $error['tel1'] = "blank";
    }
    if($_POST['postalcode1']===""){
        $error['postalcode1'] = "blank";
    }
    if($_POST['prefecture1']===""){
        $error['prefecture1'] = "blank";
    }
    if($_POST['municipalities1']===""){
        $error['municipalities_kana1'] = "blank";
    }
    if($_POST['housenumber1']===""){
        $error['housenumber1'] = "blank";
    }
    if($_POST['housenumber_kana1']===""){
        $error['housenumber_kana1'] = "blank";
    }
    if($_POST['mansion1']===""){
        $error['mansion1'] = "blank";
    }
    if($_POST['mansion_kana1']===""){
        $error['mansion_kana1'] = "blank";
    }
    if($_POST['p_name']===""){
        $error['p_name'] = "blank";
    }
    if($_POST['j_name']===""){
        $error['j_name'] = "blank";
    }
    if($_POST['h_name']===""){
        $error['h_name'] = "blank";
    }
    if($_POST['u_name']===""){
        $error['u_name'] = "blank";
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>プロフィール登録</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
            <h1 class="index">プロフィール登録</h1>
            <p>サービス利用のため下記フォームに詳細なプロフィール及び学歴を入力してください。</p>
            <br>

            <div class="control">
                <label for="id">学籍番号</label>
                <input id="id" type="text" name="id" maxlength="9" required><br>
                <?php if (!empty($error["id"]) && $error['id'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php elseif (!empty($error["id"]) && $error['id'] === 'duplicate'): ?>
                    <p class="error">＊この学籍番号はすでに登録済みです</p>
                    <?php endif?>

                <label for="name">氏名</label>
                <input id="name" type="text" name="name" maxlength="50" required><br>
                <?php if(!empty($error["name"]) && $error['name'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                <label for="name_kana">氏名(ふりがな)</label>
                <input id="name_kana" type="text" name="name_kana" maxlength="255" required>
                <?php if(!empty($error["name_kana1"]) && $error['name_kana1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                <label for="birthday">生年月日</label>
                <input id ="birthday" type="date" name="birthday" min="1900-01-01" max="2030-12-31" required><br>
                <?php if(!empty($error["birthday"]) && $error['birthday'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                <label for="age">年齢</label>
                <input id ="age" type="text" name="age"><br>

                <label for="gender">性別</label>
                <select id="gender" name="gender">
                    <option value="male">男性</option>
                    <option value="female">女性</option>
                    <option value="other">その他</option>
                </select>
                <br>

                <label for="email">メールアドレス</label>
                <input id="email" type="text" name="email" maxlength="255" required><br>
                <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                <label for="tel1">携帯電話番号</label>
                <input id="tel1" type="text" name="tel1" maxlength="255" required><br>
                <?php if (!empty($error["tel1"]) && $error['tel1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                <label for="tel2">電話番号</label>
                <input id="tel2" type="text" name="tel2" maxlength="255"><br>

                <label for="tel3">その他記載の必要な電話番号</label>
                <input id="tel3" type="text" name="tel3" maxlength="255"><br>

                <label>現住所</label>
                <label for="postalcode1">郵便番号</label>
                <input id="postalcode1" type="text" name="postalcode1" maxlength="7" required><br>
                    <?php if(!empty($error["postalcode1"]) && $error['postalcode1'] === 'blank'): ?>
                        <p class="error">＊入力して下さい</p>
                        <?php endif?>
                <label for="prefecture1">都道府県<span class="required"></span></label>
                <select id="prefecture1" name="prefecture1">
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select><br>
                <?php if (!empty($error["prefecture1"]) && $error['prefecture'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                    <label for="prefecture_kana1">都道府県(ふりがな)</label>
                    <?php
                        $prefectureData =[
                            "---"=>"",
                            "北海道"=>"ほっかいどう",
                            "青森県"=>"あおもりけん",
                            "岩手県"=>"いわてけん",
                            "宮城県"=>"みやぎけん",
                            "秋田県"=>"あきたけん",
                            "山形県"=>"やまがたけん",
                            "福島県"=>"ふくしまけん",
                            "茨城県"=>"いばらきけん",
                            "栃木県"=>"とちぎけん",
                            "群馬県"=>"ぐんまけん",
                            "埼玉県"=>"さいたまけん",
                            "千葉県"=>"ちばけん",
                            "東京都"=>"とうきょうと",
                            "神奈川県"=>"かながわけん",
                            "新潟県"=>"にいがたけん",
                            "富山県"=>"とやまけん",
                            "石川県"=>"いしかわけん",
                            "福井県"=>"ふくいけん",
                            "山梨県"=>"やまなしけん",
                            "長野県"=>"ながのけん",
                            "岐阜県"=>"ぎふけん",
                            "静岡県"=>"しずおかけん",
                            "愛知県"=>"あいちけん",
                            "三重県"=>"みえけん",
                            "滋賀県"=>"しがけん",
                            "京都府"=>"きょうとふ",
                            "大阪府"=>"おおさかふ",
                            "兵庫県"=>"ひょうごけん",
                            "奈良県"=>"ならけん",
                            "和歌山県"=>"わかやまけん",
                            "鳥取県"=>"とっとりけん",
                            "島根県"=>"しまねけん",
                            "岡山県"=>"おかやまけん",
                            "広島県"=>"ひろしまけん",
                            "山口県"=>"やまぐちけん",
                            "徳島県"=>"とくしまけん",
                            "香川県"=>"かがわけん",
                            "愛媛県"=>"えひめけん",
                            "高知県"=>"こうちけん",
                            "福岡県"=>"ふくおかけん",
                            "佐賀県"=>"さがけん",
                            "長崎県"=>"ながさきけん",
                            "熊本県"=>"くまもとけん",
                            "大分県"=>"おおいたけん",
                            "宮崎県"=>"みやざきけん",
                            "鹿児島県"=>"かごしまけん",
                            "沖縄県"=>"おきなわけん"
                        ];
                    ?>
                    <input type="text" id="prefecture_kana1" name="prefecture_kana1" readonly><br>
                <label for="municipalities1">市区町村<span class="required"></span></label>
                    <input type="text" id="municipalities1" name ="municipalities1">
                    <?php if (!empty($error["municipalities1"]) && $error['municipalities1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                <label for="municipalities_kana1">市区町村(ふりがな)<span class="required"></span></label>
                    <input type="text" id="municipalities_kana1" name="municipalities_kana1"><br>
                    <?php if (!empty($error["municipalities_kana1"]) && $error['municipalities_kana1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                <label for="housenumber1">市区町村以下住所</label>
                    <input id="housenumber1" id="housenumber1" name="housenumber1" ><br>
                    <?php if (!empty($error["housenumber_kana1"]) && $error['housenumber_kana1'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif?>

                 <label for="housenumber_kana1">市区町村以下住所(ふりがな)</label>
                    <input id="housenumber_kana1" id="housenumber_kana1" name="housenumber_kana1" ><br>
                    <?php if (!empty($error["housenumber_kana1"]) && $error['housenumber_kana1'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif?>

                <label for="mansion1">建物名・部屋番号</label>
                    <input id="mansion1" type="text" name ="mansion1" maxlength="255" required><br>
                    <?php if (!empty($error["mansion1"]) && $error['mansion1'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif?>

                <label for="mansion1">建物名・部屋番号(ふりがな)</label>
                    <input id="mansion_kana1" type="text" name ="mansion_kana1" maxlength="255" required><br>
                    <?php if (!empty($error["mansion_kana1"]) && $error['mansion_kana1'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif?>


            <label>帰省先等 住所</label>
                <label for="postalcode2">郵便番号</label>
                <input id="postalcode2" type="text" name="postalcode2" maxlength="7" ><br>
                    <?php if(!empty($error["postalcode2"]) && $error['postalcode2'] === 'blank'): ?>
                        <p class="error">＊入力して下さい</p>
                        <?php endif?>
                <label for="prefecture2">都道府県</label>
                <select id="prefecture2" name="prefecture2">
                    <option value="---"></option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select><br>
                <?php if (!empty($error["prefecture2"]) && $error['prefecture2'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                    <label for="prefecture_kana2">都道府県(ふりがな)</label>
                    <?php
                        $prefectureData =[
                            "---"=>"",
                            "北海道"=>"ほっかいどう",
                            "青森県"=>"あおもりけん",
                            "岩手県"=>"いわてけん",
                            "宮城県"=>"みやぎけん",
                            "秋田県"=>"あきたけん",
                            "山形県"=>"やまがたけん",
                            "福島県"=>"ふくしまけん",
                            "茨城県"=>"いばらきけん",
                            "栃木県"=>"とちぎけん",
                            "群馬県"=>"ぐんまけん",
                            "埼玉県"=>"さいたまけん",
                            "千葉県"=>"ちばけん",
                            "東京都"=>"とうきょうと",
                            "神奈川県"=>"かながわけん",
                            "新潟県"=>"にいがたけん",
                            "富山県"=>"とやまけん",
                            "石川県"=>"いしかわけん",
                            "福井県"=>"ふくいけん",
                            "山梨県"=>"やまなしけん",
                            "長野県"=>"ながのけん",
                            "岐阜県"=>"ぎふけん",
                            "静岡県"=>"しずおかけん",
                            "愛知県"=>"あいちけん",
                            "三重県"=>"みえけん",
                            "滋賀県"=>"しがけん",
                            "京都府"=>"きょうとふ",
                            "大阪府"=>"おおさかふ",
                            "兵庫県"=>"ひょうごけん",
                            "奈良県"=>"ならけん",
                            "和歌山県"=>"わかやまけん",
                            "鳥取県"=>"とっとりけん",
                            "島根県"=>"しまねけん",
                            "岡山県"=>"おかやまけん",
                            "広島県"=>"ひろしまけん",
                            "山口県"=>"やまぐちけん",
                            "徳島県"=>"とくしまけん",
                            "香川県"=>"かがわけん",
                            "愛媛県"=>"えひめけん",
                            "高知県"=>"こうちけん",
                            "福岡県"=>"ふくおかけん",
                            "佐賀県"=>"さがけん",
                            "長崎県"=>"ながさきけん",
                            "熊本県"=>"くまもとけん",
                            "大分県"=>"おおいたけん",
                            "宮崎県"=>"みやざきけん",
                            "鹿児島県"=>"かごしまけん",
                            "沖縄県"=>"おきなわけん"
                        ];
                    ?>
                    <input type="text" id="prefecture_kana2" name="prefecture_kana2" readonly><br>
                <label for="municipalities2">市区町村</label>
                    <input type="text" id="municipalities2" name ="municipalities2">
                    <?php if (!empty($error["municipalities2"]) && $error['municipalitie21'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                    <script>
                        var prefectureSelect1 = document.getElementById("prefecture1");
                        var prefectureKanaInput1 = document.getElementById("prefecture_kana1");
                        
                        var prefectureSelect2 = document.getElementById("prefecture2");
                        var prefectureKanaInput2 = document.getElementById("prefecture_kana2");

                        // 選択が変更されたときのJavaScriptのイベントリスナーを設定
                        prefectureSelect1.addEventListener("change", function() {
                            var selectedPrefecture = prefectureSelect1.value;
                            var furigana = <?php echo json_encode($prefectureData); ?>[selectedPrefecture];
                            prefectureKanaInput1.value = furigana;
                        });

                        prefectureSelect2.addEventListener("change", function() {
                            var selectedPrefecture = prefectureSelect2.value;
                            var furigana = <?php echo json_encode($prefectureData); ?>[selectedPrefecture];
                            prefectureKanaInput2.value = furigana;
                        });

                        // ふりがな入力フィールドを読み取り専用から通常のフィールドに変更
                        prefectureKanaInput1.readOnly = false;
                        prefectureKanaInput2.readOnly = false;
                    </script>

                <label for="municipalities_kana2">市区町村(ふりがな)</label>
                    <input type="text" id="municipalities_kana2" name="municipalities_kana2"><br>
                    <?php if (!empty($error["municipalities_kana2"]) && $error['municipalities_kana2'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                <label for="housenumber2">市区町村以下住所</label>
                    <input id="housenumber2" id="housenumber2" name="housenumber2" ><br>
                    <?php if (!empty($error["housenumber2"]) && $error['housenumber2'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif?>
            
                <label for="housenumber_kana2">市区町村以下住所(ふりがな)</label>
                    <input id="housenumber_kana2" id="housenumber_kana2" name="housenumber_kana2" ><br>
                    <?php if (!empty($error["housenumber_kana2"]) && $error['housenumber_kana2'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif?>

                <label for="mansion2">建物名・部屋番号</label>
                    <input id="mansion2" type="text" name ="mansion2" maxlength="255" ><br>
                    <?php if (!empty($error["mansion2"]) && $error['mansion2'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif?>

                <label for="mansion_kana2">建物名・部屋番号(ふりがな)</label>
                    <input id="mansion_kana2" type="text" name ="mansion_kana2" maxlength="255"><br>
                    <?php if (!empty($error["mansion_kana2"]) && $error['mansion_kana2'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif?>

                <label for="p_name">小学校名</label>
                <input id="p_name"  type="text" name="p_name" maxlength="255" required><br>
                    <?php if (!empty($error["p_name"]) && $error['p_name'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif?>
                
                <label for="j_name">中学校名</label>
                <input id="j_name" type="text" name="j_name" maxlength="255"><br>
                        <?php if(!empty($error["j_name"]) && $error['j_name'] === 'blank'): ?>
                            <p class="error">＊入力してください</p>
                        <?php endif?>

                <label for="h_name">高等学校名</label>
                <input id="h_name" type="text" name="h_name" maxlength="255"><br>
                        <?php if(!empty($error["h_name"]) && $error['h_name'] === 'blank'): ?>
                            <p class="error">＊入力してください</p>
                        <?php endif?>

                <label for="u_name">大学等 高等教育機関名</label>
                <input id="u_name" type="text" name="u_name" maxlength="255"><br>
                        <?php if(!empty($error["u_name"]) && $error['u_name'] === 'blank'): ?>
                            <p class="error">＊入力してください</p>
                        <?php endif?>

                        <div class="control">
                            <button type="submit" class="btn next-btn" onclick="redirectToCheck()">確認画面へ進む</button>
                                <div class="clear"></div>

                                <script>
                                function redirectToCheck() {
                                    window.location.href = "check.php";
                                }
                                </script>
                </div>

                        
            </div>
        </form>
    </div>
</body>
</html>