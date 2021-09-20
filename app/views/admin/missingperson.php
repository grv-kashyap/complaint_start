                 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Missing Person</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php // $this->pr($data['missingArray']);?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table  table-bordered table-hover" id="missing-persons">
                                <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>description</th>
                                        <th>Fir no</th>
                                        <th>Address</th>
                                        <th>image</th>
                                        <th>Missing Date</th>
                                        <th colspan="1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($data['missingArray']) && count($data['missingArray'])>0):
                                        $missingArray = $data['missingArray'];
                                        // $this->pr($missingArray);
                                        foreach($missingArray as $missing_person):

                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="display: none;"><?php echo $missing_person['missing_person_id']; ?></td>
                                            <td class="text-center"><?php echo $missing_person['missing_person_name']; ?></td>
                                            <td class="text-center"><?php echo $missing_person['missing_person_age']; ?></td>
                                            <td class="text-center"><?php echo ($missing_person['missing_person_sex']=='1')?'Male':'Female'; ?></td>
                                            <td class="text-center"><?php echo $missing_person['missing_person_description']; ?></td>
                                            <td class="text-center"><?php echo $missing_person['missing_person_fir_no']; ?></td>
                                            <td class="text-center"><?php echo $missing_person['missing_person_address']; ?></td>
                                            <?php 
                                            // echo BASE_PATH;
                                            $chk_file = BASE_PATH.'/uploads/'.$missing_person['missing_person_image'];
                                            if (file_exists($chk_file)) {
                                                $filename = $missing_person['missing_person_image'];
                                            } else {
                                                $filename = 'default.png';
                                            }
                                            ?>
                                            <td class="text-center"><img class="img-thumbnail" src="<?php echo $this->base_url; ?>uploads/<?php echo $filename; ?>" width="80" height="60"></td>
                                            <td class="center"><?php echo  date('Y-m-d',strtotime($missing_person['missing_person_date'])); ?></td>
                                            <td class="text-center"><a href="<?php echo $this->base_url.'admin/edit_missing/'.$missing_person['missing_person_id']; ?>"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i>
                            </button></a> <a href="<?php echo $this->base_url.'admin/delete_missing_person/'.$missing_person['missing_person_id']; ?>"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i>
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
                    $('#missing-persons').DataTable({
                        responsive: true,
                        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }],
                        "order": [[ 0, "desc" ]]
                    });
                });
            </script>