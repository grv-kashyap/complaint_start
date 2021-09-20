<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign up</h3>
                    </div>
                    <div class="panel-body">
      
                      <form method="post" action="<?php echo $base_url; ?>user/signup" id="signupForm">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="user_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" name="user_email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                          <label for="Password">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                          <label for="Password">Confirm Password</label>
                          <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
                        </div>
                        <div class="text-right">
                          <button type="submit" name="login_submit" class="btn btn-default btn-primary">Sign up</button>
                        </div>
                      </form>
                    </div>
                  </div>
    </div>
  </div>
</div>
<script src="<?php echo $this->base_url; ?>public/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
<script>
  $("#signupForm").validate({
    errorElement: "span", ignore: null, errorClass: 'help-block text-right',
    rules: {
      user_name:{
        required:true
      },
      user_email: {
        required: true,
        email: true,
        remote: {
          url: "<?php echo $this->base_url; ?>user/chkuser",
          type: "post",
        }
      },
      password:{
        required:true
      },
      confirm_password:{
        required:true,
        equalTo: "#password"
      }
    },
    messages:{
      user_name:{
        required:"Please Enter Name"
      },
      user_email: {
        required: "Please Enter Email",
        email: "enter valid email address",
        remote: "User already register"
      },
      password:{
        required:"Please Enter Password"
      },
      confirm_password:{
        required:"Enter Confirm Password"
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
    $.post("<?php echo $this->base_url;?>user/save", $("#signupForm").serialize(), function (data) {
               if (data === "1") {
                     swal({
                      title: "",
                      text: "Register successfully",
                      type: "success"
                    },function(){
                        document.location.href= "<?php echo $this->base_url;?>user";
                    });
               } else if (data === "0") {
                  swal("Error Saving Data !!!");
               } else {
                  swal(data);
               }
            });
   }
   
  });
</script>
