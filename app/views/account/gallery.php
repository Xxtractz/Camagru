<?php $this->start('body'); ?>

<div class="jumbotron bg-white">
<div class="container">
  <?php 
      $page = new Pagination();
      $query = "SELECT * FROM images ORDER BY `date` DESC";       
      $records_per_page = 6;
      $newquery = $page->paging($query, $records_per_page);
      $page->dataview($newquery);
      ?>
      </div>
      <br>
      
      <?php
      $page->paginglink($query,$records_per_page);		
    ?>
    <br><br>
</div>
</div>

<?php $this->end(); ?>