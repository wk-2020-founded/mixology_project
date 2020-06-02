<?php

require_once('functions.php');

session_start();

if($_SERVER['REQUEST_METHOD'] === "POST"){
  try {
    // バリデーション
    validateToken();
    $_POST = checkInput($_POST);
    validatePost();

    // 言語設定
    mb_language("ja");
    mb_internal_encoding("UTF-8");

    // 変数とタイムゾーン設定
    $headers = null;
    $auto_reply_subject = null;
    $auto_reply_text = null;
    $admin_reply_subject = null;
    $admin_reply_text = null;
    $name          = $_POST['name'];
    $email         = $_POST['email'];
    $tel           = $_POST['tel'];
    $detail        = $_POST['detail'];
    date_default_timezone_set('Asia/Tokyo');

    // ヘッダー情報 ＊問い合わせ先のEメールアドレスを記載
    $headers = "MIME-Version: 1.0\n";
    $headers .= "From: Home Mixology <mixology.takeout@gmail.com>\n";
    $headers .= "Reply-To: Home Mixology <mixology.takeout@gmail.com>\n";

    // お客様宛メールの件名
    $auto_reply_subject = "お問合わせ完了のお知らせ。";

    // お客様宛メールの本文
    $auto_reply_text .= h($name) ." 様" . "\n\n";
    $auto_reply_text .= "お問合わせいただきまして、誠にありがとうございます。" . "\n";
    $auto_reply_text .= "下記の内容にてお客様のお問合わせを受け付け致しましたので、ご確認ください。" . "\n\n";
    $auto_reply_text .= "お問合わせ日時: " . date("Y-m-d H:i") . "\n";
    $auto_reply_text .= "お名前: " . h($name) . "\n";
    $auto_reply_text .= "メールアドレス: " . h($email) . "\n";
    $auto_reply_text .= "お電話番号: " . h($tel) . "\n";
    $auto_reply_text .= "お問合わせ内容: " . h($detail) . "\n\n";
    $auto_reply_text .= "スピリッツ＆シェアリング株式会社" . "\n\n";

    // お客様宛メール送信の設定
    $result1 = mb_send_mail(h(preventHeaderInjection($email)), $auto_reply_subject, $auto_reply_text, $headers);

    // 運営側宛メールの件名
    $admin_reply_subject = "新規のお問合わせを受け付けました。";

    // 運営側宛メール本文の設定
    $admin_reply_text .= "下記の内容でお問合わせを受け付けました。" . "\n\n";
    $admin_reply_text .= "日付: " . date("Y-m-d H:i") . "\n";
    $admin_reply_text .= "お名前: " . h($name) . "\n";
    $admin_reply_text .= "メールアドレス: " . h($email) . "\n";
    $admin_reply_text .= "お電話番号: " . h($tel) . "\n";
    $admin_reply_text .= "お問合わせ内容: " . h($detail) . "\n";


    // 運営側宛メール送信の設定 ＊問い合わせメールを受信するEメールアドレス
    $result2 = mb_send_mail('mixology.takeout@gmail.com', $admin_reply_subject, $admin_reply_text, $headers);

    // ログ出力先
    $logdir = "./log/contact/";
    // ファイル名に日時をつける
    $filename = sprintf("contact_%s.log", date('YmdGHis'));
    // 出力内容
    $logs = $auto_reply_text;
    // ファイルへ出力
    file_put_contents($logdir.$filename, $logs);

    // 送信後の処理
    if ($result1 === true && $result2 === true) {
    //空の配列を代入し、すべてのPOST変数を消去
    $_POST = array(); 
    //変数の値も初期化
    $headers = '';
    $auto_reply_subject = '';
    $auto_reply_text = '';
    $admin_reply_subject = '';
    $admin_reply_text = '';
    $name         = '';
    $email        = '';
    $tel          = '';
    $detail      = '';
    } else {
      throw new Exception('メールが正しく送信されませんでした。');
    }
  
    // sessionの削除
    $_SESSION = [];

    if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 86400,'/');
    }

    session_destroy();

  } catch (Exception $e) {
    $errors = $e->getMessage();
  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問合わせ完了画面 | Home Mixology</title>
    <link rel="stylesheet" href="./css/completed.css">
    <!-- web font -->
    <script>
        (function(d) {
          var config = {
            kitId: 'ugc4ctk',
            scriptTimeout: 3000,
            async: true
          },
          h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
        })(document);
    </script>
</head>
<body>

    <div id="main-wrapper">
        <div class="container">

            <?php if(isset($errors)): ?>
            <p>下記のエラーが発生しております。</p>
            <div style="color:#6B0504;"><?= h($errors); ?></div>
            <p>お手数をお掛け致しますが、入力内容をご確認ください。</p>
            <?php else: ?>

            <div class="title-section">
                <p>Contact Form Sent</p>
                <h1>お問合わせ完了</h1>
                <div class="title-accent-line"></div>
            </div>

            <p>お問合わせいただきありがとうございます。</p>
            <p>お客様からのお問合わせ内容を確認後、担当者よりご指定いただいたご連絡先に返信致しますので、<span class="text-block">今しばらくお待ちください。</span></p>

            <!-- 項目④：Main Page URL -> 公開したLPのURL -->
            <a class="back-to-main" href="https://mixology.co.jp">メインページに戻る</a>
            <!-- // 記入はここまで -->
            <?php endif; ?>

        </div>
    </div>

    <!-- Start footer -->
    <footer>
        <p>©Copyright2020 Home Mixology .All Rights Reserved.</p>
    </footer>
    <!-- End footer -->
    
</body>
</html>