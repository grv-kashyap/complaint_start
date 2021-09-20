     <link href="<?php echo $this->base_url; ?>public/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo $this->base_url; ?>public/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">FAQ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php // $this->pr($data['newsArray']);?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Faq
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table  table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Question </th>
                                        <th>Answer </th>
                                        <th>Requested </th>
                                        <th colspan="1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($data['faqArray']) && count($data['faqArray'])>0):
                                        foreach($data['faqArray'] as $faq):
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo $faq['faq_question']; ?></td>
                                            <td class="text-center"><?php echo $faq['faq_answer']; ?></td>
                                            <td class="text-center"><?php echo $faq['user_name']; ?></td>
                                            <td class="text-center"><a href="<?php echo $this->base_url.'admin/edit_faq/'.$faq['faq_id']; ?>"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i>
                            </button></a> <a href="<?php echo $this->base_url.'admin/delete_faq/'.$faq['faq_id']; ?>"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i>
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