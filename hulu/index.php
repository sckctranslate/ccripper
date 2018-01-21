<!DOCTYPE html>
<html class="mdc-typography">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#008CFF">
    <title>Hulu | CC 字幕抓取工具 | Translated by @SerCom_KC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-components-web/dist/material-components-web.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosansscsliced.css">
    <script src="https://fonts.gstatic.com/ea/timing/v1/mlfont.js" async></script>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-66625302-2"></script>
    <script>window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments)
      };
      gtag('js', new Date());

      gtag('config', 'UA-66625302-2');</script>
    <link rel="stylesheet" href="/style.css"></head>

  <body>
    <div class="toolbarfix">页面显示不正常？请考虑更新您的浏览器或关闭浏览器的自动排版功能。</div>
    <!-- If user disabled JavaScript -->
    <noscript>
      <aside class="mdc-dialog mdc-dialog--open" role="alertdialog">
        <div class="mdc-dialog__surface">
          <header class="mdc-dialog__header">
            <h2 class="mdc-dialog__header__title">您似乎禁用了 JavaScript</h2></header>
          <section class="mdc-dialog__body">此页面需要启用 JavaScript 方可正常运作。请在您的浏览器设置中启用 JavaScript 并重新加载页面。</section>
          <footer class="mdc-dialog__footer">
            <a href="javascript: window.location.reload(true)">
              <button type="button" class="mdc-button mdc-dialog__footer__button mdc-dialog__footer__button--accept">重新加载页面</button></a>
          </footer>
        </div>
        <div class="mdc-dialog__backdrop"></div>
      </aside>
    </noscript>
    <header class="mdc-toolbar mdc-toolbar--fixed">
      <div class="mdc-toolbar__row">
        <section class="mdc-toolbar__section mdc-toolbar__section--align-start">
          <a href="#" class="menu material-icons mdc-toolbar__menu-icon">menu</a>
          <span class="mdc-toolbar__title">Hulu</span></section>
      </div>
    </header>
    <!-- Navigation -->
    <aside class="mdc-drawer--temporary mdc-typography">
      <nav class="mdc-drawer__drawer">
        <div class="mdc-drawer__toolbar-spacer">
          <div class="fulltitle">CC 字幕抓取工具</div>
          <div class="shorttitle">CC 字幕抓取工具</div></div>
        <nav class="mdc-drawer__content mdc-list">
          <a class="mdc-list-item" href="/">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>首页</a>
          <a class="mdc-list-item" href="https://www.sckctranslate.download">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">arrow_back</i>返回资源站</a>
          <hr class="mdc-list-divider">
          <a class="mdc-list-item" href="/googleplay/">Google Play</a>
          <a class="mdc-list-item mdc-list-item--selected" href="/hulu/">Hulu</a></nav>
        <footer class="mdc-drawer__footer">
          <div class="mdc-typography--subheading1" style="padding: 16px 16px;">© Translated by @SerCom_KC
            <br>有任何问题，请<a href="https://weibo.com/sercomkc">联系我们</a>。</div></footer>
      </nav>
    </aside>
    <main class="scrollbar">
      <form method="GET">
        <div class="mdc-text-field mdc-text-field--upgraded mdc-text-field--primary" data-mdc-auto-init="MDCTextField">
          <input type="text" id="link" name="link" class="mdc-text-field__input" required>
          <label class="mdc-text-field__label" for="link">link</label>
          <div class="mdc-text-field__bottom-line"></div></div>
        <br>
        <div class="mdc-text-field mdc-text-field--upgraded mdc-text-field--primary" data-mdc-auto-init="MDCTextField">
          <input type="text" id="lang" name="lang" class="mdc-text-field__input" value="en" required>
          <label class="mdc-text-field__label mdc-text-field__label--float-above" for="lang">lang</label>
          <div class="mdc-text-field__bottom-line"></div></div>
        <br>
        <br>
        <button action="Submit" class="mdc-button mdc-button--raised">下载 CC 字幕</button></form>
      <br>
      <h2 class="mdc-typography--display1">请按以下提示操作。</h2>
      <p class="mdc-typography--body1">请直接将<b>视频页</b>的链接粘贴至上方文本框。<br>
      例如：https://www.hulu.com/watch/1006886</p>
      <p class="mdc-typography--body1">完成后，请点击“下载 CC 字幕”。我们会为您将字幕转为 SRT 格式，并自动开始下载。</p>
      <footer>
        <div class="mdc-typography--subheading1">Open source at <a href="https://github.com/sckctranslate/ccripper">GitHub</a>. Special thanks to
          <a href="https://github.com/pbs/pycaption">https://github.com/pbs/pycaption</a>.</div>
        <br></footer>
    </main>
    <div class="mdc-snackbar" aria-live="assertive" aria-atomic="true" aria-hidden="true" id="mdc-js-snackbar">
      <div class="mdc-snackbar__text"></div>
      <div class="mdc-snackbar__action-wrapper">
        <button type="button" class="mdc-button mdc-snackbar__action-button"></button>
      </div>
    </div>
    <!-- MDC-Web initialization script-->
    <script src="https://cdn.jsdelivr.net/npm/material-components-web/dist/material-components-web.min.js"></script>
    <script>window.mdc.autoInit();</script>
    <!-- Navigation drawer script-->
    <script>let drawer = new mdc.drawer.MDCTemporaryDrawer(document.querySelector('.mdc-drawer--temporary'));
      document.querySelector('.menu').addEventListener('click', () => drawer.open = true);</script>
    <?php

