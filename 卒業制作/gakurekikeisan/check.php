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
        <form action="thank.php" method="POST">
<div class="header">
    <h1>就職活動支援サイト JOB SUPPORT</h1>

    <div class="oya">
      <a href="toppage.php">
      <img src="../image/jobsupport-3.png" alt="Job Support" class="logo">
      </a>
    </div>



    <div class="anker">
       <a href=../gakurekikeisan/entry.php" class="anker"><span class="material-symbols-outlined">
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