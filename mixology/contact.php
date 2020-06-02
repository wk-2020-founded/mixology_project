<?php

  require_once('functions.php');

  session_start();

  createToken();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問合わせ｜Home Mixology</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/navigation.css">
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
    
    <!-- Start header -->
    <header>
        <div class="header-left">
            <a href="https://mixology.co.jp/">Mixology Delivery</a>
        </div>
        <div class="header-right">
            <nav>
                <ul>
                <li>
                        <a href="https://mixology.co.jp/">Top</a>
                    </li>
                    <div class="nav-vertical-line"></div>
                    <li>
                        <a href="https://mixology.co.jp/menu">Menu</a>
                    </li>
                    <div class="nav-vertical-line"></div>
                    <li>
                        <a href="https://mixology.co.jp/shopping_guide">Shopping Guide</a>
                    </li>
                    <div class="nav-vertical-line"></div>
                    <li>
                        <a href="https://mixology.co.jp/company">Company</a>
                    </li>
                    <div class="nav-vertical-line"></div>
                    <li>
                        <a href="https://mixology.co.jp/contact">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- End header -->

    <!-- Start responsive menu -->
    <div class="sm-menu">
        <div class="menu-bar">
            <a class="menu-trigger">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div id="menu-show">
                <div class="menus">
                    <div class="menu">
                        <ul>
                            <li><a href="https://mixology.co.jp/">top</a></li>
                            <li><a href="https://mixology.co.jp/menu">Menu</a></li>
                            <li class="menu-each"><a href="https://mixology.co.jp/menu#delivery-menu">—　Delivery Menu　—</a></li>
                            <li class="menu-each"><a href="https://mixology.co.jp/menu#takeout-menu">—　Takeout Menu　—</a></li>
                            <li class="menu-each"><a href="https://mixology.co.jp/menu#collaboration-menu">—　Collaboration Menu　—</a></li>
                            <li><a href="https://mixology.co.jp/shopping_guide">Shopping Guide</a></li>
                            <li><a href="https://mixology.co.jp/company">Company</a></li>
                            <li><a href="https://mixology.co.jp/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End responsive menu -->

    <!-- Start contact-wrapper -->
    <div id="contact-wrapper">
        <div class="container">
            <div class="section-title">
                <p>お問合わせ</p>
                <h2>Contact</h2>
                <div class="title-accent-line"></div>
            </div>
            <p>サービスや商品に関するご質問・ご相談など、お気軽にお問合せください。</p>
            <form action="send.php" method="post">
                <div class="form-item">
                    <label for="name">お名前<span>※必須</span></label>
                    <input id="name" type="text" name="name" placeholder="お名前" required>
                </div> 
                <div class="form-item">
                    <label for="email">メールアドレス<span>※必須</span></label>
                    <input id="email" type="email" name="email" placeholder="example@email.com" required>
                </div>
                <div class="form-item">
                    <label for="tel">お電話番号</label>
                    <input id="tel" type="text" name="tel" placeholder="09012345678">
                </div>
                <div class="form-item">
                    <label for="detail" required>お問合わせ内容<span>※必須</span></label>
                    <textarea id="detail" name="detail" cols="30" rows="10" placeholder="お問合わせ内容はこちら" required></textarea>
                </div>
                <div class="submit-btn">
                    <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
                    <input type="submit" value="SEND">
                </div> 
            </form>
        </div>
    </div>
    <!-- End contact-wrapper -->
    
    <!-- Start footer -->
    <footer>
        <div class="container">
            <p>©Copyright2020 Home Mixology .All Rights Reserved.</p>
        </div>
    </footer>
    <!-- End footer -->

    <script src="js/jQuery-3.4.1.min.js" defer></script>
    <script src="js/menu.js" defer></script>

</body>
</html>