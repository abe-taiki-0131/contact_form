<?php

// お問い合わせフォームから飛んできているとき
if ( !empty($_POST['submit']) ) {
    $mail_address = $_POST['mail_address'];
    $user_name = $_POST['user_name'];
    $question = $_POST['question'];
// 正規のルートで飛んできていないとき
} else {
    // お問い合わせフォームに飛ばす
    header("location: ./form.php");
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>確認画面</h1>
    <form id="form" action="mail_send.php" method="post">
        <div class="form_content">
            連絡先メールアドレス<br>
            <input id="mail_address" value="<?php echo $mail_address; ?>" type="text" disabled><br><br>
        </div>
        <div class="form_content">
            Webネーム<br>
            <input id="user_name" type="text" value="<?php echo $user_name;?>" disabled><br><br>
        </div>
        <div class="form_content">
            お問い合わせ内容<br>
            <textarea id="textarea" disabled><?php echo $question;?></textarea><br><br>
        </div>
        <input name="submit" type="submit" value="問い合わせる" class="btn-square">
        <input style="color:white; background-color:#000;" type="button" value="前のページに戻る" class="btn-square" onclick="history.back();">
        <!-- hiddenを使い、データを持たせる -->
        <input type="hidden" name="mail_address" value="<?php echo $mail_address; ?>">
        <input type="hidden" name="user_name" value="<?php echo $user_name;?>">
        <input type="hidden" name="question" value="<?php echo $question;?>">
    </form>
</body>
</html>