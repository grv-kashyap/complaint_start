<?php

class Admin extends Controller{

    public $adminModel;
	public function __construct(){
		if(!isset($_SESSION['user']) ){
			header('location:'.$this->base_url.'user/login');
			die();	
    	}
    	$role = $this->user_role();
    	if($role!='admin'){
    		header('location:'.$this->base_url.'home');	
    		die();
    	}
        $this->adminModel = $this->model("AdminModel");
    }

    public function index($name = '',$age = '') {
    	
        $this->render_view('admin/index','admin' ,'');
    }

    public function add_news(){
        $data = array();
        if(isset($_POST['add_news'])){
                print_r($_FILES['news_image']);
            
            if (($_FILES["news_image"]["type"] == "image/jpeg" || $_FILES["news_image"]["type"] == "image/jpg" || $_FILES["news_image"]["type"] == "image/png") && $_FILES["news_image"]["size"] < 2048000){
                $file_name = time().'_'.$_FILES["news_image"]["name"];
                if(move_uploaded_file($_FILES["news_image"]["tmp_name"] ,"./uploads/" .$file_name)){
                    $result = $this->adminModel->add_post($file_name);
                    $this->add_flashdata(array('success'=>'News added successfully'));
                    header('location:'.$this->base_url.'admin/news');
                    die();
                }
                 else{
                    $this->add_flashdata(array('error'=>'Error in uploading'));
                    header('location:'.$this->base_url.'admin/add_news');
                    die();
                }
            }
            else {
                $this->add_flashdata(array('error'=>'Image size less than 2mb'));
                header('location:'.$this->base_url.'admin/add_news');
                die();
            } 
        }
        $this->render_view('admin/add_news','admin' ,$data);
    }

