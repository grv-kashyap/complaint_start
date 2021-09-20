     <link href="<?php echo $this->base_url; ?>public/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo $this->base_url; ?>public/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Most Wanted Person</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php // $this->pr($data['wantedArray']);?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table  table-bordered table-hover" id="wanted-persons">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>description</th>
                                        <th>Image</th>
                                        <th>Created</th>
                                        <th colspan="1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($data['wantedArray']) && count($data['wantedArray'])>0):
                                        $wantedArray = $data['wantedArray'];
                                        foreach($wantedArray as $wanted_person):
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo $wanted_person['wanted_person_name']; ?></td>
                                            <td class="text-center"><?php echo $wanted_person['wanted_person_description']; ?></td>
                                            <?php 
                                            // echo BASE_PATH;
                                            $chk_file = BASE_PATH.'/uploads/'.$wanted_person['wanted_person_image'];
                                            if (file_exists($chk_file)) {
                                                $filename = $wanted_person['wanted_person_image'];
                                            } else {
                                                $filename = 'default.png';
                                            }
                                            ?>
                                            <td class="text-center"><img class="img-thumbnail" src="<?php echo $this->base_url; ?>uploads/<?php echo $filename; ?>" width="80" height="60"></td>
                                            <td class="center"><?php echo  date('Y-m-d H:i:s',strtotime($wanted_person['wanted_person_created'])); ?></td>
                                            <td class="text-center"><a href="<?php echo $this->base_url.'admin/edit_wanted/'.$wanted_person['wanted_person_id']; ?>"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i>
                            </button></a> <a href="<?php echo $this->base_url.'admin/delete_wanted_person/'.$wanted_person['wanted_person_id']; ?>"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i>
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
                    $('#wanted-persons').DataTable({
                        responsive: true
                    });
                });
            </script>