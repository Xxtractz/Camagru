<?php
class Pagination extends Model {

    public function __construct($user=''){
        $table = 'images';
        parent::__construct($table);
    }
    public function dataviewhome($query){
    	$this->_db->query($query);
        $self = $_SERVER['PHP_SELF'];

        if($this->_db->count() > 0){
			$arr = $this->_db->results();
			foreach ($arr as $key){
			?><div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="<?=PROOT?><?=$key->image?>">
				<?php if(currentUser()):?>
                <div class="card-body">
				<?php foreach ($menu as $key => $value):?>
               		 <p class="nav-item">
                    	<a class="nav-link" href="<?=$value?>"><?=$key?></a>
                	</p>
            		<?php endforeach;?>
                  <form method="POST" class="form-group">
				  	<textarea class="form-control" name="comment" id="" cols="30" rows="1" maxlength="50"></textarea>
					  <input type="hidden" name="image_id" value="<?=$key->id?>">
					  <input type="hidden" name="name" value="<?=currentUser()->fname?>">
					<input class="btn btn-sm btn-outline-secondary" type="submit" value="Comment">
				  </form>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
					  <a href="<?=$self?>?like=<?=$key->id?>" class="btn btn-sm btn-outline-secondary">like</a><br>
                      <button type="button" class="btn btn-sm btn-outline-secondary"><?=$key->image_like?></button>
                    </div>
                    <small class="text-muted"><?=$key->date?></small>
                  </div>
				  <?php endif; ?>
                </div>
              </div>
            </div><?php
				
			}
			
        }else{
            echo '<h2>Please Load Images</h2>'; 
        }                   
	}
	
	public function dataview($query){
		$this->_db->query($query);
		$self = $_SERVER['PHP_SELF'];
		$i = 0;

        if($this->_db->count() > 0){
			$arr = $this->_db->results();
				foreach ($arr as $key){
					if(currentUser()->id === intval($key->user_id)){
						?><div class="col">
						<img class="" src="<?=PROOT?><?=$key->image?>">
						<a href="<?=$self?>/?delete=<?=$key->id?>" class="btn btn-outline-secondary">Delete</a><br>
						</div>
					<?php
					$i++;
					}

				}
				if ($i === 0){
					echo '<h2 style="color:red">Where the Images at!!!!!!!!!!!!!!!!!!!!!!!!!!!!!</h2>';
				}	
		}
		else{
            echo '<h2>OOOH NO!!! <br>No Images<br>Please Load Images</h2>'; 
        }                   
    }

    public function paging($query, $images_per_page){
        $start = 0;
        if (isset($_GET['page_no']))
        {
            $start = ($_GET['page_no'] - 1) * $images_per_page;
        }
        $query2 = $query." LIMIT $start,$images_per_page";
        return $query2;
    }

    public function paginglink($query,$images_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		$total_no_of_images = $this->_db->count();
		
		if($total_no_of_images > 0){
			?><tr><td colspan="3"><?php
			$total_no_of_pages = ceil($total_no_of_images/$images_per_page);
			$current_page = 1;
			if(isset($_GET["page_no"]))
			{
				$current_page = $_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<a href='".$self."?page_no=1'>First</a>&nbsp;&nbsp;";
				echo "<a href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i===$current_page)
				{
					echo "<strong><a href='".$self."?page_no=".$i."' style='color:red;text-decoration:none'>".$i."</a></strong>&nbsp;&nbsp;";
				}
				else
				{
					echo "<a href='".$self."?page_no=".$i."'>".$i."</a>&nbsp;&nbsp;";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next = $current_page+1;
				echo "<a href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;";
				echo "<a href='".$self."?page_no=".$total_no_of_pages."'>Last</a>&nbsp;&nbsp;";
			}
			?></td></tr><?php
        }
    }
}