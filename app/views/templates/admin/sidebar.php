

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div> -->
                            <!-- /input-group -->
                        <!-- </li> -->
                        <li>
                            <a href="javascript:;"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-th-list fa-fw"></i> News<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->base_url; ?>admin/news">News</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->base_url; ?>admin/add_news">Add News</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-photo fa-fw"></i> Most wanted Person<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->base_url; ?>admin/wantedperson">Persons list</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->base_url; ?>admin/add_wanted">Add</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-photo fa-fw"></i> Missing Person<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $this->base_url; ?>admin/missingperson">List</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->base_url; ?>admin/add_missing">Add</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $this->base_url.'admin/users'; ?>"><i class="fa fa-user fa-fw"></i> Users</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->base_url.'admin/faq'; ?>"><i class="fa fa-edit fa-fw"></i> FAQ</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->base_url.'admin/complaints'; ?>"><i class="fa fa-question-circle fa-fw"></i> Complaints</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->base_url.'admin/feedback'; ?>"><i class="fa fa-comment fa-fw"></i> Feedbacks</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->base_url.'admin/safety_tips'; ?>"><i class="fa fa-exclamation fa-fw"></i> Safety Tips</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        

        <div id="page-wrapper">
            <?php if(isset($_SESSION['messages'])):  ?>
            <div class="space-15"></div>

            <div class="alert alert-<?php echo isset($_SESSION['messages']['error'])?'danger':'success '; ?> alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <a href="#" class="alert-link"><?php echo isset($_SESSION['messages']['error'])?'Error':''; ?></a>
                <?php echo isset($_SESSION['messages']['error'])?$_SESSION['messages']['error']:$_SESSION['messages']['success']; 
                unset($_SESSION['messages']);
                ?>
            </div>
            <?php endif; ?>