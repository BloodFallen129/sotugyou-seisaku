<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>履歴書自動作成サイト</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    .header {
      background-color: #007bff;
      color: #fff;
      padding: 10px 0;
      text-align: center;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
    }

    input, textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    button {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>履歴書自動作成プログラム</h2>
    <a href="#">履歴書作成</a> |
    <a href="#">資格登録</a> |
    <a href="#">メール</a>
  </div>
  
  <div class="container">
    <h1>トップページ</h1>
    <?php
    session_start(); // セッションを開始
    if (isset($_SESSION["user_name"])) {
      $user_name = $_SESSION["user_name"];
      echo "ようこそ、{$user_name}さん";
    } else {
      echo "セッションエラー";
    }
    ?>
    <!-- その他のコンテンツ -->
  </div>
</body>
</html>
