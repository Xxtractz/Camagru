<?php $this->start('body'); ?>

<div class="jumbotron bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <video src="" id="video">Webcam Not Available</video>
                <br>
                <button id="photo-button" class="btn btn-outline-secondary"> Snap</button>
                <br>
            </div>
             <div class="col">
                <canvas id="canvas"></canvas><br>
                <div class="photos"></div>
                <button id="save-button" class="btn btn-outline-secondary"> Save</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                
            </div>
            <div class="col">
                
            </div> 
        </div>
        
        
    </div>
</div>

<?php $this->end(); ?>

<?php $this->start('source');?>
 <script src="<?=PROOT?>js/photo.js"></script>
<?php $this->end();?>