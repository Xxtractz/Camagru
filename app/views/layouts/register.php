<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- the above "meta" tags always comes first in html, the rest follow -->

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=PROOT?>img/logo.png" type="image/x-icon">
  
    <title><?= $this->siteTitle(); ?></title>
    <!-- Below are the CSS Links (Bootstrap css) -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?=PROOT?>css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=PROOT?>css/bootstrap-reboot.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=PROOT?>css/bootstrap-grid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=PROOT?>css/bootstrap.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" 
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="main.js"></script>

    <?= $this->content('head'); ?>
</head>
<body>
  <main role="main">
    <div class="jumbotron">
      
    </div>
    <?= $this->content('body'); ?>
  </main>
        
  <div class="container-fluid bg-dark">
  <div class="row">
    <div class="col">
      <code>All Rights Reserved. &copy; Camagru | Wethinkcode_</code>
    </div>
    <div class="col text-right">
    <code>mbaloyi_</code>
    </div>
  </div>
</div>
</body>
</html>