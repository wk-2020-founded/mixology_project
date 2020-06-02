<?php

  require_once('functions.php');

  session_start();

  if($_SERVER['REQUEST_METHOD'] === "POST"){
    try {

      // バリデーション
      validateToken();
      $_POST = checkInput($_POST);
      validateOrder();

      // 言語設定
      mb_language("ja");
      mb_internal_encoding("UTF-8");

      // 変数とタイムゾーン設定
      $headers = null;
      $auto_reply_subject = null;
      $auto_reply_text = null;
      $admin_reply_subject = null;
      $admin_reply_text = null;
      $name         = $_POST['name'];
      $email        = $_POST['email'];
      $tel          = $_POST['tel'];
      $content      = $_POST['content'];
      $address      = $_POST['address'];
      // $date_1       = $_POST['date_1'];
      // $date_2       = $_POST['date_2'];
      $pay_method   = $_POST['pay_method'];
      $day          = $_POST['day'];
      $hour         = $_POST['hour'];
      $total_amount = $_POST['total_amount'];
      $item_name    = $_POST['item_name'];
      $price        = $_POST['price'];
      $pick_num     = $_POST['pick_num'];
      
      for($i = 0; $i < count($item_name); $i++) {
        $text_content .= '商品名: ' . h($item_name[$i]) . ' 価格: ' . h($price[$i]) . '円 ' . '個数: ' . h($pick_num[$i]) ."\n";
      }
      $text_content .= h($total_amount) . "\n\n";
      
      date_default_timezone_set('Asia/Tokyo');

      // ヘッダー情報 ＊問い合わせ先のEメールアドレスを記載
      $headers = "MIME-Version: 1.0\n";
      $headers .= "From: Home Mixology <mixology.takeout@gmail.com>\n";
      $headers .= "Reply-To: Home Mixology  <mixology.takeout@gmail.com>\n";

      // お客様と運営側宛の共通文章
      $reply_text .= "-----お客様情報-----\n";
      $reply_text .= "ご注文日時: " . date("Y-m-d H:i") . "\n";
      $reply_text .= "お名前: " . h($name) . "\n";
      $reply_text .= "メールアドレス: " . h($email) . "\n";
      $reply_text .= "お電話番号: " . h($tel) . "\n";
      $reply_text .= "備考: " . h($content) . "\n\n";
      $reply_text .= "-----下記はデリバリー注文のお客様のみ-----\n";
      $reply_text .= "お届け先: " . h($address) . "\n";
      // $reply_text .= "配送希望日\n";
      // $reply_text .= "第一希望: " . h($date_1) . "\n";
      // $reply_text .= "第ニ希望: " . h($date_2) . "\n";
      $reply_text .= "お支払い方法: " . h($pay_method) . "\n\n";
      $reply_text .= "-----下記はテイクアウト注文のお客様のみ-----\n";
      $reply_text .= "お受け取り希望日: " . h($day) . h($hour) . "\n\n";
      $reply_text .= "-----ご注文内容-----\n";
      $reply_text .=  h($text_content);

      // お客様宛メールの件名
      $auto_reply_subject = "注文完了のお知らせ";

      // お客様宛メールの本文
      $auto_reply_text .= h($name) ." 様" . "\n\n";
      $auto_reply_text .= "この度は弊社の商品をご注文いただききまして、誠に有難う御座います。" . "\n";
      $auto_reply_text .= "下記の内容にてお客様のご注文を受け付け致しましたので、ご確認ください。" . "\n\n";
      $auto_reply_text .= $reply_text;
      $auto_reply_text .= "スピリッツ＆シェアリング株式会社"; // お客様宛てに表示される送信元の会社名

      // お客様宛メール送信の設定
      $result1 = mb_send_mail(h(preventHeaderInjection($email)), $auto_reply_subject, $auto_reply_text, $headers);

      // 運営側宛メールの件名
      $admin_reply_subject = "新規のご注文を受け付けました";

      // 運営側宛メール本文
      $admin_reply_text .= "下記の内容でご注文を受け付けました。" . "\n\n";
      $admin_reply_text .= $reply_text;

      // 運営側宛メール送信先
      $result2 = mb_send_mail('mixology.takeout@gmail.com', $admin_reply_subject, $admin_reply_text, $headers);

      // ログ出力先
      $logdir = "./log/order/";
      // ファイル名に日時をつける
      $filename = sprintf("order_%s.log", date('YmdGHis'));
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
        $content      = '';
        $address      = '';
        // $date_1       = '';
        // $date_2       = '';
        $pay_method   = '';
        $day          = '';
        $hour         = '';
        $item_details = '';
        $total_amount = '';
        $item_name    = '';
        $price        = '';
        $pick_num     = '';
        $text_content = '';
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
      <link rel="stylesheet" href="./css/completed.css">

      <title>ご注文完了画面 | Home Mixology</title>
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
            <script>
              (function () {
              sessionStorage.clear();
              }());
            </script>
          <?php else: ?>
            <div class="title-section">
                <p>Order Completed</p>
                <h1>ご注文完了</h1>
                <div class="title-accent-line"></div>
            </div>

            <p>この度は弊社の商品をご注文いただきまして、誠にありがとうございます。</p>
            <p>お客様からのご注文内容を確認後、担当者より注文確定メールをお送り致しますので、今しばらくお待ちください。</p>

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


