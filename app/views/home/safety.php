<div id="services" class="container-fluid ">
  <div class="row">
    <h2 class="text-center">Safety Tips</h2>
    <div class="col-md-10">
      <?php if(isset($data['safetytipArray'])&& count($data['safetytipArray'])>0): 
        foreach ($data['safetytipArray'] as $tip) :
      ?>
        <div class="well"><?php echo ucfirst($tip['safety_tip_tagline']); ?></div>
      <?php 
      endforeach;
      endif; ?>
    </div>
  </div>
</div>