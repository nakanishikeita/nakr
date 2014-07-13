<?php
function is_mobile(){
    $useragents = array(
        'iPhone', // iPhone
        'iPod', // iPod touch
        'Android', // 1.5+ Android
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate' // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=320, initial-scale=1, maximum-scale=1">
  <title>ハンドルネーム・ジェネレータ - nakr（ネイカー）</title>
  <link rel="shortcut icon" href="./img/favicon.png">
  <link rel="stylesheet" href="./css/default.css">
  <link rel="stylesheet" href="./css/style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <script src="./js/ui.js"></script>
  <script src="./js/nakr.js"></script>
  <script src="./js/ga.js"></script>
</head>
<body>
  <header class="banner" role="banner">
    <div class="line"></div>
    <div class="inner">
      <h1>
        <a href="/">
          <img src="./img/nakr7.png" alt="nakr">
        </a>
      </h1>
      <nav class="nav group">
        <ul>
          <li><a href="und_const.html">このサイトについて</a></li>
          <li><a href="und_const.html">お問い合わせ</a></li>
        </ul>
      </nav>
    </div>
  </header> 
  <div class="main" role="main">
    <div class="inner">
      <section class="output group">
        <ul></ul>
      </section>
      <section class="ui">
        <ul class="selector">
          <li>
            <label for="hiragana">ひらがな</label>
            <input id="hiragana" type="radio" name="type" value="0" checked="checked">
          </li>
          <li>
            <label for="katakana">カタカナ</label>
            <input id="katakana" type="radio" name="type" value="1">
          </li>
          <li>
            <label for="alphabet">Alphabet</label>
            <input id="alphabet" type="radio" name="type" value="2">
          </li>
        </ul>
        <p>
          <input type="text" name="word" value="？？すけ" placeholder="例: ??すけ or ???" class="js-input-area">
          <button type="button" class="gen-button js-gen-button">作成する</button>
        </p>
      </section>
      <?php if (is_mobile()): ?>
            <div class="ad-234">
              <script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- nakr_smartphone -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:234px;height:60px"
                     data-ad-client="ca-pub-0961722758256880"
                     data-ad-slot="3715741330"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        <?php else: ?>
            <div class="ad-468">
                <script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- nakr_top -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:468px;height:60px"
                     data-ad-client="ca-pub-0961722758256880"
                     data-ad-slot="3943563147"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        <?php endif; ?>
        <ul class="social-buttons" class="group">
            <li class="twitter">
              <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.nakr.net/" data-text="好きな言葉を入れられる、ハンドルネーム・ジェネレーター" data-lang="ja">ツイート</a>
            </li>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </ul>
    </div>
  </div>
  <footer class="footer" role="contentinfo">
    <div class="inner group">
      <nav>
        <ul>
          <li><a href="und_const.html">このサイトについて</a></li>
          <li><a href="und_const.html">お問い合わせ</a></li>
        </ul>
      </nav>
      <small>&copy; 2012-2014 nakr. All rights reserved.</small>
    </div>
  </footer>
</body>
</html>