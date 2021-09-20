<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Safety Tip</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Edit safety
            </div>
            <div class="panel-body">
            	<!-- <div class="row"> -->
                <form class="form" action="<?php echo $this->base_url.'admin/edit_safety_tip/'.$data['safetytipArray']['safety_tip_id']; ?>" id="edit-safety-form" method="post" >
                	<div class="form-group">
                		<label>Safety Tip</label>
                    <textarea class="form-control" name="safety_tip_tagline" cols="4" rows="4" placeholder="Enter Safety tip"><?php echo $data['safetytipArray']['safety_tip_tagline'];?></textarea>
                		
                	</div>
                	<div class="text-right">
                		<input type="submit" name="edit_safety" class="btn btn-primary" value="Update">
                	</div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
<script>
  $("#edit-safety-form").validate({
    errorElement: "span", ignore: null, errorClass: 'help-block text-right',
    rules: {
      safety_tip_tagline: {
        required: true
      }
    },
    messages:{
      
    },
    highlight: function (element) {
        $(element).closest('.form-group').addClass('has-error');
    }, unhighlight: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    success: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
        $(element).closest('.form-group').children('span.help-block').remove();
    },
    errorPlacement: function (error, element) {
        error.appendTo(element.closest('.form-group'));
    },
   submitHandler: function(form) {
    	form.submit();
   }
  });
</script>
