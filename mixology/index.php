<?php

  require_once('functions.php');

  session_start();

  createToken();
  
  // jsonファイルの読み込み
  $file = "./menu_list.json";
  $json = file_get_contents($file);
  $menu_data = json_decode($json,true);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Mixology｜Mixology Groupが提案するMixology Cocktailの味を自宅でお届けします。</title>
    <link rel="stylesheet" href="./css/style.css">
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

    <!-- Start top-wrapper -->
    <div id="top-wrapper">
            <div class="header-logo">
                <img src="img/header_logo.png" alt="">
                <a href="https://mixology.co.jp/mixology_test-upload/">Drinks<br>At Home</a>
            </div>
            <div class="top-title">
                <h1>Mixology Delivery</h1>
                <div class="header-title-line"></div>
                <p>Mixology Cocktailを<span class="sm-text-block">あなたの自宅へお届けします!</span></p>    
            </div>
    </div>

    <!-- Start navigation -->
    <div id="navigation">
        <div class="container">
            <nav>
                <ul>
                    <li>
                        <a href="#collaboration-wrapper">Chef Collaboration</a>
                    </li>
                    <div class="nav-vertical-line"></div>
                    <li>
                        <a href="#step-wrapper">Steps</a>
                    </li>
                    <div class="nav-vertical-line"></div>
                    <li>
                        <a href="#menu-wrapper">Menu</a>
                    </li>
                    <div class="nav-vertical-line"></div>
                    <li>
                        <a href="https://mixology.co.jp/mixology_test-upload/shopping_guide">Shopping Guide</a>
                    </li>
                    <div class="nav-vertical-line"></div>
                    <li>
                        <a href="https://mixology.co.jp/mixology_test-upload/contact">Contact</a>
                    </li>
                    <div class="nav-vertical-line"></div>
                    <li>
                        <a href="https://mixology.co.jp/mixology_test-upload/company_profile">Profile</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="sm-menu">
    <div class="menu-bar">
        <a class="menu-trigger">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <!-- Start menu-show -->
        <div id="menu-show">
            <div class="menus">
                <div class="menu">
                    <ul>
                        <li><a class="link-item" href="#top-wrapper">top</a></li>
                        <li><a class="link-item" href="#collaboration-wrapper">Chef Collaboration</a></li>
                        <li><a class="link-item" href="#step-wrapper">Steps</a></li>
                        <li><a class="link-item" href="#menu-wrapper">Menu</a></li>
                        <li class="menu-each"><a class="link-item" href="#delivery-menu">—　Delivery Menu　—</a></li>
                        <li class="menu-each"><a class="link-item" href="#takeout-menu">—　Takeout Menu　—</a></li>
                        <li class="menu-each"><a class="link-item" href="#collaboration-menu">—　Collaboration Menu　—</a></li>
                        <li><a href="https://mixology.co.jp/mixology_test-upload/shopping_guide">Shopping Guide</a></li>
                        <li><a href="https://mixology.co.jp/mixology_test-upload/contact">Contact</a></li>
                        <li><a href="https://mixology.co.jp/mixology_test-upload/company_profile">Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End menu-show -->    
    </div>
    </div>
    
    <!-- Start intro-wrapper -->
    <div id="intro-wrapper">
        <div class="section-title">
            <h2 class="title-animation"><span class="letter-strong">M</span>ixology to <span class="sm-text-block"><span class="letter-strong">Y</span>our <span class="letter-strong">H</span>ome</span></h2>
            <div class="title-accent-line"></div>
        </div>

        <div class="intro">
            <p class="animation-text">都内で展開するMixology Groupが作る、<br>
                自宅で本格的なカクテルと料理が楽しめる<br>
                デリバリー＆テイクアウトメニューです。</p>
            <p class="animation-text">ご希望のメニューを選んで<span class="sm-text-block">注文画面よりご注文下さい。</span><br>
                後日お届け日、引渡し日の<span class="sm-text-block">ご連絡を致します。</span></p>
            <p class="animation-text" style="font-size: 12px;margin-top:25px;">※東京都のみでご利用いただけるサービスとなります。<br>予めご了承ください。</p>                
            <div class="to-menu">
                <a class="to-delivery" href="#delivery-menu">
                    <span class="animation-btn-text">Delivery Menu</span>
                    <span class="to-menu-arrow animation-btn-text"></span>
                </a>
                <a class="to-takeout" href="#takeout-menu">
                    <span class="animation-btn-text">Takeout Menu</span>
                    <span class="to-menu-arrow animation-btn-text"></span>
                </a>
            </div>
        </div>

        <div id="slide_animation">
          <ul class="auto_slider">
            <li><img src="img/sencha_tonic.jpg"></li>
            <li><img src="img/Gyokuro_Martini.jpg"></li>
            <li><img src="img/Gintonic.jpg"></li>
            <li><img src="img/God_Father.jpg"></li>
            <li><img src="img/Negroni.jpg"></li>
            <li><img src="img/Manhattan2.jpg"></li>
            <li><img src="img/Pinacolada.jpg"></li>
          </ul>
          <ul class="auto_slider">
            <li><img src="img/sencha_tonic.jpg"></li>
            <li><img src="img/Gyokuro_Martini.jpg"></li>
            <li><img src="img/Gintonic.jpg"></li>
            <li><img src="img/God_Father.jpg"></li>
            <li><img src="img/Negroni.jpg"></li>
            <li><img src="img/Manhattan2.jpg"></li>
            <li><img src="img/Pinacolada.jpg"></li>
          </ul>
        </div>

    </div>

    <!-- Start collaboration-wrapper -->
    <div id="collaboration-wrapper">
        <div class="container">

            <div class="section-title">
                <p class="title-animation">スペシャルコラボメニュー</p>
                <h2 class="title-animation">Chef Collaboration</h2>
                <div class="title-accent-line"></div>
            </div>

            <div class="collaboration-contents">
                <div class="collaboration-content">
                    <div class="img-wrap">
                        <img src="img/chef_image.jpg" alt="">
                    </div>
                    <div class="collaboration-description">
                        <h3 class="animation-text">Mixology × 奥田政行</h3>
                        <div class="collaboration-line"></div>
                        <p class="animation-text">農林水産省「料理マスターズ」第1回受賞者にも選ばれた「アル・ケッチァーノ」オーナー奥田政行シェフとMixologyのコラボが決定！</p>
                        <p class="animation-text">Mixologyカクテルとも相性が抜群のお料理を、ご自宅でお楽しみいただけます！他では味わえない逸品をCollaboration Menuよりテイクアウト商品としてご注文いただけます。</p>
                        <a class="to-collaboration" href="#collaboration-menu">
                            <span class="animation-btn-text">Collaboration Menu</span>
                            <span class="to-menu-arrow animation-btn-text"></span>
                        </a>                            
                    </div>
                </div>
                <div class="collaboration-content">
                    <div class="collaboration-description">
                        <h3 class="animation-text">Profile</h3>
                        <p class="profile-name animation-text">奥田政行 Masayuki Okuda</p>
                        <div class="collaboration-line"></div>
                        <p class="animation-text">1969年12月4日生 / 山形県出身 / A型</p>
                        <p class="animation-text">高校卒業後、東京のイタリアン、フレンチなどで働く。26歳で帰郷し、鶴岡ワシントンホテルに就職、翌年料理長に就任。98年、農家レストラン「穂波街道」で2年間シェフを務め、00年独立。07年隣地にカフェ＆ドルチェの店「イル・ケッチァーノ」を、09年、東京・銀座に「ヤマガタ サンダンデロ」を開店。05年より「食の都庄内」親善大使、一昨年、農林水産省「料理マスターズ」第1回受賞者に選ばれる。</p>
                    </div>
                    <div class="collaboration-image animation-text">
                        <img src="img/food/Collaboration_food.jpg" alt="">
                        <img src="img/manhattan.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start step-wrapper -->
    <div id="step-wrapper">
        <div class="container">

            <div class="section-title">
                <p class="title-animation">ご注文までの流れ</p>
                <h2 class="title-animation">Steps</h2>
                <div class="title-accent-line"></div>
            </div>
            
            <div class="steps">
                <div class="step animation-text">
                    <img src="img/menu_icon.png" alt="">
                    <h3>商品閲覧</h3>
                    <p>Browse</p>
                    <p class="step-text"><a href="#menu-wrapper">Delivery & Takeout Menu</a>よりメニューをご覧いただき、ご希望の商品をお選びいただきます。</p>    
                </div>
                <div class="step animation-text">
                    <img src="img/select_icon.png" alt="">
                    <h3>個数選択</h3>
                    <p>Select</p>
                    <p class="step-text">ご希望商品の個数を選択し、メニュー下の「注文確認画面へ」ボタンをクリックします。</p>    
                </div>
                <div class="step animation-text">
                    <img src="img/pen_icon.png" alt="">
                    <h3>必要事項入力</h3>
                    <p>Fill In</p>
                    <p class="step-text">画面に表示される注文内容に間違いがないか確認し、必要事項を入力の上、「注文を完了する」ボタンをクリックします。</p>    
                </div>
                <div class="step animation-text">
                    <img src="img/mail_icon.png" alt="">
                    <h3>注文完了</h3>
                    <p>Complete</p>
                    <p class="step-text">注文内容がメールで送信され、注文完了となります。内容を確認後、担当者より配送日または引渡し日のご連絡を致します。</p>    
                </div>
            </div>

        </div>
    </div>

    <div id="fixed-bg"></div>

    <!-- Start menu-wrapper -->
    <div id="menu-wrapper">
        <div class="section-title">
            <p class="title-animation">メニュー</p>
            <h2 class="title-animation">Delivery & Takeout Menu</h2>
            <div class="title-accent-line"></div>
        </div>
        <div class="container animation-text">
                
            <!-- delivery menu section -->
            <div class="menu-section">
                <div id="delivery-menu" class="menu-section-title">
                    <div class="menu-titles">
                        <p>デリバリーメニュー</p>
                        <h3>Delivery Menu</h3>    
                    </div>
                </div>

                <div class="menu-tab-group">
                    <ul>
                        <li class="delivery-menu-tab delivery-active">Delivery Cocktail Set</li>
                        <li class="delivery-menu-tab">Delivery Spirits</li>
                        <li class="delivery-menu-tab">Delivery Food</li>
                        <li class="delivery-menu-tab">Glass & Cocktail Tool</li>
                    </ul>
                </div>

                <div class="menu-list-group">
                    <div class="delivery-menu-list delivery-show">
                        <p class="menu-description">ご自宅で作るカクテルキットシリーズです。<br>
                            ぜひバーツール、グラスも揃えてホームバーを楽しんでください！</p>
                        <div class="product-list">
                            <!-- deliverly cactel set 7set (0~6) -->
                            <?php for($i = 0; $i < 7; $i++ ): ?>
                                <div class="product-item">
                                    <img src="<?= h($menu_data[$i]["src"])?>" alt="">
                                    <div class="item-details">
                                        <div class="item-title">
                                            <p><?= h($menu_data[$i]["sub_title"])?></p>
                                            <h4 class="item-name"><?= h(f($menu_data[$i]["item_name"]))?></h4>
                                        </div>
                                        <div class="item-line"></div>
                                        <div class="item-description">
                                            <p><?= h($menu_data[$i]["desc"][0])?></p>
                                            <p><?= h($menu_data[$i]["desc"][1])?></p>
                                        </div>
                                        <div class="item-price">
                                            <p><span data-id="prices" class="price">￥<?= h(f($menu_data[$i]["price"]))?></span></p>
                                            <div class="select-btn">
                                                <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                            <div class="delivery-spirits">
                                <h4 class="menu-category-title">—　Craft Gin Tonic Set　—</h4>
                                <div class="delivery-spirits-description">
                                    <img src="img/Gintonic.jpg" alt="">
                                    <div>
                                        <p>自宅で本格的なカクテルが楽しめるクラフトジントニックシリーズです。<br>全商品各ジンは小瓶に90mℓずつ、フィーバーツリートニックウォーター3本、ソーダ3本、ライム2個がセットになってます。<br>ぜひ自宅で一味違うジントニックを作ってお楽しみください。</p>
                                    </div>
                                </div>
                                <div class="columns">
                                    <!-- deliverly Craft Gin Tonic Set 3set (7~9) -->
                                    <?php for($i = 7; $i < 10; $i++ ): ?>
                                        <div class="two-column-item">
                                            <img src="<?= h($menu_data[$i]["src"])?>" alt="">
                                            <h5><?= h(f($menu_data[$i]["item_name"]))?></h5>
                                            <p><?= h($menu_data[$i]["desc"][0])?></p>
                                            <p><?= h($menu_data[$i]["desc"][1])?></p>
                                            <div class="spirit-price">
                                                <p>￥<?= h(f($menu_data[$i]["price"]))?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="delivery-menu-list">
                        <p class="menu-description">厳選したスピリッツ、ブラウンスピリッツをご自宅までお届けします。<br>
                                一味違うハイボールや稀少な食後酒もお楽しみください！</p>
                        
                            <div class="product-list">
                                <div class="delivery-spirits">
                                    <h4 class="menu-category-title">—　Selected High Ball　—</h4>
                                    <div class="delivery-spirits-description">
                                        <img src="img/highball.jpg" alt="">
                                        <div>
                                            <p>自宅で本格的なカクテルが楽しめるハイボールシリーズです。<br>全商品各ウイスキーは小瓶に100mℓずつがセットになってます。ぜひ自宅で一味違うハイボールを作ってお楽しみください。</p>
                                            <p>別売りウイルキンソン炭酸は190mℓ1本100円で別途お付けいたします。</p>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <!-- for文で回せるようにマークアップ変更必要 *後回し-->
                                        <!-- deliverly Selected High Ball Set 3set (10~12) -->
                                        <div class="two-column-item">
                                            <img src="<?= h($menu_data[10]["src"])?>" alt="">
                                            <h5><?= h(f($menu_data[10]["item_name"]))?></h5>
                                            <p><?= h($menu_data[10]["desc"][0])?></p>
                                            <p><?= h($menu_data[10]["desc"][1])?></p>
                                            <div class="spirit-price">
                                                <p>￥<?= h(f($menu_data[10]["price"]))?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[10]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[10]["item_name"])?>" data-price="<?= h($menu_data[10]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[10]["item_name"])?>">＋</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="two-column-item">
                                            <img src="<?= h($menu_data[11]["src"])?>" alt="">
                                            <h5>オールドウイスキーセット</h5>
                                            <p><?= h($menu_data[11]["desc"][0])?></p>
                                            <p><?= h($menu_data[11]["desc"][1])?></p>
                                            <div class="spirit-price">
                                                <p>￥<?= h(f($menu_data[11]["price"]))?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[11]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[11]["item_name"])?>" data-price="<?= h($menu_data[11]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[11]["item_name"])?>">＋</span>
                                                </div>
                                            </div>
                                            <p style="margin-top: 20px;"><?= h($menu_data[12]["desc"][0])?></p>
                                            <p><?= h($menu_data[12]["desc"][1])?></p>
                                            <div class="spirit-price">
                                                <p>￥<?= h(f($menu_data[12]["price"]))?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[12]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[12]["item_name"])?>" data-price="<?= h($menu_data[12]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[12]["item_name"])?>">＋</span>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                </div>
                            </div>

                            <div class="three-column-list">
                                <h4 class="menu-category-title">—　Whiskey　—</h4>
                                <p style="font-size:12px;margin-bottom: 60px;">下記商品は全てボトル販売商品になります。</p>
                                <div class="columns sm-columns">
                                    <!-- deliverly Whiskey 33set (13~45) -->
                                    <?php for($i = 13; $i < 46; $i++ ): ?>
                                        <div class="three-column-item">
                                            <img src="<?= h($menu_data[$i]["src"])?>" alt="">
                                            <div class="three-column-detail">
                                                <div class="three-column-title">
                                                    <p><?= h($menu_data[$i]["alc_type"])?></p>
                                                    <h5><?= h(f($menu_data[$i]["item_name"]))?></h5>    
                                                </div>
                                                <div class="three-column-price">
                                                    <p>￥<?= h(f($menu_data[$i]["price"]))?></p>
                                                    <div class="select-btn">
                                                        <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                        <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                        <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                    </div>
                    <div class="delivery-menu-list">
                        <p class="menu-description">Mixology Chefチームが作るFoodシリーズ。<br>
                        Dinnerを彩るパスタソース、ランチで絶大な人気を誇った牛筋のブラックカレーも登場。<br>
                        出来立てを急冷し、真空包装した状態でお届けします。こちらは温めなどの簡易的な調理が必要です。<br>カレーやパスタソースは、ルーやソースのみのご提供となります。</p>

                        <div class="product-list foods">
                            <!-- deliverly Food 6set (46~51) -->
                            <?php for($i = 46; $i < 52; $i++ ): ?>
                                <div class="food-item">
                                    <img src="<?= h($menu_data[$i]["src"])?>" alt="">
                                    <div class="food-details">
                                        <h4><?= h(f($menu_data[$i]["item_name"]))?></h4>
                                        <div class="food-price">
                                            <p>￥<?= h(f($menu_data[$i]["price"]))?><?= h($menu_data[$i]["desc"])?></p>
                                            <div class="select-btn">
                                                <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>

                    </div>

                    <div class="delivery-menu-list">
                        <p class="menu-description">Mixologyがお勧めするカクテルが一段と美味しくなるグラスや<br>自宅でカクテルが出来るお薦めのバーツールです。</p>
                        <div class="product-list">
                            <div class="columns">
                                <!-- for文で回せるようにマークアップ変更必要 *後回し-->
                                <!-- deliverly Glass & Cocktail tool 4set (52~55) -->
                                <div class="two-column-item">
                                    <img src="<?= h($menu_data[52]["src"])?>" alt="">
                                    <h4>木村硝子のコンパクト10～14ozシリーズ</h4>
                                    <p><?= h($menu_data[52]["desc"][0])?><br><?= h($menu_data[52]["desc"][1])?></p>
                                    <div class="spirit-price price-letter-sm">
                                        <p>￥<?= h(f($menu_data[52]["price"]))?><?= h($menu_data[52]["desc"][2])?></p>
                                        <div class="select-btn">
                                            <span class="minus" data-id="<?= h($menu_data[52]["item_name"])?>">−</span>
                                            <span class="number" id="<?= h($menu_data[52]["item_name"])?>" data-price="<?= h($menu_data[52]["price"])?>">0</span>
                                            <span class="pulus" data-id="<?= h($menu_data[52]["item_name"])?>">＋</span>
                                        </div>
                                    </div>
                                    <div class="spirit-price price-letter-sm">
                                        <p>￥<?= h(f($menu_data[53]["price"]))?><?= h($menu_data[53]["desc"])?></p>
                                        <div class="select-btn">
                                            <span class="minus" data-id="<?= h($menu_data[53]["item_name"])?>">−</span>
                                            <span class="number" id="<?= h($menu_data[53]["item_name"])?>" data-price="<?= h($menu_data[53]["price"])?>">0</span>
                                            <span class="pulus" data-id="<?= h($menu_data[53]["item_name"])?>">＋</span>
                                        </div>
                                    </div>
                                    <div class="spirit-price price-letter-sm">
                                        <p>￥<?= h(f($menu_data[54]["price"]))?><?= h($menu_data[54]["desc"])?></p>
                                        <div class="select-btn">
                                            <span class="minus" data-id="<?= h($menu_data[54]["item_name"])?>">−</span>
                                            <span class="number" id="<?= h($menu_data[54]["item_name"])?>" data-price="<?= h($menu_data[54]["price"])?>">0</span>
                                            <span class="pulus" data-id="<?= h($menu_data[54]["item_name"])?>">＋</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="two-column-item">
                                    <img src="<?= h($menu_data[55]["src"])?>" alt="">
                                    <h4><?= h(f($menu_data[55]["item_name"]))?></h4>
                                    <p><?= h($menu_data[55]["desc"][0])?></p>
                                    <div class="spirit-price price-letter-sm">
                                        <p>￥<?= h(f($menu_data[55]["price"]))?><?= h($menu_data[55]["desc"][1])?></p>
                                        <div class="select-btn">
                                            <span class="minus" data-id="<?= h($menu_data[55]["item_name"])?>">−</span>
                                            <span class="number" id="<?= h($menu_data[55]["item_name"])?>" data-price="<?= h($menu_data[55]["price"])?>">0</span>
                                            <span class="pulus" data-id="<?= h($menu_data[55]["item_name"])?>">＋</span>
                                        </div>
                                    </div>
                                </div>
                            </div>                                
                        </div>
                    </div>
                </div>

                <div class="order-btn-section">
                    <p class="msg" class="hide">*商品をお選びください。</p>
                    <div class="btn">注文確認画面へ</div>
                </div>
                <p style="margin-top: 60px; font-size: 12px;">※商品価格は全て税込みとなります。</p>
            </div>

            <!-- takeout menu section -->
            <div class="menu-section">
                <div class="menu-section-title">
                    <div id="takeout-menu" class="menu-titles">
                        <p>テイクアウトメニュー</p>
                        <h3>Takeout Menu</h3>    
                    </div>
                </div>

                <div class="menu-tab-group">
                    <ul>
                        <li class="takeout-menu-tab takeout-active">Cocktail Menu</li>
                        <li class="takeout-menu-tab">Selling by weight Spirits<br><span style="font-size: 12px;">(量り売り)</span></li>
                        <li class="takeout-menu-tab">Takeout Food</li>
                    </ul>
                </div>

                <div class="menu-list-group">
                    <div class="takeout-menu-list takeout-show">
                        <p class="menu-description">事前に注文を頂き、店頭にてお引渡し出来るカクテルシリーズ。<br>持ち帰れる容器に入れてお渡しします。<br>この他にも対応できるカクテルもありますので、特別なご注文は備考欄にご記入ください。</p>

                        <div class="product-list">
                            <div class="takeout-cocktail">
                                <h4 class="menu-category-title">—　Mixology Cocktail　—</h4>
                                <!-- takeout Mixology Cocktail 5set (56~60) -->
                                <?php for($i = 56; $i < 61; $i++ ): ?>
                                    <div class="takeout-cocktail-item">
                                        <div class="takeout-cocktail-name">
                                            <h5><?= h($menu_data[$i]["sub_title"])?>　<?= h(f($menu_data[$i]["item_name"]))?></h5>
                                            <p><?= h($menu_data[$i]["desc"])?></p>
                                        </div>
                                        <div class="takeout-cocktail-price">
                                            <p>￥<?= h(f($menu_data[$i]["price"]))?></p>
                                            <div class="select-btn">
                                                <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <div class="takeout-cocktail">
                                <h4 class="menu-category-title">—　Tea Cocktail　—</h4>
                                <!-- takeout Tea Cocktail 4set (61~64) -->
                                <?php for($i = 61; $i < 65; $i++ ): ?>
                                    <div class="takeout-cocktail-item">
                                        <div class="takeout-cocktail-name">
                                            <h5><?= h($menu_data[$i]["sub_title"])?>　<?= h(f($menu_data[$i]["item_name"]))?></h5>
                                            <p><?= h($menu_data[$i]["desc"])?></p>
                                        </div>
                                        <div class="takeout-cocktail-price">
                                            <p>￥<?= h(f($menu_data[$i]["price"]))?></p>
                                            <div class="select-btn">
                                                <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <div class="takeout-cocktail">
                                <h4 class="menu-category-title">—　Classic Cocktail by Mixology Heritage　—</h4>
                                <!-- takeout Classic Cocktail 4set (65~68) -->
                                <?php for($i = 65; $i < 69; $i++ ): ?>
                                    <div class="takeout-cocktail-item">
                                        <div class="takeout-cocktail-name">
                                            <h5><?= h($menu_data[$i]["sub_title"])?>　<?= h(f($menu_data[$i]["item_name"]))?></h5>
                                            <p><?= h($menu_data[$i]["desc"])?></p>
                                        </div>
                                        <div class="takeout-cocktail-price">
                                            <p>￥<?= h(f($menu_data[$i]["price"]))?></p>
                                            <div class="select-btn">
                                                <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <div class="takeout-menu-list">
                        <p class="menu-description">事前に注文を頂き、店頭にてお引渡し出来る量り売りシリーズ。<br>お好きなスピリッツ、ブラウンスピリッツなどをお好みの量だけお売りできます。<br>容器（瓶）は店頭でご用意しております。（別売り）</p>
                        <p class="menu-description">量り売りのご注文は各100mlごとで承ります。<br>記載外の商品もございますので、ご希望の場合は別途<a href="https://mixology.co.jp/mixology_test-upload/contact" style="color: #222;text-decoration:underline;">お問合わせフォーム</a>よりご連絡ください。</p>
                        <p class="menu-description" style="font-size:12px;">※記載されている金額は、100mlごとの価格となります。</p>

                        <div class="three-column-list">
                            <h4 class="menu-category-title">—　Whiskey　—</h4>
                            <div class="columns sm-columns">
                                <!-- takeout Whiskey 10set (69~78) -->
                                <?php for($i = 69; $i < 79; $i++ ): ?>
                                    <div class="three-column-item">
                                        <img src="<?= h($menu_data[$i]["src"])?>" alt="">
                                        <div class="three-column-detail">
                                            <div class="three-column-title">
                                                <p><?= h($menu_data[$i]["alc_type"])?></p>
                                                <h5><?= h(str_replace("/100ml", '', f($menu_data[$i]["item_name"]))) ?></h5>    
                                            </div>
                                            <div class="three-column-price">
                                                <p>￥<?= h(f($menu_data[$i]["price"]))?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <h4 class="menu-category-title">—　Others　—</h4>
                            <div class="columns sm-columns">
                                <!-- takeout Others 10set (79~90) -->
                                <?php for($i = 79; $i < 91; $i++ ): ?>
                                    <div class="three-column-item">
                                        <img src="<?= h($menu_data[$i]["src"])?>" alt="">
                                        <div class="three-column-detail">
                                            <div class="three-column-title">
                                                <p><?= h($menu_data[$i]["alc_type"])?></p>
                                                <h5><?= h(str_replace("/100ml", '', f($menu_data[$i]["item_name"]))) ?></h5>    
                                            </div>
                                            <div class="three-column-price">
                                                <p>￥<?= h(f($menu_data[$i]["price"]))?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <div class="takeout-menu-list">
                        <p class="menu-description">Mixology Chefチームが作るFoodシリーズ。<br>お酒にあうつまみ、Dinnerを彩るパスタソース、ランチで絶大な人気を誇った牛筋のブラックカレーも登場。</p>
                        <div class="product-list">
                            <div class="columns">
                                <!-- takeout Food 8set (91~99) -->
                                <?php for($i = 91; $i < 94; $i++ ): ?>
                                    <div class="two-column-item">
                                        <img src="<?= h($menu_data[$i]["src"])?>" alt="">
                                        <div class="food-details">
                                            <h4><?= h(f($menu_data[$i]["item_name"]))?></h4>
                                            <p><?= h($menu_data[$i]["desc"][0])?></p>
                                            <p style="margin-top:20px;"><?= h($menu_data[$i]["desc"][1])?></p>
                                            <div class="spirit-price">
                                                <p>￥<?=h(f($menu_data[$i]["price"]))?><?= h($menu_data[$i]["desc"][2])?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>

                                <?php for($i = 94; $i < 97; $i++ ): ?>
                                    <div class="two-column-item">
                                        <ul class="food-slider">
                                            <?php foreach($menu_data[$i]["src"] as $url): ?>
                                                <li><img src="<?= h($url) ?>" alt=""></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <div class="food-details">
                                            <h4><?= h(f($menu_data[$i]["item_name"]))?></h4>
                                            <p><?= h($menu_data[$i]["desc"][0])?></p>
                                            <p style="margin-top:20px;"><?= h($menu_data[$i]["desc"][1])?></p>
                                            <div class="spirit-price">
                                                <p>￥<?= h(f($menu_data[$i]["price"]))?><?= h($menu_data[$i]["desc"][2])?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                                
                                <?php for($i = 97; $i < 100; $i++ ): ?>
                                    <div class="two-column-item">
                                        <img src="<?= h($menu_data[$i]["src"])?>" alt="">
                                        <div class="food-details">
                                            <h4><?= h(f($menu_data[$i]["item_name"]))?></h4>
                                            <p><?= h($menu_data[$i]["desc"][0])?></p>
                                            <div class="spirit-price">
                                                <p>￥<?= h(f($menu_data[$i]["price"]))?><?= h($menu_data[$i]["desc"][1])?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[$i]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[$i]["item_name"])?>" data-price="<?= h($menu_data[$i]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[$i]["item_name"])?>">＋</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-btn-section">
                    <p class="msg" class="hide">*商品をお選びください。</p>
                    <div class="btn">注文確認画面へ</div>
                </div>
                <p style="margin-top: 60px; font-size: 12px;">※商品価格は全て税込みとなります。</p>
            </div>

            <!-- collaboration menu section -->
            <div class="menu-section">
                <div class="menu-section-title">
                    <div id="collaboration-menu" class="menu-titles">
                        <p>コラボレーションメニュー</p>
                        <h3>Collaboration Menu</h3>    
                    </div>
                </div>

                <p class="menu-description">「アル・ケッチァーノ」オーナー奥田政行シェフとコラボした<span class="tb-text-block">特別の逸品がテイクアウトメニューで登場！ </span><br>ここでしか味わえない逸品を、相性抜群のMixologyカクテルと共にお楽しみください！</p>
                <div class="product-list foods">
                    <div class="collaboration-intro">
                        <img src="img/chef_image.jpg" alt="">
                        <div class="collaboration-intro-details">
                            <div class="collaboration-description">
                                <h3 class="sm-text-center">Profile</h3>
                                <p class="profile-name">奥田政行 Masayuki Okuda</p>
                                <div class="collaboration-line"></div>
                                <p>1969年12月4日生 / 山形県出身 / A型</p>
                                <p>高校卒業後、東京のイタリアン、フレンチなどで働く。26歳で帰郷し、鶴岡ワシントンホテルに就職、翌年料理長に就任。98年、農家レストラン「穂波街道」で2年間シェフを務め、00年独立。07年隣地にカフェ＆ドルチェの店「イル・ケッチァーノ」を、09年、東京・銀座に「ヤマガタ サンダンデロ」を開店。05年より「食の都庄内」親善大使、一昨年、農林水産省「料理マスターズ」第1回受賞者に選ばれる。</p>
                            </div>
                        </div>
                    </div>

                    <div class="collaboration-food-list" style="margin-bottom: 80px;">
                        <div class="collaboration-item-line">
                            <p>Collaboration 1</p>
                            <span></span>
                        </div>
                        <p>今年の2月に銀座サンダンデロに限定で開催した<br>奥田シェフ×Mixology南雲主于三のペアリングディナーで大絶賛された組み合わせが登場！</p>
                        <p>猪の赤ワイン煮を食べて、ほうじ茶のラムマンハッタンを飲むと味わいの深みが一気に増して、<span class="text-block">リッチに大変身！限定20食のみの限定販売。</span></p>
                        <div class="collaboration-food-item">
                            <!-- for文で回せるようにマークアップ変更必要 *後回し-->
                            <!-- takeout collaboration food 2set (100~101) -->
                            <div class="collaboration-food">
                                <img src="<?= h($menu_data[100]["src"])?>" alt="">
                                <div class="sm-text-left" >
                                    <h4><?= h(f($menu_data[100]["item_name"]))?></h4>
                                    <p style="font-size: 14px;"><?= h($menu_data[100]["desc"][0])?><br><?= h($menu_data[100]["desc"][1])?><br><?= h($menu_data[100]["desc"][2])?></p>
                                    <div class="collaboration-food-price">
                                        <p>￥<?= h(f($menu_data[100]["price"]))?></p>
                                        <div class="select-btn">
                                            <span class="minus" data-id="<?= h($menu_data[100]["item_name"])?>">−</span>
                                            <span class="number" id="<?= h($menu_data[100]["item_name"])?>" data-price="<?= h($menu_data[100]["price"])?>">0</span>
                                            <span class="pulus" data-id="<?= h($menu_data[100]["item_name"])?>">＋</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collaboration-food">
                                <img src="<?= h($menu_data[101]["src"])?>" alt="">
                                <div class="sm-text-left" >
                                    <h4><?= h(f($menu_data[101]["item_name"]))?></h4>
                                    <div class="collaboration-food-price">
                                        <p>￥<?= h(f($menu_data[101]["price"]))?><?= h($menu_data[101]["desc"])?></p>
                                        <div class="select-btn">
                                            <span class="minus" data-id="<?= h($menu_data[101]["item_name"])?>">−</span>
                                            <span class="number" id="<?= h($menu_data[101]["item_name"])?>" data-price="<?= h($menu_data[101]["price"])?>">0</span>
                                            <span class="pulus" data-id="<?= h($menu_data[101]["item_name"])?>">＋</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collaboration-food-list">
                        <div class="collaboration-item-line">
                            <p>Collaboration 2</p>
                            <span></span>
                        </div>
                        <p>奥田シェフが厳選した最高級の山形牛A５を使った和牛のコンフィ。<br>合わせるのはクラシックカクテルの巨匠伊藤学が長年提供し続けている<br>和牛に合うウイスキーブレンドとウイスキー醤油のセット。</p>
                        <!-- for文で回せるようにマークアップ変更必要 *後回し-->
                        <!-- takeout collaboration food 2set (102~103) -->
                        <div class="collaboration-food-item">
                            <div class="collaboration-food">
                                <img src="<?= h($menu_data[102]["src"])?>" alt="">
                                <p class="img-text">※写真はイメージです。</p>
                                <div class="sm-text-left" style="margin-top: 15px;">
                                    <h4><?= h(f($menu_data[102]["item_name"]))?></h4>
                                    <p style="font-size:14px;"><?= h($menu_data[102]["desc"])?></p>
                                    <div class="collaboration-food-price">
                                        <p>￥<?= h(f($menu_data[102]["price"]))?></p>
                                        <div class="select-btn">
                                            <span class="minus" data-id="<?= h($menu_data[102]["item_name"])?>">−</span>
                                            <span class="number" id="<?= h($menu_data[102]["item_name"])?>" data-price="<?= h($menu_data[102]["price"])?>">0</span>
                                            <span class="pulus" data-id="<?= h($menu_data[102]["item_name"])?>">＋</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collaboration-food">
                                <img src="<?= h($menu_data[103]["src"])?>" alt="">
                                <div class="sm-text-left">
                                    <h4><?= h(f($menu_data[103]["item_name"]))?></h4>
                                    <p style="font-size:14px;"><?= h($menu_data[103]["desc"][0])?></p>
                                    <div class="collaboration-food-price">
                                        <p><?= h(f($menu_data[103]["price"]))?><?= h($menu_data[103]["desc"][1])?></p>
                                        <div class="select-btn">
                                            <span class="minus" data-id="<?= h($menu_data[103]["item_name"])?>">−</span>
                                            <span class="number" id="<?= h($menu_data[103]["item_name"])?>" data-price="<?= h($menu_data[103]["price"])?>">0</span>
                                            <span class="pulus" data-id="<?= h($menu_data[103]["item_name"])?>">＋</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="order-btn-section">
                    <p class="msg" class="hide">*商品をお選びください。</p>
                    <div class="btn">注文確認画面へ</div>
                </div>
                <p style="margin-top: 60px; font-size: 12px;">※商品価格は全て税込みとなります。</p>
            </div>
        
        </div>
        <form id="form" action="order.php" method="post" style="display:none;">
            <div id="dynamic_form">
            </div>
            <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
            <input id="submit_btn" type="submit" value="送信">
        </form>
    </div>
    <!-- End menu-wrapper -->
    
    <!-- Start contact-wrapper -->
    <div id="contact-wrapper">
        <div class="container">
            <div class="section-title">
                <p class="title-animation">お問合わせ</p>
                <h2 class="title-animation">Contact</h2>
                <div class="title-accent-line"></div>
            </div>
            <p class="animation-text">サービスや商品に関するご質問・ご相談など、お気軽にお問合わせください。</p>
            <a class="to-contact animation-text" href="https://mixology.co.jp/mixology_test-upload/contact">
                <span>お問合わせはこちら</span>
                <span class="to-menu-arrow"></span>
            </a>
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

    <!-- jquery script -->
    <script src="js/jQuery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/main.js"></script>

</body>
</html>