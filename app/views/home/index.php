<?php $this->start('head')?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="container">
<div class="row">
  <?php 
      $page = new Pagination();
      $query = "SELECT * FROM images ORDER BY `date` DESC";       
      $records_per_page = 5;
      $newquery = $page->paging($query, $records_per_page);
      $page->dataview($newquery);
      ?>
      </div>
      <br>
      <div class="row">
      
      <?php
      $page->paginglink($query,$records_per_page);		
    ?>
    <br><br>
</div>
</div>

<?php $this->end(); ?>