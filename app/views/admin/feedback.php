   
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Feedback</h1>
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
                                        <th>Title</th>
                                        <th>User Name</th>
                                        <th>Mesage</th>
                                        <th>Created</th>
                                        <th colspan="1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($data['feedbackArray']) && count($data['feedbackArray'])>0):
                                        foreach($data['feedbackArray'] as $feedback):
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo $feedback['feedback_title']; ?></td>
                                             <td class="text-center"><?php echo $feedback['user_name']; ?></td>
                                            <td class="text-center"><?php echo $feedback['feedback_description']; ?></td>
                                           
                                            <td class="center"><?php echo  date('Y-m-d H:i:s',strtotime($feedback['feedback_created'])); ?></td>
                                            <td class="text-center"><a href="<?php echo $this->base_url.'admin/delete_feedback/'.$feedback['feedback_id']; ?>"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i>
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
            <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
            </script>