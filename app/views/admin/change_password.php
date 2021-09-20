<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Change Password</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                
            </div>
            <div class="panel-body">
            	<!-- <div class="row"> -->
                <form class="form" action="javascript:;" id="change-password-form" method="post">
                	<div class="form-group">
                		<label>Old Password</label>
                		<input type="password" class="form-control" name="old_password" placeholder="Enter Old Password">
                	</div>
                	<div class="form-group">
                		<label>New password</label>
                		<input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter new password">
                	</div>
                	<div class="form-group">
                		<label>Confirm New Password</label>
                		<input type="password" class="form-control" name="confirm_password" placeholder="Enter confirm password">
                	</div>
                	<div class="text-right">
                		<input type="submit" name="change_password" class="btn btn-primary" value="update">
                	</div>
                </form>
                
            </div>
        </div>
    </div>
</div>
 <script src="<?php echo $this->base_url; ?>public/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
<script>
  $("#change-password-form").validate({
    errorElement: "span", ignore: null, errorClass: 'help-block text-right',
    rules: {
      old_password: {
        required: true,
        remote: {
          url: "<?php echo $this->base_url; ?>user/chkpassword",
          type: "post",
        }
      },
      new_password:{
        required:true
      },
      confirm_password:{
        required:true,
        equalTo: "#new_password"
      }
    },
    messages:{
      old_password: {
        required: "Please enter title",
        remote: "Please enter right password"
      },
      new_password:{
        required: "Please enter description"
      },
      confirm_password: {
            required: "Please enter password",
            equalTo: "enter same password as new passowrd"
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
    	 $.post("<?php echo $this->base_url;?>user/update_password", $("#change-password-form").serialize(), function (data) {
          if (data == "1") {
                     swal({
                      title: "",
                      text: "Changes Password successfully",
                      type: "success"
                    },function(){
                        document.location.href= "<?php echo $this->base_url;?>user/logout";
                    });
               } else if (data == "0") {
                  swal("Error Saving Data !!!");
               } else {
                  swal(data);
               }
            });
   }
  });
</script>
