<?php $this->start('head')?>
<link rel="stylesheet" type="text/css" media="screen" href="<?=PROOT?>css/img.css" />
<?php $this->end()?>

<?php $this->start('body'); ?>
<div id="wrapper" align="center">
<div id="photo" class="booth">
    <video autoplay="true" id ="videoElement" width="400" height="300"></video>
    <a href="#" id ="capture" class="btn btn-outline-secondary">Snap</a>
    <canvas id="photoElement" style="display: none" width="400" height="300"></canvas>
    <canvas id="capturedElement" width="400" height ="300"> </canvas>
</div>
	<div id="stickers" style="background-color:lightgrey" height="100">
	<br> <img href="#" id="stick1" src= "<?=PROOT?>img/sticker_1.png" width="150" height="150">
    <img href="#" id="stick2" src="<?=PROOT?>img/sticker_2.png"width="150" height="150">
    <img href="#" id="stick3" src= "<?=PROOT?>img/sticker_3.png" width="150" height="150">
	</div><br>
   
</div> 
<div align="center">
        <input class= "upload btn btn-outline-secondary" type="file" id="img">
        <button id="btn" class="btn btn-outline-secondary">Save/Upload</button>
</div>
    <script>
    
    </script>
<?php $this->end(); ?>

<?php $this->start('source');?>
 <script src="<?=PROOT?>js/photo.js"></script>
<?php $this->end();?>