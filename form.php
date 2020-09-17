<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>お問い合わせフォーム</h1>
    <form id="form" name="form" action="check.php" method="post">
        <div class="form_content">
            連絡先メールアドレス<br>
            <input id="mail_address" type="text" name="mail_address" value=""><br><br>
        </div>
        <div class="form_content">
            Webネーム<br>
            <input id="user_name" type="text" name="user_name" value=""><br><br>
        </div>
        <div class="form_content">
            お問い合わせ内容<br>
            <textarea name="question" cols="24" rows="3" onkeyup="CountDownLength( 'cdlength1' , value , 100 );"></textarea>
            <p id="cdlength1">※あと100文字</p>
        </div>
        <input name="submit" type="submit" value="確認画面へ進む" class="btn-square" onclick="return check()">
        <input style="color:white; background-color:#000;" type="button" value="リセット" class="btn-square" onclick="return reload()">
    </form>

<script type="text/javascript">
    function CountDownLength( idn, str, mnum ) {
        document.getElementById(idn).innerHTML = "※あと" + (mnum - str.length) + "文字";
    }

    // 「確認画面へ進む」ボタンが押されたとき
    function check(){
        var mail_address = document.form.mail_address.value;
        var user_name = document.form.user_name.value;
        var question = document.form.question.value;

        // 未入力の項目がある場合
        if (mail_address=="" || user_name=="" || question==""){
            alert("⚠項目はすべて入力して下さい");
            return false;
        }else{
            // すべて入力されている場合
            sanitaize = {
                encode : function (str) {
                    return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#39;');
                },

                decode : function (str) {
                    return str.replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&quot;/g, '"').replace(/&#39;/g, '\'').replace(/&amp;/g, '&');
                }
            };
            // 入力値のサニタイズ
            mail_address = sanitaize.encode(mail_address);
            user_name = sanitaize.encode(user_name);
            question = sanitaize.encode(question);

            // エラーフラグを立てる
            var error_flag = 0;

            // メールアドレスの形式チェック
            var reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
            if ( !reg.test(mail_address) ) {
                alert("「メール」は正しい形式で入力してください");
                error_flag++;
            }
            // ユーザ名の長さチェック
            if ( user_name.length > 20 ) {
                alert("「名前」は20字以内で入力してください");
                error_flag++;
            }
            // お問い合わせ内容の長さチェック
            if ( question.length > 100 ) {
                alert("「お問い合わせ」は100字以内で入力してください");
                error_flag++;
            }

            // エラーチェックに引っかかっている場合
            if ( error_flag > 0 ) {
                return false;
            // 全項目が正しく入力されている場合
            } else {
                
                return true;
            }
        }
    }

    // 「リセット」ボタンが押されたとき
    function reload() {
        if ( window.confirm("リセットしてもよろしいですか？")===true ) {
            return window.location.reload();
        // 「キャンセル」が押されたとき
        } else {
            return false;
        }
    }
</script>
</body>
</html>