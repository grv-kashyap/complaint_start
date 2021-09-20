<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complaint Management</title>
    <link href="<?php echo $this->base_url; ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $this->base_url; ?>public/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $this->base_url; ?>public/vendor/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="<?php echo $this->base_url; ?>public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="<?php echo $this->base_url; ?>public/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->base_url; ?>public/js/bootstrap.min.js" type="text/javascript"></script>
  </head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  
  <nav class="navbar navbar-default" id="mainnav">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $this->base_url; ?>">Complaint System</a>
    </div>


    <ul class="nav navbar-nav">
      <?php if(isset($_SESSION['user']) && $_SESSION['user']['role_id']!='1' ): ?>
        <li><a href="<?php echo $this->base_url; ?>home/add_complaint">Add Complaint</a></li>
        <li><a href="<?php echo $this->base_url; ?>home/Complaints">Complaints</a></li>
        <li><a href="<?php echo $this->base_url; ?>home/send_feedback">Give feedback</a></li>
        <li><a href="<?php echo $this->base_url; ?>home/add_missing_report">Missing Report</a></li>
        <li><a href="<?php echo $this->base_url; ?>home/ask_question">Ask Question</a></li>
        <li><a href="<?php echo $this->base_url; ?>home/send_message">Send Message</a></li>
      <?php endif; ?>
    </ul>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <?php if(!isset($_SESSION['user']) ) {?>
        <li><a href="<?php echo $this->base_url; ?>user/login">Login</a></li>
        <li><a href="<?php echo $this->base_url; ?>user/signup">Signup</a></li>
      <?php }else{
        ?>
           <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['user']['user_name'] ?>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo $this->base_url; ?>user/change_password">Change Password</a></li>
              <li><a href="<?php echo $this->base_url; ?>user/Logout">Logout</a></li>
            </ul>
          </li>
      <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="user-wrapper">

  <?php if(isset($_SESSION['messages'])):  ?>
    <div class="space-15"></div>
    <div class="container">
    <div class="alert alert-<?php echo isset($_SESSION['messages']['error'])?'danger':'success '; ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <a href="#" class="alert-link"><?php echo isset($_SESSION['messages']['error'])?'Error :  ':''; ?></a>
        <?php echo isset($_SESSION['messages']['error'])?$_SESSION['messages']['error']:$_SESSION['messages']['success']; 
        unset($_SESSION['messages']);
        ?>
    </div>
  </div>
    <?php endif; ?>
