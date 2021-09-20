<?php

class AdminModel extends Model {

	public $conn;

	public function __construct(){
		$this->conn = parent::__construct();

	}

    public function get_all_news(){
    	$result = $this->conn->query("select * from news order by news_id desc");
        if($result == true){
        	return $result;
        }else{
        	return $this->conn->error;
        }
    }

    public function get_news_by_id($id){
        $result = $this->conn->query("select * from news where news_id ='$id'");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function delete_news_by_id($id){
        $result = $this->conn->query("delete from news where news_id ='$id'");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }    
    }

    public function add_post($file){
        $time_now = date('Y-m-d H:i:s');
        $result = $this->conn->query("insert into news set news_name = '$_POST[news_name]', news_description = '$_POST[news_description]', news_location = '$_POST[news_location]',news_status = '1', news_created = '$time_now', news_image = '$file'");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

     public function edit_post($file,$id){
        $time_now = date('Y-m-d H:i:s');
        echo $result = $this->conn->query("update news set news_name = '$_POST[news_name]', news_description = '$_POST[news_description]', news_location = '$_POST[news_location]', news_modified = '$time_now', news_image = '$file' where news_id='$id' ");
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

    public function get_wanted_person_by_id($id){
        $result = $this->conn->query("select * from wanted_persons where wanted_person_id ='$id'");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function delete_wanted_person_by_id($id){
        $result = $this->conn->query("delete from wanted_persons where wanted_person_id ='$id'");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }    
    }

    public function add_wanted_person($file){
        $time_now = date('Y-m-d H:i:s');
        $result = $this->conn->query("insert into wanted_persons set wanted_person_name = '$_POST[wanted_person_name]', wanted_person_description = '$_POST[wanted_person_description]', wanted_person_created = '$time_now', wanted_person_image = '$file'");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

     public function edit_wanted_person($file,$id){
        $time_now = date('Y-m-d H:i:s');
        echo $result = $this->conn->query("update wanted_persons set wanted_person_name = '$_POST[wanted_person_name]', wanted_person_description = '$_POST[wanted_person_description]', wanted_person_modified = '$time_now', wanted_person_image = '$file' where wanted_person_id ='$id' ");
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

    public function get_missing_person_by_id($id){
        $result = $this->conn->query("select * from missing_persons where missing_person_id ='$id'");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function delete_missing_person_by_id($id){
        $result = $this->conn->query("delete from missing_persons where missing_person_id ='$id'");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }    
    }

    public function add_missing_person($file){
        $time_now = date('Y-m-d H:i:s');
        $basic_date =  date('Y-m-d ',strtotime(strtr($_POST['missing_person_date'], '/', '-')));
        // $this->pr($_POST);
        $result = $this->conn->query("insert into missing_persons set missing_person_name = '$_POST[missing_person_name]',missing_person_age = '$_POST[missing_person_age]',missing_person_sex = '$_POST[missing_person_sex]',missing_person_address = '$_POST[missing_person_address]',missing_person_date = '$basic_date',missing_person_fir_no = '$_POST[missing_person_fir_no]', missing_person_description = '$_POST[missing_person_description]', missing_person_created = '$time_now', missing_person_image = '$file'");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

     public function edit_missing_person($file,$id){
        $time_now = date('Y-m-d H:i:s');
        $basic_date =  date('Y-m-d ',strtotime(strtr($_POST['missing_person_date'], '/', '-')));
        // $this->pr($_POST);
        $result = $this->conn->query("update missing_persons set missing_person_name = '$_POST[missing_person_name]',missing_person_age = '$_POST[missing_person_age]',missing_person_sex = '$_POST[missing_person_sex]',missing_person_address = '$_POST[missing_person_address]',missing_person_date = '$basic_date',missing_person_fir_no = '$_POST[missing_person_fir_no]', missing_person_description = '$_POST[missing_person_description]', missing_person_created = '$time_now', missing_person_image = '$file' where missing_person_id = '$id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function saveuser($hash_password){
        $time_now = date('Y-m-d H:i:s');
        $result = $this->conn->query("insert into users set user_name = '$_POST[user_name]', user_email = '$_POST[user_email]', user_password = '$hash_password',user_status = '1', user_cretaed = 'time_now', user_profile_image = '',role_id= '2' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_all_users(){
        $result = $this->conn->query("select * from users where role_id != '1' order by user_id desc");
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

    public function get_all_faq(){
        $result = $this->conn->query("select * from faq join users on users.user_id =faq.user_id  order by faq_id desc ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }     
    }

    public function get_faq_by_id($id){
        $result = $this->conn->query("select * from faq where faq_id = '$id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }     
    }

    public function delete_faq_by_id($id){
        $result = $this->conn->query("delete from faq where faq_id = '$id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }     
    }

    public function edit_faq($id){
        
        $result = $this->conn->query("update faq set faq_question = '$_POST[faq_question]', faq_answer = '$_POST[faq_answer]' where faq_id='$id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_all_complaints(){
        $result = $this->conn->query("select * from complaints join users on users.user_id = complaints.user_id order by complaint_id desc");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function update_complaint(){
        $result = $this->conn->query("update complaints set complaint_reply = '$_POST[complaint_reply]', complaint_status = '2' where complaint_id='$_POST[complaint_id]' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_all_feedbacks(){
        $result = $this->conn->query("select * from feedback join users on users.user_id = feedback.user_id order by feedback_id desc");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_feedback_by_id($id){
        $result = $this->conn->query("select * from feedback where feedback_id ='$id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function delete_feedback_by_id($id){
        $result = $this->conn->query("delete  from feedback where feedback_id ='$id' ");
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

    public function add_safety_tip(){
        $time_now = date('Y-m-d H:i:s');
        $result = $this->conn->query("insert into safety_tips set safety_tip_tagline = '$_POST[safety_tip_tagline]', safety_tip_created = '$time_now' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function get_safety_by_id($id){
        $result = $this->conn->query("select * from safety_tips where safety_tip_id ='$id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function update_safety_tip($id){
        $result = $this->conn->query("update safety_tips set safety_tip_tagline = '$_POST[safety_tip_tagline]' where safety_tip_id ='$id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function delete_safety_by_id($id){
        $result = $this->conn->query("delete  from safety_tips where safety_tip_id ='$id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }
}