$link = ""; if (isset($_GET['link'])) $link = $_GET["link"];
$lang = "en"; if (isset($_GET['lang'])) $lang = $_GET["lang"];

if (isset($_GET['link']) &&  isset($_GET['lang']))
{
        exec("python hulu.py '$link' $lang", $output);
        $content_id = $output[0];
        $result = $output[1];

        switch($result)
        {
                case "SUCCESS":
                        echo '<script>setTimeout(function() {window.location.href = "'. $content_id .'.'. $lang .'.srt";}, 500);</script>';
                        echo '<script>var snackbar = new mdc.snackbar.MDCSnackbar(document.getElementById(\'mdc-js-snackbar\'));snackbar.dismissesOnAction = true;var data = {message: \'下载已开始\',actionText: \'关闭提示\', multiline: false, actionOnBottom: false, timeout: 5000};data.actionHandler = function() {console.log(\'What are you expecting anyway, huh?\')};snackbar.show(data);</script>';
                        exit;
                case "CACHE":
                        echo '<script>setTimeout(function() {window.location.href = "'. $content_id .'.'. $lang .'.srt";}, 500);</script>';
                        $snackBarMsg = '下载已开始。请注意，您下载的是服务器已经缓存的版本。如果此版本不正确，请联系我们清理缓存。';
                        break;
                case "CAPTION_NOT_FOUND":
                        $snackBarMsg = '您所请求的视频中不包含对应语言的 CC 字幕。这可能是因为视频本身不含任何 CC 字幕、字幕类型为硬字幕（直接嵌入视频画面中的字幕），或者您输入了错误的语言代码。请检查您的输入是否有误。';
                        break;
                default:
                        $snackBarMsg = 'CC 抓取失败。请检查您的输入是否有误，或者稍后再试。如果问题继续出现，请联系我们。';
                        break;
        }
        echo '<script>var snackbar = new mdc.snackbar.MDCSnackbar(document.getElementById(\'mdc-js-snackbar\'));snackbar.dismissesOnAction = true;var data = {message: \''. $snackBarMsg .'\',actionText: \'关闭提示\', multiline: true, actionOnBottom: true, timeout: 5000};data.actionHandler = function() {console.log(\'What are you expecting anyway, huh?\')};snackbar.show(data);</script>';
} ?>
  </body>

</html>

