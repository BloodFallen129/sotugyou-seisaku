<?php
// データベース接続情報
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "users_db"; // 作成したデータベース名

// データベースに接続
$connection = new mysqli($hostname, $username, $password, $dbname);

if ($connection->connect_error) {
  die("データベースに接続できませんでした: " . $connection->connect_error);
}

// 新規登録処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $student_id = $_POST["student_id"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // パスワードハッシュ化
  $name = $_POST["name"];

  $query = "INSERT INTO user (student_id, password, name) VALUES ('$student_id', '$password', '$name')";
  
  if ($connection->query($query) === TRUE) {
    echo "登録が完了しました。";
  } else {
    echo "エラー: " . $query . "<br>" . $connection->error;
  }
}

$connection->close();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログインページ</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-image: url(image/texture-background.jpg);
      background-size: cover;
    }


    .login-container {
      max-width: 400px;
      background-color: #fff;
      padding: 40px;
      border-radius: 5px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: bold;
      margin: 0;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-right: 30px;
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
    h2{
      margin: 0;
    }
    .parent{
      text-align: left;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="parent">
      <img class="job" src="img/jobsupport.png" alt="">
    <h2>新規登録</h2>
      <form method="post" action="registration.php">
        <label for="student_id">学籍番号:</label>
        <input type="text" id="student_id" name="student_id" required>
  
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required>
  
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required>
  
        <button type="submit">登録</button>
        <button onclick="window.location.href='index.php'">戻る</button>
</form>

