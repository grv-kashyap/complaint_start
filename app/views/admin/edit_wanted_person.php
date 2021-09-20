<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Most Wanted Person</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Add most wanted
            </div>
            <div class="panel-body">
              <!-- <div class="row"> -->
                <form class="form" action="<?php echo $this->base_url.'admin/edit_wanted/'.$data['wantedarray']['wanted_person_id']; ?>" id="edit-wanted-form" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="wanted_person_name" value="<?php echo $data['wantedarray']['wanted_person_name']; ?>" placeholder="Enter new title">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="wanted_person_description" placeholder="Enter description"><?php echo $data['wantedarray']['wanted_person_description']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="wanted_person_image" class="form-control">
                  </div>
                  <div class="image-div">
                    <?php
                    $chk_file = BASE_PATH.'/uploads/'.$data['wantedarray']['wanted_person_image'];
                    if (file_exists($chk_file)) {
                        $filename = $data['wantedarray']['wanted_person_image'];
                    } else {
                        $filename = 'default.png';
                    }
                    ?>
                    <img src="<?php echo $this->base_url.'/uploads/'.$filename; ?>" class="img img-thumbnail" height="200" width="200">
                  </div>
                  <div class="text-right">
                    <input type="submit" name="edit_wanted" class="btn btn-primary" value="update">
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
  $("#edit-wanted-form").validate({
    errorElement: "span", ignore: null, errorClass: 'help-block text-right',
    rules: {
      wanted_person_name: {
        required: true
      },
      wanted_person_description:{
        required:true
      },
     wanted_person_image: {
          extension: "png|jpg|jpeg"
      }
    },
    messages:{
      wanted_person_name: {
        required: "Please enter title"
      },
      wanted_person_description:{
        required: "Please enter description"
      },
      wanted_person_image: {
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
