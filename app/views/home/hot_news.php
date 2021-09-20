<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Hot News</h2><br>
  <div class="row ">
  	<?php if(count($data['newsArray'])>0): 
  		foreach($data['newsArray'] as $news):
  	?>
    <div class="col-md-6">
      <div class="hot-news-wrapper thumbnail">
        <img src="<?php echo $this->base_url; ?>uploads/<?php echo $news['news_image'] ?>" class="img-responsive" alt="Paris" width="400" height="200">
        <div class="row">
          <div class="col-md-6">
              <h3 class="man"><strong><?php echo ucwords($news['news_name']); ?></strong></h3>
          </div>
          <div class="col-md-6 ">
              <h4 class="man">Place: <?php echo ucfirst($news['news_location']); ?></h4>
          </div>
        </div>
          <br><br>
        <p class="text-left"><?php echo $news['news_description']; ?></p>
      </div>
    </div>
	<?php 
	endforeach;
	endif; ?>

  </div><br>
</div>