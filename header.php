<!DOCTYPE html>

<html lang='en-US'>

<head>
  <title>South Dakota</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <meta name='description' content='Travel site for South Dakota'>
  <meta name='keywords' content='Mt Rushmore, South Dakota, Travel, Badlands, Crazy Horse'>
  <meta name='author' content='Cassidy Harless, Jack Searl'>
  <?php echo Asset::css('bootstrap.css');?>
  <?php echo Asset::css('southdakota.css');?>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<div class="header">
  <img src='http://cs.colostate.edu/~char8330/ct310/assets/img/logo.png' alt="logo" />
</div>
</head>

<body>
<!-- TOP NAV BAR / LINKS -->
<header>
    <div class = 'top-navbar'>
       <a href="<?=Uri::create('index.php/southdakota/index/'); ?>">HOME</a>
       <a href="<?=Uri::create('index.php/southdakota/about/'); ?>">ABOUT US</a>
       <a href="<?=Uri::create('index.php/southdakota/mt_rushmore/'); ?>">MT RUSHMORE</a>
       <a href="<?=Uri::create('index.php/southdakota/badlands/'); ?>">BADLANDS</a>
       <a href="<?=Uri::create('index.php/southdakota/crazy_horse/'); ?>">CRAZY HORSE</a>
       <a href="<?=Uri::create('index.php/southdakota/login/'); ?>">LOGIN</a>
    </div>
</header>
<!-- end of included header and navbar-->
