<?php
  session_start();
  if (isset($_SESSION["user_name"])) {
    $user_name = $_SESSION["user_name"];
    $message = "ようこそ、{$user_name}さん";
  } else {
    $message = "セッションエラー";
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
      background-size: cover;
      font-family: 'Zen Kaku Gothic New', sans-serif;
    }

    .header a {
      color: #896363;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
      align-items: center;
      text-align: center;
    }

    h1 {
      text-align: center;
      margin-bottom: 0px;
      color: #443a3a;
      margin-top: 0;
    }

    .logo {
      width: 170px;
      height: 60px;
    }

    .anker {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    .avatar {
      text-align: center;
      margin-bottom: 20px;
    }

    .avatar img {
      max-width: 200px;
      border-radius: 50%;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    #experience {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #4caf50; /* 経験値のテキストカラーを変更 */
    }

    .avatar-text {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #333; /* アバター名のテキストカラーを変更 */
    }

    .sikaku-text {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #333; /* アバター名のテキストカラーを変更 */
    }

    .experience-gauge {
      background-color: #ddd;
      height: 20px;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    #experienceBar {
      width: 0;
      height: 100%;
      background-color: #4caf50;
      border-radius: 5px;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
      margin-right: 10px;
    }

    button:hover {
      background-color: #45a848; /* ホバー時のボタンの色を微調整 */
    }

    .message {
      display: none;
      text-align: center;
      font-size: 20px;
      margin-top: 10px;
      color: #4caf50; /* メッセージのテキストカラーを変更 */
    }

    .center-container {
      text-align: center;
      margin-top: 20px;
    }

    .center-container input[type="text"] {
      padding: 10px;
      font-size: 18px;
      border-radius: 5px;
    }

    .center-container button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
      margin-left: 10px; /* Adjust margin to separate input and button */
    }

    .center-container button:hover {
      background-color: #45a848; /* ホバー時のボタンの色を微調整 */
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
      <a href="gakurekikeisan/entry.php" class="anker">
        <span class="material-symbols-outlined">draw</span>履歴書作成
      </a> |

      <a href="sikaku.php" class="anker">
        <span class="material-symbols-outlined">content_paste_go</span>資格登録
      </a> |

      <a href="mail/index.php" class="anker">
        <span class="material-symbols-outlined">mail</span>メール
      </a> |

      <a href="todolist/todolist.php" class="anker">
        <span class="material-symbols-outlined">check_circle</span>To do
      </a> |

      <a href="calendar.php" class="anker">
        <span class="material-symbols-outlined">calendar_month</span>カレンダー
      </a>
    </div>
  </div>
  <main>
    <div class="container">
      <h1>ホーム</h1>

      <?php echo $message; ?>
  </div>



    </div>

  </main>
</body>
</html>