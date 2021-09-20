<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Missing person details
            </div>
            <div class="panel-body">
            	<!-- <div class="row"> -->
                <form class="form" action="<?php echo $this->base_url.'home/add_missing_report'; ?>" id="add-missing-form" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                		<label>Name</label>
                		<input type="text" class="form-control required" name="missing_person_name" placeholder="Enter name">
                	</div>
                  <div class="form-group">
                    <label>Age</label>
                    <input type="text" class="form-control" name="missing_person_age" placeholder="Enter age">
                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                    <select name="missing_person_sex" class="form-control required">
                      <option value="">Select Gender</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Addres</label>
                    <textarea class="form-control required" name="missing_person_address" placeholder="Missing address"></textarea>
                  </div>
                	<div class="form-group">
                		<label>Missing date</label>
                    <input type="text" name="missing_person_date" class="form-control datepicker required" placeholder="Missing date">
                  </div>
                  <div class="form-group">
                    <label>Fir No</label>
                    <input type="text" name="missing_person_fir_no" class="form-control" placeholder="Enter Fir no">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control required" name="missing_person_description" placeholder="description"></textarea>
                  </div>
                	<div class="form-group">
                		<label>Person Image</label>
                		<input type="file" name="missing_person_image" class="form-control">
                	</div>
                	<div class="text-right">
                		<input type="submit" name="add_missing" class="btn btn-primary" value="Add">
                	</div>
                </form>
                
            </div>
        </div>
    </div>
</div>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
<script>
  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
  } );
  $("#add-missing-form").validate({
    errorElement: "span", ignore: null, errorClass: 'help-block text-right',
    rules: {
      missing_person_age:{
        required:true,
        number: true,
        maxlength: 2
      },
      
     missing_person_image: {
	        required: true,
	        extension: "png|jpg|jpeg"
	    }
    },
    messages:{
      missing_person_image: {
            required: "Please enter image",
            extension: "upload only image"
        },
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
