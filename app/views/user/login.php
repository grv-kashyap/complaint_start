<!-- <div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center"><b>Sign In</b></h3>
      <form method="post" action="<?php echo $base_url; ?>user/login" id="loginForm">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="text-right">
          <button type="submit" name="login_submit" class="btn btn-default btn-primary">Sign In</button>
        </div>
      </form>
    </div>
  </div>
</div> -->
 <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign up</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo $this->base_url; ?>user/login" id="loginForm">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="login_submit" value="login" class="btn btn-default btn-block btn-primary">Sign In</button>
                            </fieldset>
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
  $("#loginForm").validate({
    errorElement: "span", ignore: null, errorClass: 'help-block text-right',
    rules: {
      email: {
        required: true,
        email: true
      },
      password:{
        required:true
      }
    },
    messages:{
      email: {
        required: "Please enter email",
        email: "Enter valid email id"
      },
      password:{
        required: "Please enter password"
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
    
      $.post("<?php echo $this->base_url;?>user/chklogin", $("#loginForm").serialize(), function (data) {
          console.log(data);
               if (data === "1") {
                     swal({
                      title: "",
                      text: "login successfully",
                      type: "success"
                    },function(){
                        document.location.href= "<?php echo $this->base_url;?>admin";
                    });
               }else if (data === "2") {
                  swal({
                      title: "",
                      text: "login successfully",
                      type: "success"
                    },function(){
                        document.location.href= "<?php echo $this->base_url;?>home";
                    });
               }else if (data === "0") {
                  swal("User Not available");
               } else {
                  swal(data);
               }
            });
   }
  });
</script>
