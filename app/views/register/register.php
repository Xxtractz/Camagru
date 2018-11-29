
<?php $this->start('body'); ?>
<div class="jumbotron bg-white">
    <div class="container-fluid">
    <h3 class="text-center">Register Here</h3>
        <div class="col">
                <?=$this->displayErrors ?>
                <form class="form" action="<?=PROOT?>register/register" method="post">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" value="<?=$this->post['fname']?>" >
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" value="<?=$this->post['lname']?>" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?=$this->post['email']?>" >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="username">Choose a Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?=$this->post['username']?>" >
                        </div>
                        <div class="form-group">
                            <label for="password">Choose a Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="<?=$this->post['password']?>" >
                        </div>
                        <div class="form-group">
                            <label for="confirm">Confirm Password</label>
                            <input type="password" name="confirm" id="confirm" class="form-control" value="<?=$this->post['confirm']?>" >
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <input type="submit" value="Register" class="btn btn-outline-secondary">
                </div>
            </div>
                <div class="text-right">
                    <a href="<?=PROOT?>register/login" class="text-primary" >Already Have an Account</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->end(); ?>