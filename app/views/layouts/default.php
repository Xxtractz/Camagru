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
  <nav class="navbar fixed-top navbar-expand-md navbar-light nav-bg border-bottom border-dark" >
    <a class="navbar-brand " href="" :hover>
    <img class ="logo d-inline-block align-top" src="<?=PROOT?>img/logo.png" >
    CAMAGRU
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Account </a>
            </li>
            <li class="nav-item">
            <a href="#" type="button" class="btn btn-outline-secondary">Sign in</a>
            <a href="#" type="button" class="btn btn-outline-secondary">Sign out</a>
            <a href="#" type="button" class="btn btn-outline-secondary">Sign up</a>
            </li>

          </ul>
            
        </div>
  </nav>
     <!-- <div class = "navbar -blue">
        
        <a href="#" class="right fas fa-sign-in-alt "> login</a>
        <a href="#" class="right fas fa-user-plus" > Sign_up</a>
        <a href="#" class="right fas fa-cogs"> Settings</a>
        <a href="#" class="right fas fa-sign-out-alt "> Logout</a>
        <a href="#" class="right fas fa-user-circle"> Profile</a>
        <a href="#" class="right fas fa-home"> Home</a>
    </div> -->
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