<?php
session_start();

$data = array();

// フォームからのPOSTデータをセッションに格納
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームの各項目を取得
    $data['id'] = isset($_POST['id']) ? $_POST['id'] : '';
    $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['birthday'] = isset($_POST['birthday']) ? $_POST['birthday'] : '';
    $data['age'] = isset($_POST['age']) ? $_POST['age'] : '';
    $data['gender'] = isset($_POST['gender']) ? $_POST['gender'] : '';
    $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['tel1'] = isset($_POST['tel1']) ? $_POST['tel1'] : '';
    $data['tel2'] = isset($_POST['tel2']) ? $_POST['tel2'] : '';
    $data['tel3'] = isset($_POST['tel3']) ? $_POST['tel3'] : '';
    $data['postalcode1'] = isset($_POST['postalcode1']) ? $_POST['postalcode1'] : '';
    $data['prefecture1'] = isset($_POST['prefecture1']) ? $_POST['prefecture1'] : '';
    $data['prefecture_kana1'] = isset($_POST['prefecture_kana1']) ? $_POST['prefecture_kana1'] : '';
    $data['address1'] = isset($_POST['address1']) ? $_POST['address1'] : '';
    $data['address_kana1'] = isset($_POST['address_kana1']) ? $_POST['address_kana1'] : '';

    $data['postalcode2'] = isset($_POST['postalcode2']) ? $_POST['postalcode2'] : '';
    $data['prefecture2'] = isset($_POST['prefecture2']) ? $_POST['prefecture2'] : '';
    $data['prefecture_kana2'] = isset($_POST['prefecture_kana2']) ? $_POST['prefecture_kana2'] : '';
    $data['address2'] = isset($_POST['address2']) ? $_POST['address2'] : '';
    $data['address_kana2'] = isset($_POST['address_kana2']) ? $_POST['address_kana2'] : '';

    $data['p_name'] = isset($_POST['p_name']) ? $_POST['p_name'] : '';
    $data['p_year'] = $_POST['p_year'] ?? null;

    $data['j_name'] = isset($_POST['j_name']) ? $_POST['j_name'] : '';
    $data['j_year'] = $_POST['j_year'] ?? null;

    $data['h_name'] = isset($_POST['h_name']) ? $_POST['h_name'] : '';
    $data['h_year'] = $_POST['h_year'] ?? null;

    $data['u_name'] = isset($_POST['u_name']) ? $_POST['u_name'] : '';
    $data['u_year'] = $_POST['u_year'] ?? null;

}

// $data 配列をセッションに格納
$_SESSION['form_data'] = $data;
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Zen+Kaku+Gothic+New:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <title>履歴書自動作成サイト</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      /* background-image: url(image/syukatu2.jpg); */
      /* background-repeat: no-repeat; */
      /* background-size: cover; */
      background-color: aliceblue;
      
    }

.header {
  background-color: #f2f4f5;
  color: #a06969;
  padding: 20px 0;
  padding-top: 0px;
  top: 0;
  text-align: center;
  background-image: url(image/DC4DCA11-4EE7-449A-869F-2D847E657C60.jpg);
  background-size:cover;  
  
  /* background-image: url(image/avatar3.jpg); */
  
  
  
  /* align-items: center; */
  font-family: 'Zen Kaku Gothic New', sans-serif;
  /* font-family: 'Mochiy Pop P One', sans-serif; */
  /* font-family: 'Noto Serif JP', serif; */

}

.header a {
  color: #896363;
  text-decoration: none;
  margin: 0 15px;
  font-weight: bold;
  align-items: center;
  text-align: center;
  
}

.logo {
  width: 170px;
  height: 60px;
  
  
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
      margin-bottom: 0px;
      color: #443a3a;
      margin-top: 0;
      
      
      
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
      
    }

    button:hover {
      background-color: #0056b3;
    }

    .header-img {
      width: 130px;
      height: 130px;
      margin-right: 10px;
    }


    .header-img-oya{
      text-align: center;
      margin-bottom: 10px;
      
    }
      
/* アイコンフォントサイズ調整(グーグルフォント) */
    .material-symbols-outlined {  
      font-size: 23px;
    }

/* 位置調整(グーグルフォント) */
    .anker {
      display: flex;
      justify-content: center;
      align-items: center;
      /* background-color: #e5eae8; */
      
    }

    
    .char-counter {
      display: block;
      margin-top: 5px;
      font-size: 12px;
      color: #666;
    }
       


    @media screen and (max-width: 818px) {
      .logo {
        height: 45px;
        width: 120px;
      }
      .header-img {
        width: 120px;
        height: 120px;
      }

      h1 {
        font-size: 23px;
      }
      
      @media screen and (max-width: 662px){
        .header-img {
        width: 80px;
        height: 80px;
        }

        .material-symbols-outlined{
          font-size: 18px;
        }

        .anker{
          font-size: 14px;
        }
      }
}
       
      
  
</style>
</head>
<body>
<div class="content">
        <form action="check.php" method="POST">
<div class="header">
    <h1>就職活動支援サイト JOB SUPPORT</h1>

    <div class="oya">
      <a href="toppage.php">
      <img src="../image/jobsupport-3.png" alt="Job Support" class="logo">
      </a>
    </div>



    <div class="anker">
       <a href="../gakurekikeisan/entry.php" class="anker"><span class="material-symbols-outlined">
        draw
        </span>履歴書作成</a> |

       <a href="../sikaku.php" class="anker"><span class="material-symbols-outlined">
        content_paste_go
        </span>資格登録</a> |

       <a href="../mail/index.php" class="anker"><span class="material-symbols-outlined">
        mail
        </span>メール</a> |

       <a href="../todolist/todolist.php" class="anker"><span class="material-symbols-outlined">
        check_circle
        </span>To do</a> |
        
       <a href="../calendar.php" class="anker"><span class="material-symbols-outlined">
        calendar_month
       </span>カレンダー</a>
    </div>

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
                <label for="address1">都道府県以降の住所<span class="required"></span></label>
                    <input type="text" id="address1" name ="address1">
                    <?php if (!empty($error["address1"]) && $error['address1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                <label for="address_kana1">都道府県以降の住所(ふりがな)<span class="required"></span></label>
                    <input type="text" id="address_kana1" name="address_kana1"><br>
                    <?php if (!empty($error["address_kana1"]) && $error['address_kana1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>


            <label>帰省先等</label>
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
                    <label for="address2">都道府県以降の住所</label>
                    <input type="text" id="address2" name ="address2">
                    <?php if (!empty($error["address2"]) && $error['address2'] === 'blank'): ?>
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

                <label for="address_kana2">都道府県以降の住所(ふりがな)</label>
                    <input type="text" id="address_kana2" name="address_kana2"><br>
                    <?php if (!empty($error["address_kana2"]) && $error['address_kana2'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

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
                            <button type="submit" name = "submit" class="btn next-btn" onclick="redirectToCheck()">確認画面へ進む</button>
                        </div>

                </div>

                        
            </div>
        </form>
    </div>
</body>
</html>