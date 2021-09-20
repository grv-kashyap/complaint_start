<?php

class HomeModel extends Model {

	public $conn;

	public function __construct(){
		$this->conn = parent::__construct();
	}

	public function add_complaint($user_id,$file=''){
		$time_now = date('Y-m-d H:i:s');
		$complain_date =  date('Y-m-d ',strtotime(strtr($_POST['complaint_date'], '/', '-')));
        $result = $this->conn->query("insert into complaints set complaint_title = '$_POST[complaint_title]', complaint_description = '$_POST[complaint_description]', complaint_category = '$_POST[complaint_category]', complaint_place_address = '$_POST[complaint_address]',complaint_status = '1',complaint_date='$complain_date', complaint_created = '$time_now', complaint_image = '$file' ,user_id ='$user_id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
	}

	public function get_user_complaints($id){
		$result = $this->conn->query("select * from complaints where user_id = '$id' order by complaint_id desc");
        if($result == true){
        	return $result;
        }else{
        	return $this->conn->error;
        }
	}

	public function get_complaint_by_id($id){
		$result = $this->conn->query("select * from complaints where complaint_id = '$id'");
        if($result == true){
        	return $result;
        }else{
        	return $this->conn->error;
        }	
	}

	public function edit_complaint($id,$file=''){
		$time_now = date('Y-m-d H:i:s');
		$complain_date =  date('Y-m-d ',strtotime(strtr($_POST['complaint_date'], '/', '-')));
        $result = $this->conn->query("update complaints set complaint_title = '$_POST[complaint_title]', complaint_description = '$_POST[complaint_description]', complaint_category = '$_POST[complaint_category]', complaint_place_address = '$_POST[complaint_address]',complaint_status = '1',complaint_date='$complain_date', complaint_created = '$time_now', complaint_image = '$file' where complaint_id = '$id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
	}

	public function add_feedback($user_id){
		$time_now = date('Y-m-d H:i:s');
		$result = $this->conn->query("insert into feedback set feedback_title = '$_POST[feedback_title]', feedback_description = '$_POST[feedback_description]',feedback_created = '$time_now',user_id ='$user_id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
	}

	public function add_question($user_id){
		$time_now = date('Y-m-d H:i:s');
		$result = $this->conn->query("insert into faq set faq_question = '$_POST[question]',user_id ='$user_id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
	}

    public function get_top_news($limit){
        $result = $this->conn->query("select * from news  order by news_id desc limit $limit ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_top_most_wanted($limit){
        $result = $this->conn->query("select * from wanted_persons  order by wanted_person_id desc limit $limit ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_top_missing_person($limit){
        $result = $this->conn->query("select * from missing_persons  order by missing_person_id desc limit $limit ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_all_news(){
        $result = $this->conn->query("select * from news order by news_id desc");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_all_wanted_person(){
        $result = $this->conn->query("select * from wanted_persons order by wanted_person_id desc");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_all_missing_person(){
        $result = $this->conn->query("select * from missing_persons order by missing_person_id desc");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_all_faq(){
        $result = $this->conn->query("select * from faq order by faq_id desc");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

     public function add_message($from,$to){
       $time_now = date('Y-m-d H:i:s');
        $result = $this->conn->query("insert into messages set message_text = '$_POST[send_message]', message_from = '$from', message_to = '$to', message_created = '$time_now' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        } 
    }

    public function get_user_messages($from,$to){
        $result = $this->conn->query("SELECT * FROM messages join users on users.user_id=messages.message_from WHERE (message_from = '$from' and message_to ='$to') or (message_from = '$to' and message_to ='$from') order by message_id asc ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_all_safety_tips(){
        $result = $this->conn->query("select * from safety_tips order by safety_tip_id desc");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

}