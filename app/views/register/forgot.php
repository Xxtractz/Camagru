
<?php $this->start('body'); ?>

<div class="jumbotron bg-white">
<h3 class= "text-center">Reset Password</h3><br>
    <p class= "text-center">Please enter your Emial-Address</p>
    <div class="text-center">
            <form class="form" action="<?=PROOT?>register/forgot" method="post">
                <div class="form-group col-md-5 mx-auto">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" >
                </div>
                <div class="form-group">
                    <input type="submit" value="Send New Password" class="btn btn-outline-secondary">
                </div>
            </form>
            <br>
    </div>

</div>

<?php $this->end(); ?>