    public function news(){
        $data = array();
        $result = $this->adminModel->get_all_news();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['newsArray'][] = $row;
            }
        }
        $this->render_view('admin/news','admin' ,$data);   
    }

    public function edit_news($id){
        $data = array();
        $result = $this->adminModel->get_news_by_id($id);
        if($result->num_rows >0 ){
            $data['newsarray'] = $result->fetch_assoc();
        }
        if(isset($_POST['edit_news'])){
            $file_name =  $data['newsarray']['news_image'];
            // $this->pr($_FILES);
            if (($_FILES["news_image"]["type"] == "image/jpeg" || $_FILES["news_image"]["type"] == "image/jpg" || $_FILES["news_image"]["type"] == "image/png") && $_FILES["news_image"]["size"] < 2048000){
                $file_name = time().'_'.$_FILES["news_image"]["name"];
                if(move_uploaded_file($_FILES["news_image"]["tmp_name"] ,"./uploads/" .$file_name)){
                    
                }
                 else{
                    $this->add_flashdata(array('error'=>'Error in uploading'));
                    header('location:'.$this->base_url.'admin/add_news');
                    die();
                }
                // $q1 = $this->adminModel->insert_news();
                // header("location:view_posts");  
            }
            $result = $this->adminModel->edit_post($file_name,$id);
            $this->add_flashdata(array('success'=>'News updated successfully'));
            header('location:'.$this->base_url.'admin/news');
            die();
        }
        $this->render_view('admin/edit_news','admin' ,$data);
    }

    public function delete_news($id){
        $data = array();
        $result = $this->adminModel->get_news_by_id($id);
        if($result->num_rows >0 ){
            $this->adminModel->delete_news_by_id($id);   
            $this->add_flashdata(array('success'=>'News deleted successfully'));
            header('location:'.$this->base_url.'admin/news');
            die();
        }
        $this->add_flashdata(array('error'=>'Invalid Record'));
        header('location:'.$this->base_url.'admin/news');
        die();
                
    }

    public function add_wanted(){
        $data = array();

        if(isset($_POST['add_wanted'])){
            // $this->pr($_POST);
            if (($_FILES["wanted_person_image"]["type"] == "image/jpeg" || $_FILES["wanted_person_image"]["type"] == "image/jpg" || $_FILES["wanted_person_image"]["type"] == "image/png") && $_FILES["wanted_person_image"]["size"] < 2048000){
                $file_name = time().'_'.$_FILES["wanted_person_image"]["name"];
                if(move_uploaded_file($_FILES["wanted_person_image"]["tmp_name"] ,"./uploads/" .$file_name)){
                    $result = $this->adminModel->add_wanted_person($file_name);
                    $this->add_flashdata(array('success'=>'Person added successfully'));
                    header('location:'.$this->base_url.'admin/wantedperson');
                    die();
                }
                 else{
                    $this->add_flashdata(array('error'=>'Error in uploading'));
                    header('location:'.$this->base_url.'admin/add_wanted');
                    die();
                }
            }
            else {
                $this->add_flashdata(array('error'=>'Image size less than 2mb'));
                header('location:'.$this->base_url.'admin/add_wanted');
                die();
            } 
        }
        $this->render_view('admin/add_wanted_person','admin' ,$data);
    }

    public function wantedperson(){
        $data = array();
        $result = $this->adminModel->get_all_wanted_person();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['wantedArray'][] = $row;
            }
        }
        $this->render_view('admin/wantedpersons','admin' ,$data);   
    }

    public function edit_wanted($id){
        $data = array();
        $result = $this->adminModel->get_wanted_person_by_id($id);
        if($result->num_rows >0 ){
            $data['wantedarray'] = $result->fetch_assoc();
        }
        if(isset($_POST['edit_wanted'])){
            $file_name =  $data['wantedarray']['wanted_person_image'];
            // $this->pr($_FILES);
            if (($_FILES["wanted_person_image"]["type"] == "image/jpeg" || $_FILES["wanted_person_image"]["type"] == "image/jpg" || $_FILES["wanted_person_image"]["type"] == "image/png") && $_FILES["wanted_person_image"]["size"] < 2048000){
                $file_name = time().'_'.$_FILES["wanted_person_image"]["name"];
                if(move_uploaded_file($_FILES["wanted_person_image"]["tmp_name"] ,"./uploads/" .$file_name)){
                    
                }
                 else{
                    $this->add_flashdata(array('error'=>'Error in uploading'));
                    header('location:'.$this->base_url.'admin/edit_wanted');
                    die();
                }
                // $q1 = $this->adminModel->insert_news();
                // header("location:view_posts");  
            }
            $result = $this->adminModel->edit_wanted_person($file_name,$id);
            $this->add_flashdata(array('success'=>'person updated successfully'));
            header('location:'.$this->base_url.'admin/wantedperson');
            die();
        }
        $this->render_view('admin/edit_wanted_person','admin' ,$data);
    }

    public function delete_wanted_person($id){
        $data = array();
        $result = $this->adminModel->get_wanted_person_by_id($id);
        if($result->num_rows >0 ){
            $this->adminModel->delete_wanted_person_by_id($id);   
            $this->add_flashdata(array('success'=>'Person deleted successfully'));
            header('location:'.$this->base_url.'admin/wantedperson');
            die();
        }
        $this->add_flashdata(array('error'=>'Invalid Record'));
        header('location:'.$this->base_url.'admin/wantedperson');
        die();
    }

    public function add_missing(){
        $data = array();

        if(isset($_POST['add_missing'])){
            // $this->pr($_POST);
            if (($_FILES["missing_person_image"]["type"] == "image/jpeg" || $_FILES["missing_person_image"]["type"] == "image/jpg" || $_FILES["missing_person_image"]["type"] == "image/png") && $_FILES["missing_person_image"]["size"] < 2048000){
                $file_name = time().'_'.$_FILES["missing_person_image"]["name"];
                if(move_uploaded_file($_FILES["missing_person_image"]["tmp_name"] ,"./uploads/" .$file_name)){
                    $result = $this->adminModel->add_missing_person($file_name);
                    // $this->pr($result);
                    $this->add_flashdata(array('success'=>'Person added successfully'));
                    header('location:'.$this->base_url.'admin/missingperson');
                    die();
                }
                 else{
                    $this->add_flashdata(array('error'=>'Error in uploading'));
                    header('location:'.$this->base_url.'admin/add_missing');
                    die();
                }
            }
            else {
                $this->add_flashdata(array('error'=>'Image size less than 2mb'));
                header('location:'.$this->base_url.'admin/add_missing');
                die();
            } 
        }
        $this->render_view('admin/add_missing_person','admin' ,$data);
    }

    public function missingperson(){
        $data = array();
        $result = $this->adminModel->get_all_missing_person();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['missingArray'][] = $row;
            }
        }
        $this->render_view('admin/missingperson','admin' ,$data);   
    }

    public function edit_missing($id){
        $data = array();
        $result = $this->adminModel->get_missing_person_by_id($id);
        if($result->num_rows >0 ){
            $data['missingarray'] = $result->fetch_assoc();
        }
        if(isset($_POST['edit_missing'])){
            // $this->pr($_POST);
            $file_name =  $data['missingarray']['missing_person_image'];
            // $this->pr($_FILES);
            if (($_FILES["missing_person_image"]["type"] == "image/jpeg" || $_FILES["missing_person_image"]["type"] == "image/jpg" || $_FILES["missing_person_image"]["type"] == "image/png") && $_FILES["missing_person_image"]["size"] < 2048000){
                $file_name = time().'_'.$_FILES["missing_person_image"]["name"];
                if(move_uploaded_file($_FILES["missing_person_image"]["tmp_name"] ,"./uploads/" .$file_name)){
                    
                }
                 else{
                    $this->add_flashdata(array('error'=>'Error in uploading'));
                    header('location:'.$this->base_url.'admin/edit_missing');
                    die();
                }
            }
            $result = $this->adminModel->edit_missing_person($file_name,$id);
            $this->add_flashdata(array('success'=>'person updated successfully'));
            header('location:'.$this->base_url.'admin/missingperson');
            die();
        }
        $this->render_view('admin/edit_missing_person','admin' ,$data);
    }

    public function delete_missing_person($id){
        $data = array();
        $result = $this->adminModel->get_missing_person_by_id($id);
        if($result->num_rows >0 ){
            $this->adminModel->delete_missing_person_by_id($id);   
            $this->add_flashdata(array('success'=>'Person deleted successfully'));
            header('location:'.$this->base_url.'admin/missingperson');
            die();
        }
        $this->add_flashdata(array('error'=>'Invalid Record'));
        header('location:'.$this->base_url.'admin/missingperson');
        die();
    }

    public function users(){
        $data = array();
        $result = $this->adminModel->get_all_users();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['userArray'][] = $row;
            }
        }
        $this->render_view('admin/users','admin' ,$data);    
    }

    public function send_user_message($to){
        $data = array();
        $from = $_SESSION['user']['user_id'];
        $user_messages = $this->adminModel->get_user_messages($_SESSION['user']['user_id'],$to);
        if($user_messages->num_rows >0 ){
            while($row = $user_messages->fetch_assoc()){
                $data['usermessages'][] = $row;
            }
        }
        // $this->pr($data);
        if(isset($_POST['send']) && $_POST['send']!=''){
            $result = $this->adminModel->add_message($_SESSION['user']['user_id'],$to);
            $this->add_flashdata(array('success'=>'message sent successfully'));
            header('location:'.$this->base_url.'admin/send_user_message/'.$to);
            die();
        }
        $this->render_view('admin/user_messages','admin' ,$data); 
    }

    public function faq(){
        $data = array();
        $result = $this->adminModel->get_all_faq();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['faqArray'][] = $row;
            }
        }
        $this->render_view('admin/faq','admin' ,$data); 
    }

    public function edit_faq($id){
        $data = array();
        $result = $this->adminModel->get_faq_by_id($id);
        if($result->num_rows >0 ){
            $data['faqArray'] = $result->fetch_assoc();
        }
        if(isset($_POST['edit_faq'])){
            $result = $this->adminModel->edit_faq($id);
            $this->add_flashdata(array('success'=>'Faq updated successfully'));
            header('location:'.$this->base_url.'admin/faq');
            die();
        }
        $this->render_view('admin/edit_faq','admin' ,$data); 
    }

    public function delete_faq($id){
        $data = array();
        $result = $this->adminModel->get_faq_by_id($id);
        if($result->num_rows >0 ){
            $this->adminModel->delete_faq_by_id($id);   
            $this->add_flashdata(array('success'=>'faq deleted successfully'));
            header('location:'.$this->base_url.'admin/faq');
            die();
        }
        $this->add_flashdata(array('error'=>'Invalid Record'));
        header('location:'.$this->base_url.'admin/faq');
        die();
    }

    public function complaints(){
        $data = array();
        $result = $this->adminModel->get_all_complaints();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['complaintArray'][] = $row;
            }
        }
        $this->render_view('admin/complaints','admin' ,$data); 
    }

    public function complaint_reply(){
        if(isset($_POST['send_reply'])){
            $result = $this->adminModel->update_complaint();
            $this->add_flashdata(array('success'=>'Send reply to user successfully'));
            header('location:'.$this->base_url.'admin/complaints');
            die();
        }
    }

    public function feedback(){
        $data = array();
        $result = $this->adminModel->get_all_feedbacks();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['feedbackArray'][] = $row;
            }
        }
        // $this->pr($data);
        $this->render_view('admin/feedback','admin' ,$data); 
    }

    public function delete_feedback($id){
        $data = array();
        $result = $this->adminModel->get_feedback_by_id($id);
        if($result->num_rows >0 ){
            $this->adminModel->delete_feedback_by_id($id);   
            $this->add_flashdata(array('success'=>'Feedback deleted successfully'));
            header('location:'.$this->base_url.'admin/feedback');
            die();
        }
        $this->add_flashdata(array('error'=>'Invalid Record'));
        header('location:'.$this->base_url.'admin/feedback');
        die();
    }

    public function safety_tips(){
        $data = array();
        $result = $this->adminModel->get_all_safety_tips();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['safetytipArray'][] = $row;
            }
        }
        // $this->pr($data);
        $this->render_view('admin/safetytips','admin' ,$data); 
    }

    public function add_safety_tips(){
        $data = array();
        if(isset($_POST['add_safety']) ){
            $result = $this->adminModel->add_safety_tip();
            $this->add_flashdata(array('success'=>'Safety tip added successfully'));
            header('location:'.$this->base_url.'admin/safety_tips');
            die();
        }
        // $this->pr($data);
        $this->render_view('admin/safetytip','admin' ,$data); 
    }

    public function delete_safety_tip($id){
        $data = array();
        $result = $this->adminModel->get_safety_by_id($id);
        if($result->num_rows >0 ){
            $this->adminModel->delete_safety_by_id($id);   
            $this->add_flashdata(array('success'=>'Safety tip deleted successfully'));
            header('location:'.$this->base_url.'admin/safety_tips');
            die();
        }
        $this->add_flashdata(array('error'=>'Invalid Record'));
        header('location:'.$this->base_url.'admin/safety_tips');
        die();
    }

    public function edit_safety_tip($id){
        $data = array();
        $result = $this->adminModel->get_safety_by_id($id);
        if($result->num_rows >0 ){
            $data['safetytipArray'] = $result->fetch_assoc();
        }
        if(isset($_POST['edit_safety'])){
            $result = $this->adminModel->update_safety_tip($id);
            $this->add_flashdata(array('success'=>'Tip updated successfully'));
            header('location:'.$this->base_url.'admin/safety_tips');
            die();
        }
        $this->render_view('admin/edit_safety_tip','admin' ,$data); 
    }

}
