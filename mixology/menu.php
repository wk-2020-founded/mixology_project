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
    <title>メニュー｜Mixology Groupが提案するMixology Cocktailの味を自宅でお届けします。</title>
    <link rel="stylesheet" href="./css/main_menu.css">
    <link rel="stylesheet" href="css/navigation.css">
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.min.js"></script>

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
                            <li class="menu-each"><a href="#delivery-menu">—　Delivery Menu　—</a></li>
                            <li class="menu-each"><a href="#takeout-menu">—　Takeout Menu　—</a></li>
                            <li class="menu-each"><a href="#collaboration-menu">—　Collaboration Menu　—</a></li>
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

    <!-- Start menu-wrapper -->
    <div id="menu-wrapper">
        <div class="section-title">
            <p>メニュー</p>
            <h2>Delivery & Takeout Menu</h2>
            <div class="title-accent-line"></div>
        </div>
        <div class="container">
                
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
                            <?php for($i = 0; $i < 9; $i++ ): ?>
                                <div class="product-item">
                                    <img class="lazyload" data-src="<?= h($menu_data[$i]["src"])?>" alt="">
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
                        </div>  
                    </div>
                    <div class="delivery-menu-list">
                        <p class="menu-description">厳選したスピリッツ、ブラウンスピリッツをご自宅までお届けします。<br>
                                一味違うハイボールや稀少な食後酒もお楽しみください！</p>
                        
                            <div class="product-list">
                                <div class="delivery-spirits">
                                    <h4 class="menu-category-title">—　Selected High Ball　—</h4>
                                    <div class="delivery-spirits-description">
                                        <img class="lazyload" data-src="img/highball.jpg" alt="">
                                        <div>
                                            <p>自宅で本格的なカクテルが楽しめるハイボールシリーズです。<br>全商品各ウイスキーは小瓶に100mℓずつがセットになってます。ぜひ自宅で一味違うハイボールを作ってお楽しみください。</p>
                                            <p>別売りウイルキンソン炭酸は190mℓ1本100円で別途お付けいたします。</p>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <!-- for文で回せるようにマークアップ変更必要 *後回し-->
                                        <!-- deliverly Selected High Ball Set 3set (10~12) -->
                                        <div class="two-column-item">
                                            <img class="lazyload" data-src="<?= h($menu_data[9]["src"])?>" alt="">
                                            <h5><?= h(f($menu_data[9]["item_name"]))?></h5>
                                            <p><?= h($menu_data[9]["desc"][0])?></p>
                                            <p><?= h($menu_data[9]["desc"][1])?></p>
                                            <div class="spirit-price">
                                                <p>￥<?= h(f($menu_data[9]["price"]))?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[9]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[9]["item_name"])?>" data-price="<?= h($menu_data[9]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[9]["item_name"])?>">＋</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="two-column-item">
                                            <img class="lazyload" data-src="<?= h($menu_data[10]["src"])?>" alt="">
                                            <h5>オールドウイスキーセット</h5>
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
                                            <p style="margin-top: 20px;"><?= h($menu_data[11]["desc"][0])?></p>
                                            <p><?= h($menu_data[11]["desc"][1])?></p>
                                            <div class="spirit-price">
                                                <p>￥<?= h(f($menu_data[11]["price"]))?></p>
                                                <div class="select-btn">
                                                    <span class="minus" data-id="<?= h($menu_data[11]["item_name"])?>">−</span>
                                                    <span class="number" id="<?= h($menu_data[11]["item_name"])?>" data-price="<?= h($menu_data[11]["price"])?>">0</span>
                                                    <span class="pulus" data-id="<?= h($menu_data[11]["item_name"])?>">＋</span>
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
                                    <?php for($i = 12; $i < 45; $i++ ): ?>
                                        <div class="three-column-item">
                                            <img class="lazyload" data-src="<?= h($menu_data[$i]["src"])?>" alt="">
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
                            <?php for($i = 45; $i < 51; $i++ ): ?>
                                <div class="food-item">
                                    <img class="lazyload" data-src="<?= h($menu_data[$i]["src"])?>" alt="">
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
                                    <img class="lazyload" data-src="<?= h($menu_data[51]["src"])?>" alt="">
                                    <h4>木村硝子のコンパクト10～14ozシリーズ</h4>
                                    <p><?= h($menu_data[51]["desc"][0])?><br><?= h($menu_data[51]["desc"][1])?></p>
                                    <div class="spirit-price price-letter-sm">
                                        <p>￥<?= h(f($menu_data[51]["price"]))?><?= h($menu_data[51]["desc"][2])?></p>
                                        <div class="select-btn">
                                            <span class="minus" data-id="<?= h($menu_data[51]["item_name"])?>">−</span>
                                            <span class="number" id="<?= h($menu_data[51]["item_name"])?>" data-price="<?= h($menu_data[51]["price"])?>">0</span>
                                            <span class="pulus" data-id="<?= h($menu_data[51]["item_name"])?>">＋</span>
                                        </div>
                                    </div>
                                    <div class="spirit-price price-letter-sm">
                                        <p>￥<?= h(f($menu_data[52]["price"]))?><?= h($menu_data[52]["desc"])?></p>
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
                                </div>
                                <?php for($i = 54; $i < 56; $i++ ): ?>
                                    <div class="two-column-item">
                                        <img class="lazyload" data-src="<?= h($menu_data[$i]["src"])?>" alt="">
                                        <h4><?= h(f($menu_data[$i]["item_name"]))?></h4>
                                        <p><?= h($menu_data[$i]["desc"][0])?></p>
                                        <div class="spirit-price price-letter-sm">
                                            <p>￥<?= h(f($menu_data[$i]["price"]))?><?= h($menu_data[$i]["desc"][1])?></p>
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
                        <p class="menu-description">量り売りのご注文は各100mlごとで承ります。<br>記載外の商品もございますので、ご希望の場合は別途<a href="https://mixology.co.jp/contact" style="color: #222;text-decoration:underline;">お問合わせフォーム</a>よりご連絡ください。</p>
                        <p class="menu-description" style="font-size:12px;">※記載されている金額は、100mlごとの価格となります。</p>

                        <div class="three-column-list">
                            <h4 class="menu-category-title">—　Whiskey　—</h4>
                            <div class="columns sm-columns">
                                <!-- takeout Whiskey 10set (69~78) -->
                                <?php for($i = 69; $i < 79; $i++ ): ?>
                                    <div class="three-column-item">
                                        <img class="lazyload" data-src="<?= h($menu_data[$i]["src"])?>" alt="">
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
                                        <img class="lazyload" data-src="<?= h($menu_data[$i]["src"])?>" alt="">
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
                                <?php for($i = 91; $i < 94; $i++ ): ?>
                                    <div class="two-column-item">
                                        <div class="food-slide">
                                            <div class="change-btn next-btn">
                                                <div class="slide-arrow">
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                            </div>
                                            <div class="change-btn prev-btn">
                                                <div class="slide-arrow">
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                            </div>
                                            <div class="food-slides">
                                                <?php foreach($menu_data[$i]["src"] as $url): ?>
                                                    <img class="lazyload" data-src="<?= h($url) ?>" alt="">
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="food-details">
                                            <h4><?= h(f($menu_data[$i]["item_name"]))?></h4>
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
                                    </div>
                                <?php endfor; ?>
                                <!-- takeout Food 8set (91~99) -->
                                <?php for($i = 94; $i < 100; $i++ ): ?>
                                    <div class="two-column-item">
                                        <img class="lazyload" data-src="<?= h($menu_data[$i]["src"])?>" alt="">
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

                <p>当サイト限定のコラボレーションメニューです！他では味わえない逸品をぜひお楽しみください！<br>商品はデリバリーとテイクアウトがございますので、お間違いないようご注文ください。</p>
                <div class="collaboration-menu-item" id="collaboration_menu_1">
                    <!-- <p class="menu-description">「アル・ケッチァーノ」オーナー奥田政行シェフとコラボした<span class="tb-text-block">特別の逸品がテイクアウトメニューで登場！ </span><br>ここでしか味わえない逸品を、相性抜群のMixologyカクテルと共にお楽しみください！</p> -->
                    <div class="product-list">
                        <!-- <div class="collaboration-intro">
                            <img src="img/chef_image.jpg" alt="">
                            <div class="collaboration-intro-details">
                                <div class="collaboration-description">
                                    <h5 class="sm-text-center">Profile</h5>
                                    <p class="profile-name">奥田政行 Masayuki Okuda</p>
                                    <div class="collaboration-line"></div>
                                    <p>1969年12月4日生 / 山形県出身 / A型</p>
                                    <p>高校卒業後、東京のイタリアン、フレンチなどで働く。26歳で帰郷し、鶴岡ワシントンホテルに就職、翌年料理長に就任。98年、農家レストラン「穂波街道」で2年間シェフを務め、00年独立。07年隣地にカフェ＆ドルチェの店「イル・ケッチァーノ」を、09年、東京・銀座に「ヤマガタ サンダンデロ」を開店。05年より「食の都庄内」親善大使、一昨年、農林水産省「料理マスターズ」第1回受賞者に選ばれる。</p>
                                </div>
                            </div>
                        </div> -->
                        <h4>—　Masayuki Okuda × Mixology　—</h4>
                        <div class="sm-collabo-title">
                            <p>Masayuki Okuda</p>
                            <p>×</p>
                            <p>Mixology</p>
                        </div>
                        <div class="collabo-food-item">
                            <!-- <div class="collaboration-item-line">
                                <p>Collaboration Menu 1</p>
                                <span></span>
                            </div> -->
                            <div class="collabo-food">
                                <div class="collabo-food-image">
                                    <?php foreach($menu_data[100]["src"] as $url): ?>
                                        <img class="lazyload" data-src="<?= h($url) ?>" alt="">
                                    <?php endforeach; ?>
                                </div>
                                <div class="collabo-food-details">
                                    <p class="category-t">Takeout</p>
                                    <h5><?= h(f($menu_data[100]["item_name"]))?></h5>
                                    <p style="font-size: 14px;"><?= h($menu_data[100]["desc"][0])?><br><br><?= h($menu_data[100]["desc"][1])?><br><?= h($menu_data[100]["desc"][2])?></p>
                                    <div class="collaboration-food-price">
                                        <p>￥<?= h(f($menu_data[100]["price"]))?><span style="font-size:14px;margin-left: 5px;"><?= h($menu_data[100]["desc"][3])?></span></p>
                                        <div class="select-btn">
                                            <span class="minus" data-id="<?= h($menu_data[100]["item_name"])?>">−</span>
                                            <span class="number" id="<?= h($menu_data[100]["item_name"])?>" data-price="<?= h($menu_data[100]["price"])?>">0</span>
                                            <span class="pulus" data-id="<?= h($menu_data[100]["item_name"])?>">＋</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collabo-food-item" style="margin-bottom: 0;">
                            <!-- <div class="collaboration-item-line">
                                <p>Collaboration Menu 2</p>
                                <span></span>
                            </div> -->
                            <div class="collabo-food">
                                <div class="collabo-food-image">
                                    <?php foreach($menu_data[101]["src"] as $url): ?>
                                        <img class="lazyload" data-src="<?= h($url) ?>" alt="">
                                    <?php endforeach; ?>
                                </div>
                                <div class="collabo-food-details">
                                    <p class="category-t">Takeout</p>
                                    <h5><?= h(f($menu_data[101]["item_name"]))?></h5>
                                    <p style="font-size: 14px;"><?= h($menu_data[101]["desc"][0])?></p>
                                    <div class="collaboration-food-price">
                                        <p>￥<?= h(f($menu_data[101]["price"]))?><span style="font-size:14px;margin-left: 5px;"><?= h($menu_data[101]["desc"][1])?></span></p>
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
                </div>

                <div class="collaboration-menu-item" id="collaboration_menu_3">
                    <!-- <p class="menu-description">カカオハンターズの大人気商品カカオニブスナックがペアリングセットで登場！<br>大人気ほうじ茶カクテルのアレンジバージョンとセットでお届けします！</p> -->
                    <div class="product-list">
                        <!-- <div class="collaboration-intro">
                            <img src="img/cacao_hunters.jpg" alt="">
                            <div class="collaboration-intro-details">
                                <div class="collaboration-description">
                                    <h5 class="sm-text-center">Profile</h5>
                                    <p class="profile-name">CACAO HUNTERS</p>
                                    <div class="collaboration-line"></div>
                                    <p>「CACAO HUNTERS」は世界15カ国のカカオ生産国を旅してきたカカオハンター小方真弓と、コーヒーの世界に従事してきたカルロス・ベラスコが、2013年12月にコロンビアで立ち上げました。Tree to Chocolateのパイオニアで、カカオの生産地と消費者をつなぐ活動を何年も前から行っている。特にコロンビアの厳選されたカカオはどれも忘れがたいほど個性的でカカオの美味しさに驚く。</p>
                                </div>
                            </div>
                        </div> -->
                        
                        <div class="collabo-food-item">
                            <!-- <div class="collaboration-item-line">
                                <p>Collaboration Menu 1</p>
                                <span></span>
                            </div> -->
                            <h4>—　CACAO HUNTERS × Mixology　—</h4>
                            <div class="sm-collabo-title">
                                <p>CACAO HUNTERS</p>
                                <p>×</p>
                                <p>Mixology</p>
                            </div>
                            <div class="collabo-food">
                                <div class="collabo-food-image">
                                    <?php foreach($menu_data[103]["src"] as $url): ?>
                                        <img class="lazyload" data-src="<?= h($url) ?>" alt="">
                                    <?php endforeach; ?>
                                </div>
                                <div class="collabo-food-details">
                                    <p class="category-d">Delivery</p>
                                    <h5><?= h(f($menu_data[103]["item_name"]))?></h5>
                                    <p style="font-size: 14px;"><?= h($menu_data[103]["desc"][0])?><br><br><?= h($menu_data[103]["desc"][1])?><br><br><?= h($menu_data[103]["desc"][2])?></p>
                                    <div class="collaboration-food-price">
                                        <p>￥<?= h(f($menu_data[103]["price"]))?><span style="font-size:14px;margin-left: 5px;"><?= h($menu_data[103]["desc"][3])?></span></p>
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
    
    <!-- Start footer -->
    <footer>
        <div class="container">
            <p>©Copyright2020 Home Mixology .All Rights Reserved.</p>
        </div>
    </footer>
    <!-- End footer -->

    <!-- jquery script -->
    <script src="js/jQuery-3.4.1.min.js" defer></script>
    <script src="js/main_menu.js" defer></script>
    <script src="js/menu.js" defer></script>
    <script src="js/main.js"></script>

    <script>
       lazyload();
    </script>

</body>
</html>