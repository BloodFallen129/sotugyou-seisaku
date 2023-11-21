<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

  // ログイン処理
  $student_id = $_POST["student_id"];
  $password = $_POST["password"];

  $query = "SELECT * FROM user WHERE student_id = '$student_id'";
  $result = $connection->query($query);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
      session_start(); // セッションを開始
        $_SESSION["user_name"] = $row["name"];
        // ログイン成功時の処理
        header("Location: toppage.php"); // トップページへリダイレクト
        exit(); 
    } else {
      $error_message = "パスワードが一致しません。";
    }
} else {
  $error_message = "ユーザーが見つかりません。";
}
  $connection->close();
}
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
      padding: 20px 50px 20px 20px;
      border-radius: 5px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      
      
    }

    label {
      font-weight: bold;
      margin-right:30px
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
    .error-message {
      color: red;
      margin-top: 10px
    }

    .job{
      width: 200px;
    }

    .parent{
      text-align: center;
    }

    h2{
      margin: 0;
    }


  </style>
</head>
<body>
  <div class="login-container">
    <div class="parent">
      <img class="job" src="image/jobsupport2.png" alt="">
    <h2>就活生用ログイン</h2>
    </div>
    <form id="loginForm" method="post" action="login.php">
      <label for="student_id">学籍番号</label>
      <input type="text" id="student_id" name="student_id" required>
  
      <label for="password">パスワード</label>
      <input type="password" id="password" name="password" required>
  
      <?php if (isset($error_message)) : ?>
  <p class="error-message"><?php echo $error_message; ?></p>
<?php endif; ?>


      <button type="submit">ログイン</button>

    </form>

    <form method="post" action="registration.php">
      <p>新規登録は <a href="registration.php">こちら</a></p>
    </form>
    <p>会社用のログインページは <a href="company_login.php">こちら</a></p>
</div>
  </div>
</body>

