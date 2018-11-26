<?php $this->start('head')?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>

<div class="jumbotron bg-reg">
    <div class="form-signin bg-reg">
     <h3>Please Sign-in Below</h3><br>
     <?=$this->displayErrors ?>
            <form class="form" action="<?=PROOT?>register/login" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="remember_me">Remember Me 
                        <input type="checkbox" id="remember_me" name="remember_me" value="on"> 
                    </label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-outline-secondary">
                </div>
                <div class="text-right">
                    <a href="<?=PROOT?>register/register" class="text-primary" >Register</a>
                </div>
            </form>
            <br>
    </div>

</div>

<?php $this->end(); ?>