<?php

// phpMailerの使用宣言
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// 「問い合わせる」ボタンが押されたときメールを送信
if ( isset($_POST['submit']) ) {
    $mail = new PHPMailer(true);
    // 言語設定、内部エンコーディングの指定
    mb_language('japanese');
    mb_internal_encoding("UTF-8");

    $mail = new PHPMailer(true);

    try {
        //Gmail 認証情報
        $host = 'smtp.gmail.com';
        $username = 'ユーザ名'; // example@gmail.com
        $password = 'パスワード';

        //差出人
        $from = '自分のメールアドレス';
        $fromname = '差出人';

        //宛先
        $to = $_POST['mail_address'];
        $toname = $_POST['user_name'];

        //件名・本文
        $subject = 'お問い合わせありがとうございます';
        $body = "Webネーム:&nbsp;" . $_POST['user_name'] ."\n";
        $body .= "メールアドレス:&nbsp;" . $_POST['mail_address'] ."\n";
        $body .= "お問い合わせ内容:&nbsp;" . $_POST['question'] ."\n\n";
        $body .= 'From:&nbsp;hogehoge株式会社';

        //メール設定
        // $mail->SMTPDebug = 2; //デバッグ用
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = $host;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = "utf-8";
        $mail->Encoding = "base64";
        $mail->setFrom($from, $fromname);
        $mail->addAddress($to, $toname);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        //メール送信
        $mail->send();
        // echo '成功';

        // flag = 1をURLパラメータとして持たせる
        header( "location: ./finish_mail_send.php?flag=1" );

    } catch (Exception $e) {
        echo '失敗: ', $mail->ErrorInfo;
    }

// 押されていない場合「お問い合わせフォーム」に飛ばす
} else {
    header("location: ./form.php");
}

?>