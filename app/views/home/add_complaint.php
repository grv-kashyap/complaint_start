<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Complaint</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo $this->base_url; ?>home/add_complaint" id="add-complaint-form" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control required" name="complaint_title" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control required datepicker" name="complaint_date" placeholder="Enter Date">
                                </div>
                                <div class="form-group">
                                  <textarea class="form-control required" name="complaint_description" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control required" name="complaint_category" placeholder="Enter Category">
                                </div>
                                <div class="form-group">
                                  <textarea class="form-control required" name="complaint_address" placeholder="Enter Address" ></textarea>
                                </div>
                                <div class="form-group">
                                  <input type="file" name="complaint_image" class="form-control">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="add_complaint" value="add_complaint" class="btn btn-default btn-block btn-primary">Submit</button>
                            </fieldset>
                        </form>
                    </div>
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
  $("#add-complaint-form").validate({
    errorElement: "span", ignore: null, errorClass: 'help-block text-right',
    rules: {
      complaint_image: {
          extension: "png|jpg|jpeg"
      }
    },
    messages:{
      email: {
        required: "Please enter email",
        email: "Enter valid email id"
      },
      complaint_image: {
          extension: "please upload only jpg ,png and jpeg"
      }
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
