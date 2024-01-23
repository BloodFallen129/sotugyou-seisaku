<?php
session_start(); // セッションを開始

$hostname = "k022c2044.mysql.database.azure.com";
$username = "K022C2044";
$password = "Noise0926";
$dbname = "touroku"; // 作成したデータベース名

// データベースに接続
$connection = mysqli_init();

mysqli_ssl_set($connection, NULL, NULL, 'DigiCertGlobalRootCA.crt.pem', NULL, NULL);

mysqli_real_connect($connection, $hostname, $username, $password, $dbname, 3306, MYSQLI_CLIENT_SSL);

if ($connection->connect_error) {
    die("データベースに接続できませんでした: " . $connection->connect_error);
}

// データベースからデータを取得
$select_query = "SELECT * FROM syousai";
$result = $connection->query($select_query);

// 削除ボタンがクリックされた場合
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_query = "DELETE FROM syousai WHERE id = $delete_id";  // my_row_id を使用
    if ($connection->query($delete_query) === TRUE) {
        echo "データが正常に削除されました。";
        // 削除後、再度データを取得
        $result = $connection->query($select_query);
    } else {
        echo "エラー: " . $delete_query . "<br>" . $connection->error;
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
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
    <title>登録内容表示</title>
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
<div class="header">
    <h1>就職活動支援サイト JOB SUPPORT</h1>

    <div class="oya">
      <a href="toppage.php">
      <img src="image/jobsupport-3.png" alt="Job Support" class="logo">
      </a>
    </div>



    <div class="anker">
       <a href="gakurekikeisan/entry.php" class="anker"><span class="material-symbols-outlined">
        draw
        </span>履歴書作成</a> |

       <a href="sikaku.php" class="anker"><span class="material-symbols-outlined">
        content_paste_go
        </span>資格登録</a> |

       <a href="mail/index.php" class="anker"><span class="material-symbols-outlined">
        mail
        </span>メール</a> |

       <a href="todolist/todolist.php" class="anker"><span class="material-symbols-outlined">
        check_circle
        </span>To do</a> |
        
       <a href="calendar.php" class="anker"><span class="material-symbols-outlined">
        calendar_month
       </span>カレンダー</a>
    </div>

  </div>

<body>
    <h1>登録内容一覧</h1>

    <?php
    // データがあるかどうかをチェック
    if ($result->num_rows > 0) {
        // データがある場合、表示
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p>自己PR: {$row['self_pr']}</p>";
            echo "<p>志望動機: {$row['aspiratio']}</p>";
            echo "<p>趣味・特技: {$row['hobbies']}</p>";
            echo "<p>学生時代頑張ってきたこと: {$row['achievements']}</p>";

            // 編集・削除ボタン
            echo "<div class='action-btns'>";
            echo "<form method='post' action='edit_data.php'>";
            echo "<input type='hidden' name='edit_id' value='{$row['id']}'>";  // id を使用
            echo "<button class='edit-btn' type='submit'>編集</button>";
            echo "</form>";

            echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
            echo "<input type='hidden' name='delete_id' value='{$row['id']}'>";  // id を使用
            echo "<button class='delete-btn' type='submit'>削除</button>";
            echo "</form>";
            echo "</div>";  // end action-btns

            echo "</div>";
        }
    } else {
        // データがない場合のメッセージ
        echo "<p>登録されたデータがありません。</p>";
    }

    // データベース接続を閉じる
    $connection->close();
    ?>

</body>

</html>
