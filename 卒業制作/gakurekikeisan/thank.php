<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>会員登録完了</title>
    <div class="header">
    <h1>就職活動支援サイト JOB SUPPORT</h1>
    <a href="toppage.php">
    <img src="image/jobsupport2.png" alt="Job Support" class="logo">
  </a>
    <a href="#">履歴書作成</a> |
    <a href="#">資格登録</a> |
    <a href="#">メール</a> |
    <a href="#">To do</a> |
    <a href="#">カレンダー</a>
  </div>
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
        <p>会員登録が完了しました。</p>
        <p>下のボタンよりログインページに移動してください。</p>
        <br><br>
        <a href="toppage.php"><button class="btn">トップページに移動する</button></a>
    </div>
</body>
</html>