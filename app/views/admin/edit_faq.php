<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">FAQ</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Edit Faq
            </div>
            <div class="panel-body">
            	<!-- <div class="row"> -->
                <form class="form" action="<?php echo $this->base_url.'admin/edit_faq/'.$data['faqArray']['faq_id']; ?>" id="add-news-form" method="post" enctype="multipart/form-data">
                	<div class="form-group">
                		<label>Question</label>
                		<input type="text" class="form-control" name="faq_question" value="<?php echo $data['faqArray']['faq_question']; ?>" placeholder="Enter Question">
                	</div>
                	<div class="form-group">
                		<label>Answer</label>
                    <textarea class="form-control" name="faq_answer" cols="8" rows="8" placeholder="Enter Answer"><?php echo $data['faqArray']['faq_answer'];?></textarea>
                		
                	</div>
                	<div class="text-right">
                		<input type="submit" name="edit_faq" class="btn btn-primary" value="Update">
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
      faq_question: {
        required: true
      },
      faq_answer:{
        required:true
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
