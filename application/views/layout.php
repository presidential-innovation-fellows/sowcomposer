<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/i/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>SOW Composer</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">

  <?= HTML::style('css/bootstrap.css') ?>

  <?= Basset::show('website.css') ?>

  <?= Section::yield('additional-styles') ?>

  <?= HTML::script('js/modernizr-2.5.3.min.js') ?>

</head>
<body>

  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand" href="/">SOW Composer</a>
        <div class="nav-right-text pull-right">
          built by <a href="http://twitter.com/ProjectRFPEZ">@ProjectRFPEZ</a>
        </div>
      </div>
    </div>
  </div>

  <?= Section::yield('sidebar') ?>

  <div class="container">

  <?php if (Session::has('alert-success')): ?>
    <div class="alert alert-success"><?= Session::get('alert-success') ?></div>
  <?php endif; ?>

  <?php if (Session::has('alert-error')): ?>
    <div class="alert alert-error"><?= Session::get('alert-error') ?></div>
  <?php endif; ?>


    <?= Section::yield('content') ?>
  </div>

  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
  <script>window.jQuery || document.write('<script src="/js/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="/js/jquery-ui-1.8.22.custom.min.js"></script>

  <?= Section::yield('additional-scripts') ?>

  <?= Basset::show('website.js') ?>

  <?= HTML::script('js/bootstrap.js') ?>

  <script>
    var _gaq=[['_setAccount','UA-34873942-1'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>