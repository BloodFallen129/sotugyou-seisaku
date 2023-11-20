<?php
require 'vendor/autoload.php'; // PHPMailerを読み込む

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = $_POST['to'];
    $subject = $_POST['subject']; // HTMLフォームからの件名をそのまま受け取る
    $message = $_POST['message'];

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com'; // GmailのSMTPサーバー
    $mail->Port = 587; // SMTPサーバーのポート番号
    $mail->Username = 'k022c2032@g.neec.ac.jp'; // Gmailのメールアカウント
    $mail->Password = 'diifrrakqmhrgrht'; // Gmailのアプリパスワード

    $mail->setFrom('k022c2032@g.neec.ac.jp', 'k022c2032');
    $mail->addAddress($to);
    $mail->CharSet = 'UTF-8'; // 文字エンコーディングをUTF-8に設定
    $mail->Encoding = 'base64'; // エンコーディングをbase64に設定
    $mail->Subject = $subject; // ここはそのままHTMLフォームからの件名を設定
    $mail->Body = $message;

    if ($mail->send()) {
        $resultMessage = 'メールが送信されました！';
        $resultClass = 'success';
    } else {
        $resultMessage = 'メールの送信に失敗しました: ' . $mail->ErrorInfo;
        $resultClass = 'error';
    }
}
?>

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
            <!-- フォーム要素 -->
        </form>
        <div class="result <?php echo $resultClass; ?>">
            <?php echo $resultMessage; ?>
        </div>
    </div>
</body>
</html>
