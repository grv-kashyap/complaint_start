<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>Most Wanted Person</h2>
  </div>
  <div class="row ">
  	<?php if(count($data['mostwantedArray'])>0): 
  		foreach($data['mostwantedArray'] as $wanted):
  	?>
    <div class="col-sm-3 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1 class="mas"><?php echo $wanted['wanted_person_name']; ?></h1>
        </div>
        <div class="panel-body">
        	<img src="<?php echo $this->base_url; ?>uploads/<?php echo $wanted['wanted_person_image'] ?>" alt="Paris" width="200" height="150">
        	<br><br>
          <p><?php echo substr($wanted['wanted_person_description'],0,100) ?></p>
        </div>
      </div>      
    </div>
    <?php 
endforeach;
endif;
    ?>     
       
  </div>
  
</div>