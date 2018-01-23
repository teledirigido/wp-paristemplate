<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Miguel Garrido">
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXX-X"></script> -->
    <?php wp_head(); ?>
  </head>
  <body>
    <script>
      if (window.location.host==="domain.com" || window.location.host==="www.domain.com") {
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-XXXXXXX-X');
      }
    </script>

    <!--[if lte IE 9]>
      <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->