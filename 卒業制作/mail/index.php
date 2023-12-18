<!DOCTYPE html>
<html>
<head>
    <title>メール送受信フォーム</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>メール送受信フォーム</h1>
        <form action="send_mail.php" method="POST">
            <div class="form-group">
                <label for="to">宛先メールアドレス:</label>
                <input type="email" name="to" required>
            </div>
            <div class="form-group">
                <label for="subject">件名:</label>
                <input type="text" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">メッセージ:</label>
                <textarea name="message" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="送信">
            </div>
        </form>
        <div class="result">
            <!-- 送信結果メッセージがここに表示されます -->
        </div>
    </div>
</body>
</html>