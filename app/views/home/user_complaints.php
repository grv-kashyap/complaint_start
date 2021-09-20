<div class="container">
	<div class="row">
	<div class="col-md-9 col-md-offset-2">
                 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Complaint</h1>
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
                            <table width="100%" class="table  table-bordered table-hover table-responsive" id="missing-persons">
                                <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Place Address</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th colspan="1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    	// $this->pr($data['complaintArray']);
                                     if(count($data['complaintArray'])>0):
                                        $complaintArray = $data['complaintArray'];
                                        // $this->pr($complaintArray);
                                        foreach($complaintArray as $complaints):

                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="display: none;"><?php echo $complaints['complaint_id']; ?></td>
                                            <td class="text-center"><?php echo $complaints['complaint_title']; ?></td>
                                            <td class="text-center"><?php echo $complaints['complaint_description']; ?></td>
                                            <?php 
                                            // echo BASE_PATH;
                                            $chk_file = BASE_PATH.'/uploads/'.$complaints['complaint_image'];
                                            if (file_exists($chk_file)) {
                                                $filename = $complaints['complaint_image'];
                                            } else {
                                                $filename = 'default.png';
                                            }
                                            ?>
                                            <td class="text-center"><img class="img-thumbnail" src="<?php echo $this->base_url; ?>uploads/<?php echo $filename; ?>" width="80" height="60"></td>
                                            <td class="text-center"><?php echo $complaints['complaint_category']; ?></td>
                                            <td class="text-center"><?php echo $complaints['complaint_place_address']; ?></td>
                                            <td class="text-center"><?php echo ($complaints['complaint_status']=='1')?'Pending':'Approve'; ?></td>
                                           	<td class="center"><?php echo  date('Y-m-d',strtotime($complaints['complaint_date'])); ?></td>
                                            <?php if($complaints['complaint_status']=='1') : ?>
                                            <td class="text-center"><a href="<?php echo $this->base_url.'home/edit_complaint/'.$complaints['complaint_id']; ?>"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i>
                            					</button></a></td>
                                                <?php else :?>
                                                <td class="text-center"><a href="javascript:;" class="chk_answer" data-id = "<?php echo $complaints['complaint_id']; ?>" ><button type="button" class="btn btn-primary btn-circle">Check Answer
                                                </button></a></td>
                                            <?php endif ;?>
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
        </div>
    </div>
</div>
    <script src="<?php echo $this->base_url; ?>public/vendor/sweetalert/sweetalert.min.js"></script>
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

                    $('.chk_answer').on('click',function(){
                        var complaint_id = $(this).attr('data-id');
                        $.post("<?php echo $this->base_url;?>home/get_complaint_answer", {id:complaint_id}, function (data) {
                            var response = jQuery.parseJSON(data);
                            if(response.status){
                                swal({
                      title: "Answer",
                      text: response.data
                    });
                                
                            }else{
                                swal ( "Oops" ,  response.msg ,  "error" )
                                
                            }

                        });
                    });
                });
            </script>