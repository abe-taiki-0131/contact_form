<?php 

// flagが"1"でないとき、お問い合わせフォームに飛ばす
if ( $_GET['flag']!=="1" ) {
    header("location: ./form.php");
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信完了</title>
    <style>
        body {
            background-color: #60CDB8 ;
        }
        .messageWrap {
            position: relative;
            height: 200px;
            /* background-color: red; */
            /* margin: auto 0; */
        }
        .message {
            position: absolute;
            height: 50px;
            width: 420px;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: #F1F46C;
            font-size: 20px;
            /* background-color: red; */
            font-weight: bold;
        }
        .button {
            text-align: center;
        }
        .button input {
            display: inline-block;
            background-color: transparent;
            border-color: transparent;
            text-align: center;
            padding: 0.5em 1em;
            text-decoration: none;
            background: #F1F46C;/*ボタン色*/
            color: #000;
            border-radius: 5px;
            font-weight: bold;
            border-color: transparent;
            margin-top: 15px;
        }
        .button input:active {
            /*ボタンを押したとき*/
            -webkit-transform: translateY(4px);
            transform: translateY(4px);/*下に動く*/
            border-bottom: none;/*線を消す*/
            /* border-color: transparent; */
        }
    </style>
</head>
<body>
    <div class="messageWrap">
        <div class="message">お問い合わせ頂きありがとうございました。</div>
    </div>
    <div class="button">
        <input type="button" value="お問い合わせフォームに戻る" onclick="location.href='./form.php'">
    </div>
</body>
</html>