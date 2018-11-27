
<?php $this->start('body'); ?>

<div class="jumbotron bg-white">
<h3 class= "text-center">Please Verify your Account</h3><br>
    <p class= "text-center">Click the link below to verify</p>
    <div class="text-center">
            <form class="form" action="<?=PROOT?>register/confirm" method="post">
                <div class="form-group">
                    <input type="submit" value="Verify Registration" class="btn btn-outline-secondary">
                </div>
            </form>
            <br>
    </div>

</div>

<?php $this->end(); ?>