              <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php // $this->pr($data['userArray']);?>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Profile pic</th>
                                        <th>Registered</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($data['userArray']) && count($data['userArray'])>0):
                                        $userArray = $data['userArray'];
                                        foreach($userArray as $user):
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo $user['user_name']; ?></td>
                                            <td class="text-center"><?php echo $user['user_email']; ?></td>
                                            <?php 
                                            // echo BASE_PATH;
                                            $chk_file = BASE_PATH.'/uploads/'.$user['user_profile_image'];
                                            if (file_exists($chk_file)) {
                                                $filename = $user['user_profile_image'];
                                            } else {
                                                $filename = 'user_default.png';
                                            }
                                            ?>
                                            <td class="text-center"><img class="img-thumbnail" src="<?php echo $this->base_url; ?>uploads/<?php echo $filename; ?>" width="80" height="60"></td>
                                            <td class="center"><?php echo  date('d M Y',strtotime($user['user_cretaed'])); ?></td>
                                            <td class="text-center"><a href="<?php echo $this->base_url.'admin/send_user_message/'.$user['user_id']; ?>"><button type="button" class="btn btn-primary">Send message
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