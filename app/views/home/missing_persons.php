<div id="tour" class="">
  <div class="container">
    <h3 class="text-center">Missing Persons</h3>
    <br>

    
    <div class="row ">
    	<?php if(count($data['missingArray'])>0): 
  		foreach($data['missingArray'] as $missing):
		  	?>
		  	
		  	<div class="col-sm-6">
		  		<div class="missing-person-wrapper">
		  		<div class="row">
		  			<div class="col-md-6">
		  				<img src="<?php echo $this->base_url; ?>uploads/<?php echo $missing['missing_person_image'] ?>" alt="Paris" width="150" height="200">
		  			</div>
					<div class="col-md-6">
						<table class="table">
							<tr>
								<td>Name: </td>
								<td><?php echo $missing['missing_person_name']; ?></td>
							</tr>
							<tr>
								<td>Age: </td>
								<td><?php echo $missing['missing_person_age']; ?></td>
							</tr>
							<tr>
								<td>Gender: </td>
								<td><?php echo ($missing['missing_person_sex']=='1')?'Male':'Female'; ?></td>
							</tr>
							<tr>
								<td>Missing From: </td>
								<td><?php echo date('d M Y',strtotime($missing['missing_person_date'])); ?></td>
							</tr>
							<tr>
								<td>Fir No: </td>
								<td><?php echo $missing['missing_person_fir_no']; ?></td>
							</tr>
						</table>
		  			</div>		  			
		  		</div>
		       	<div class="row">
		       		<div class="col-md-12">
		       		<p>Address: <?php echo $missing['missing_person_address']; ?></p>
		       		<p>Detail: <?php echo $missing['missing_person_description']; ?></p>
		       	</div>
		       </div>
		      </div>
	    	</div>
		    <?php 
		endforeach;
		endif;
		    ?>
     
    </div>
  </div>
  
</div>

