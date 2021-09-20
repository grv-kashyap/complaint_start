<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Crime Management</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->base_url; ?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
     <link href="<?php echo $this->base_url; ?>public/dist/css/sb-admin-2.css" rel="stylesheet">

     <link href="<?php echo $this->base_url; ?>public/css/admin.css" rel="stylesheet">

    <link href="<?php echo $this->base_url; ?>public/vendor/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="<?php echo $this->base_url; ?>public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="<?php echo $this->base_url; ?>public/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->base_url; ?>public/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php $this->base_url; ?>">Complain Mangement</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="javascript:;"><i class="fa fa-user fa-fw"></i> <?php echo ucfirst($_SESSION['user']['user_name']); ?></a>
                        </li>
                        <li><a href="<?php echo $this->base_url.'user/change_password'; ?>"><i class="fa fa-gear fa-fw"></i> Change password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->base_url; ?>user/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->