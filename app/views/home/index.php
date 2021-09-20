  <style>

  </style>
</head>
<body >

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Complaint System</h2><br>
      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
      <br>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>


<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Hot News</h2><br>
  
  	<?php if(isset($data['newsArray'])  && count($data['newsArray'])>0): 
    ?>
    <div class="row text-center slideanim">
    <?php
  		foreach($data['newsArray'] as $news):
  	?>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="<?php echo $this->base_url; ?>uploads/<?php echo $news['news_image'] ?>" alt="Paris" width="400" height="300">
        <p><strong><?php echo $news['news_name']; ?></strong></p>
        <p><?php echo $news['news_description']; ?></p>
      </div>
    </div>
	<?php 
	endforeach;
	endif; ?>

  </div><br>
  <div class="row">
  	<div class="text-center">
  		<a href="<?php echo $this->base_url; ?>home/hot_news" class="btn btn-primary">See All</a>
  	</div>
  </div>
</div>

 
<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>Most Wanted Person</h2>
  </div>
  <?php  if(isset($data['mostwantedArray'])  && count($data['mostwantedArray'])>0):  ?>
  <div class="row slideanim">
  	<?php
  		foreach($data['mostwantedArray'] as $wanted):
  	?>
    <div class="col-sm-3 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1><?php echo $wanted['wanted_person_name']; ?></h1>
        </div>
        <div class="panel-body">
        	<img src="<?php echo $this->base_url; ?>uploads/<?php echo $wanted['wanted_person_image'] ?>" alt="Paris" width="200" height="150">
        	<br><br>
          <p><?php echo substr($wanted['wanted_person_description'],0,100) ?></p>
        </div>
      </div>      
    </div>
    <?php 
endforeach; ?>
  </div>
  <div class="text-center">
    <a href="<?php echo $this->base_url; ?>home/most_wanted" class="btn btn-primary">See All</a>
  </div>
<?php endif;
    ?>     
       
  
</div>

<!-- missing person -->

<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">Missing Person</h3>
    <br>

    <?php if( isset($data['missingArray']) && count($data['missingArray'])>0):  ?>
    <div class="row text-center">
    	<?php
  		foreach($data['missingArray'] as $missing):
		  	?>
		  	<div class="col-sm-3">
		        <div class="thumbnail missing-thumbnail">
		          <img src="<?php echo $this->base_url; ?>uploads/<?php echo $missing['missing_person_image'] ?>" alt="Paris" width="150" height="200">
		          <h1><?php echo $missing['missing_person_name']; ?></h1>
		          <p>Missing From : <?php echo date('d M Y',strtotime($missing['missing_person_date'])); ?></p>
				</div>
		      </div>
		    <?php 
		endforeach;
    ?>

    </div>
    <div class="row text-center">
      <a href="<?php echo $this->base_url; ?>home/missing_person" class="btn btn-primary">See All</a>
    </div>
    <?php
		endif;
		    ?>
     
  	<br>
  </div>
  
</div>

