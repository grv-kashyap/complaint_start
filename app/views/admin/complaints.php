     <link href="<?php echo $this->base_url; ?>public/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo $this->base_url; ?>public/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Complaints</h1>
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
                                        <th>Complaint Title</th>
                                        <th>Description</th>
                                        <th>User name</th>
                                        <th>Compalint Reply</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th colspan="1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($data['complaintArray']) && count($data['complaintArray'])>0):
                                        foreach($data['complaintArray'] as $complaint):
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo $complaint['complaint_title']; ?></td>
                                            <td class="text-center"><?php echo $complaint['complaint_description']; ?></td>
                                            <td class="text-center"><?php echo $complaint['user_name']; ?></td>
                                            <td class="text-center"><?php echo $complaint['complaint_reply']; ?></td>
                                            <td class="text-center"><?php echo $complaint['complaint_category']; ?></td>
                                            <td class="center"><?php echo  date('Y-m-d H:i:s',strtotime($complaint['complaint_created'])); ?></td>
                                            <td class="text-center"><a href="javascript:;" onclick="send_reply(<?php echo $complaint['complaint_id'];  ?>);"><button type="button" class="btn btn-primary">Reply</i>
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
            <div id="ReplyModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Complaint Reply</h4>
			      </div>
			      <div class="modal-body">
			      	<form id="complaint-reply-form" action="<?php echo $this->base_url; ?>admin/complaint_reply" method="post">
			      		<input type="hidden" name="complaint_id" class="complaint_id" value="">
			      		<div class="form-group">
			      			<label>Reply</label>
			      			<textarea name="complaint_reply" class="form-control" placeholder="Enter Reply"></textarea>
			      		</div>
			      		<div class="text-right">
			      			<input type="submit" name="send_reply" value="Send" class="btn btn-primary">
			      		</div>
			      	</form>
			      </div>
			    </div>

			  </div>
			</div>
            <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });

                function send_reply(id){
                	console.log(id);
                	$('.complaint_id').val(id);
                	$('#ReplyModal').modal('show');
                }
            </script>