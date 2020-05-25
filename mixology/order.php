<?php

require_once('functions.php');

session_start();

try {
  validateToken();
} catch (Exception $e) {
  $errors = $e->getMessage();
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
  createToken();
  $data = checkInput($_POST);
}

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ご注文画面｜Home Mixology</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/order.css">
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
      <div class="title-section">
        <p>Order Confirmation</p>
        <h1>ご注文画面</h1>
        <div class="title-accent-line"></div>
      </div>
      <?php if(isset($errors)): ?>
        <p>下記のエラーが発生しております</p>
        <div style="color:#6B0504;"><?= h($errors); ?></div>
      <?php else: ?>
        <div class="description">
          <p>ご注文内容を確認の上、お客様情報を入力し注文を完了してください。</p>
          <p style="margin-top: 10px">お客様からのご注文を確認後、<br>担当者よりお届け日（デリバリー注文）/引渡し日（テイクアウト注文）の詳細をお送り致します。</p>
          <p style="margin-top: 10px">デリバリー商品をご注文のお客様には、<br>送料と代引き手数料（代引き払いを選択した場合）を別途記載の上、合計金額をお送り致します。</p>
        </div>
        <div class="container">
          <form action="confirm.php" method="post">
            <div class="confirm_item">
              <h2>ご注文内容</h2>
              <ul>
                <?php for($i = 0; $i < count($data['item_name']); $i++): ?>
                  <li>
                    <sapn class="item_name"><?= h($data['item_name'][$i]) ?> </span>
                    ￥<span class="price"><?= h($data['price'][$i]) ?></span>
                    × <span class="pick_num"><?= h($data['pick_num'][$i]) ?></span>
                    <input type="hidden" name="item_name[]" value="<?= h($data['item_name'][$i]) ?>">
                    <input type="hidden" name="price[]" value="<?= h($data['price'][$i]) ?>">
                    <input type="hidden" name="pick_num[]" value="<?= h($data['pick_num'][$i]) ?>">
                  </li>
                <?php endfor; ?> 
              </ul>
              <!-- <p><span class="total-price">合計金額：￥<span id="amount"></span></span>（税込）</p> 変更前-->
              <p id="total_amount"><span class="total-price">合計金額：￥<span id="amount"></span></span>（税込）</p>
              <input type="hidden" name="total_amount">
              <p style="margin-top: 10px;font-size: 12px; color: #6B0504;">デリバリー商品をご注文のお客様は、別途送料がかかります。</p>
            </div>

            <h2>お客様情報</h2>
            <!-- <form action="confirm.php" method="post"> -->

            <div class="form-item">
              <label for="name">お名前<span>※必須</span></label>
              <input id="name" type="text" name="name" placeholder="お名前はこちら" required>
            </div>

            <div class="form-item">
              <label for="email">メールアドレス<span>※必須</span></label>
              <input id="email" type="email" name="email" placeholder="example@email.com" required>
            </div>

            <div class="form-item">
              <label for="tel">お電話番号<span>※必須</span></label>
              <input id="tel" type="num" name="tel" placeholder="09012345678" required>
            </div>

            <div class="form-item">
              <label for="content">備考</label>
              <textarea id="content" name="content" placeholder="ご質問などがございましたら、こちらに記入ください。" ></textarea>
            </div>
            
            <p class="delivery-section" style="font-size: 12px;margin: 60px 0 40px">-------------下記はデリバリー注文のお客様のみとなります-------------</p>
            <p class="delivery-section-sm" style="font-size: 12px;margin: 60px 0 40px">----下記はデリバリー注文のお客様のみとなります----<p>

            <div class="form-item">
              <label for="address">お届け先<span>※建物名までご記入お願い致します。</span></label>
              <input id="address" type="text" name="address" placeholder="郵便番号：住所" >
            </div>

            <!-- <div class="form-item">
              <label>お届け希望日</label>
              <div class="preferred-date">
              <div class="select-btn select-wrap">
                <span>第一希望：</span>
                <select name="date_1">
                <option value="選択してください" hidden>選択してください</option>
                <option value="金曜日 12:00〜15:00">金曜日 12:00〜15:00</option>
                <option value="金曜日 15:00〜18:00">金曜日 15:00〜18:00</option>
                <option value="土曜日 12:00〜15:00">土曜日 12:00〜15:00</option>
                <option value="土曜日 15:00〜18:00">土曜日 15:00〜18:00</option>
                <option value="日曜日 12:00〜15:00">日曜日 12:00〜15:00</option>
                <option value="日曜日 15:00〜18:00">日曜日 15:00〜18:00</option>
              </select>
              </div>
              <div class="select-btn select-wrap">
                <span>第二希望：</span>
                <select name="date_2">
                <option value="選択してください" hidden>選択してください</option>
                <option value="金曜日 12:00〜15:00">金曜日 12:00〜15:00</option>
                <option value="金曜日 15:00〜18:00">金曜日 15:00〜18:00</option>
                <option value="土曜日 12:00〜15:00">土曜日 12:00〜15:00</option>
                <option value="土曜日 15:00〜18:00">土曜日 15:00〜18:00</option>
                <option value="日曜日 12:00〜15:00">日曜日 12:00〜15:00</option>
                <option value="日曜日 15:00〜18:00">日曜日 15:00〜18:00</option>
              </select>
              </div>
              </div>
            </div> -->

            <div class="form-item">
              <label>お支払い方法</label>
              <input type="radio" name="pay_method" value="銀行振込"><span class="space">銀行振込</span>
              <input type="radio" name="pay_method" value="代金引換"><span>代金引換</span>
            </div>

            <p class="delivery-section" style="font-size: 12px;margin: 60px 0 40px">-------------下記はテイクアウト注文のお客様のみとなります-------------</p>
            <p class="delivery-section-sm" style="font-size: 12px;margin: 60px 0 40px">----下記はテイクアウト注文のお客様のみとなります----<p>

            <div class="form-item">
              <label>お受け取り希望日</label>
              <div class="preferred-date">
                  <div class="select-btn select-wrap">
                      <span>曜日：</span>
                      <select name="day">
                        <option value="選択してください" hidden>選択してください</option>
                        <option value="水曜日">水曜日</option>
                        <option value="木曜日">木曜日</option>
                        <option value="金曜日">金曜日</option>
                        <option value="土曜日">土曜日</option>
                      </select>
                  </div>
                  <div class="select-btn select-wrap">
                      <span>時間：</span>
                      <select name="hour">
                        <option value="選択してください" hidden>選択してください</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                    </select>
                  </div>
              </div>
            </div>
            
            <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
            <button  id="submit" type="submit">注文を完了する</button>
          </form>
        </div>
      <?php endif; ?>
    </div>

    <!-- Start footer -->
    <footer>
        <p>©Copyright2020 Home Mixology .All Rights Reserved.</p>
    </footer>
    
    <script src="js/order.js"></script>
  </body>
</html>
