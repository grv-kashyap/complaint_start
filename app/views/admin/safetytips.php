              <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Safety tips</h1>
                </div>
                <div class="col-lg-6 text-right">
                    <button type="button" class="btn btn-info page-header" data-toggle="modal" data-target="#addSafetyModal">Add Safety</button>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <?php // $this->pr($data['newsArray']);?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table  table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tagline</th>
                                        <th>Created</th>
                                        <th colspan="1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($data['safetytipArray']) && count($data['safetytipArray'])>0):
                                        foreach($data['safetytipArray'] as $safetytip):
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo $safetytip['safety_tip_tagline']; ?></td>
                                            <td class="center"><?php echo  date('Y-m-d H:i:s',strtotime($safetytip['safety_tip_created'])); ?></td>
                                            <td class="text-center"><a href="<?php echo $this->base_url.'admin/edit_safety_tip/'.$safetytip['safety_tip_id']; ?>"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i>
                                            </button></a> <a href="<?php echo $this->base_url.'admin/delete_safety_tip/'.$safetytip['safety_tip_id']; ?>"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i>
                                            </button></a></td>
                                        </tr>
                                        <?php endforeach ; ?>
                                    <?php endif;  ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div id="addSafetyModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Add Safety</h4>
			      </div>
			      <div class="modal-body">
			      	<form id="add-safety-form" action="<?php echo $this->base_url; ?>admin/add_safety_tips" method="post">
			      		<div class="form-group">
			      			<label>Safety tip</label>
			      			<input type="text" name="safety_tip_tagline" class="form-control required" placeholder="Enter Tip">
			      		</div>
			      		<div class="text-right">
			      			<input type="submit" name=add_safety value="ADD" class="btn btn-primary">
			      		</div>
			      	</form>
			      </div>
			    </div>

			  </div>
			</div>
            <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
    $("#add-safety-form").validate({
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
