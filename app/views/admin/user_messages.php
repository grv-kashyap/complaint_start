<style type="text/css">
    .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 350px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

</style>
<div class="space-15"></div>
<div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse " id="collapseOne">
                <div class="panel-body">
                    <ul class="chat">
                        <?php 
                            if(count($data['usermessages'])>0 && isset($data['usermessages']) ){
                                $messageArray = $data['usermessages'];
                                $i=1;
                                foreach($messageArray as $message):
                               ?>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <?php
                                            $chk_file = BASE_PATH.'/uploads/'.$message['user_profile_image'];
                                            if (isset($message['user_profile_image'])&& $message['user_profile_image']!='' && file_exists($chk_file)) {
                                                $filename = $message['user_profile_image'];
                                            } else {
                                                $filename = 'user_default.png';
                                            }
                                        ?>
                                        <img src="<?php echo $this->base_url.'uploads/'.$filename; ?>" alt="User Avatar" class="img-circle" height="40" width="40" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php echo ($message['user_name']==$_SESSION['user']['user_name'])?'Me':ucfirst($message['user_name']); ?></strong> <!-- <small class="pull-right text-muted">
                                                <span class="glyphicon glyphicon-time"></span>12 mins ago</small> -->
                                        </div>
                                        <p>
                                            <?php echo $message['message_text']; ?>
                                        </p>
                                    </div>
                                </li>
                               <?php 
                           endforeach;
                            }
                        ?>
                        
                        
                    </ul>
                </div>
                <div class="panel-footer">
                     <form action="" method="post">
                        <div class="input-group">
                           <input id="btn-input" type="text" name="send_message" class="form-control input-sm" placeholder="Type your message here..." required />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" type="submit" name="send" id="btn-chat" value="send">
                                        Send</button>
                                </span>
                             
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
