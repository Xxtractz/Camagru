<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- the above "meta" tags always comes first in html, the rest follow -->

    <title><?= $this->siteTitle(); ?></title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=PROOT?>/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=PROOT?>/css/layout.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" 
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="main.js"></script>

    <?= $this->content('head'); ?>
</head>
<body class="body">
    <div class = "navbar">
        <a class="fas fa-camera-retro fa-2x"></a>
        <a href="#" class="right fas fa-sign-in-alt "> login</a>
        <a href="#" class="right fas fa-user-plus" > Sign_up</a>
        <a href="#" class="right fas fa-cogs"> Settings</a>
        <a href="#" class="right fas fa-sign-out-alt "> Logout</a>
        <a href="#" class="right fas fa-user-circle"> Profile</a>
        <a href="#" class="right fas fa-home"> Home</a>
    </div>

    <div class= "content">
        <?= $this->content('body'); ?>
    </div>

    <div class="footer">
    <p>All Rights Reserved. &copy; Camagru | Wethinkcode_</p>
    </div>
</body>
</html>