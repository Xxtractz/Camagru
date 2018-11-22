<?php
$menu = Router::getMenu('menu_acl');
$currentPage = currentPage();
?>
<nav class="navbar fixed-top navbar-expand-md navbar-light nav-bg border-bottom border-dark" id="main_menu">
    <a class="navbar-brand " href="" :hover>
    <img class ="logo d-inline-block align-top" src="<?=PROOT?>img/logo.png" >
    CAMAGRU
    </a>
    <label for="toggle" class="hide"> &#9776</label>
        <input type="checkbox" id="toggle">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
              <?php foreach ($menu as $key => $value):
                $active = '';?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$value?>"><?=$key?></a>
                </li>
            <?php endforeach;?>
            <?php if(currentUser()):?>
            <li class="nav-item">
              <a class="nav-link">Hi <?= currentUser()->fname?> </a>
            </li>
            <?php endif; ?>
          </ul>
            
        </div>
  </nav>