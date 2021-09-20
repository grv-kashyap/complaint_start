<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">News</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Add news
            </div>
            <div class="panel-body">
            	<!-- <div class="row"> -->
                <form class="form" action="<?php echo $this->base_url.'admin/add_news'; ?>" id="add-news-form" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                		<label>News Title</label>
                		<input type="text" class="form-control" name="news_name" placeholder="Enter new title">
                	</div>
                	<div class="form-group">
                		<label>News Description</label>
                		<input type="text" class="form-control" name="news_description" placeholder="Enter new title">
                	</div>
                	<div class="form-group">
                		<label>News location</label>
                		<input type="text" class="form-control" name="news_location" placeholder="Enter news location">
                	</div>
                	<div class="form-group">
                		<label>News Image</label>
                		<input type="file" name="news_image" class="form-control">
                	</div>
                	<div class="text-right">
                		<input type="submit" name="add_news" class="btn btn-primary" value="Add">
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
  $("#add-news-form").validate({
    errorElement: "span", ignore: null, errorClass: 'help-block text-right',
    rules: {
      news_name: {
        required: true
      },
      news_description:{
        required:true
      },
      news_location:{
        required:true
      },
	   news_image: {
	        required: true,
	        extension: "png|jpg|jpeg"
	    }
    },
    messages:{
      news_name: {
        required: "Please enter title"
      },
      news_description:{
        required: "Please enter description"
      },
      news_image: {
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
      // $.post("<?php // echo $this->base_url;?>user/chklogin", $("#add-news-form").serialize(), function (data) {
      //     console.log(data);
      //          if (data === "1") {
      //                swal({
      //                 title: "",
      //                 text: "login successfully",
      //                 type: "success"
      //               },function(){
      //                   document.location.href= "<?php // echo $this->base_url;?>admin";
      //               });
      //          }else if (data === "2") {
      //             swal({
      //                 title: "",
      //                 text: "login successfully",
      //                 type: "success"
      //               },function(){
      //                   document.location.href= "<?php // echo $this->base_url;?>home";
      //               });
      //          }else if (data === "0") {
      //             swal("User Not available");
      //          } else {
      //             swal(data);
      //          }
      //       });
   }
  });
</script>
