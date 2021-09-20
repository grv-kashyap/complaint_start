<?php

class Home extends Controller {

	public $homemodel ;
	
	public function __construct(){
		$this->homemodel = $this->model('homeModel');
	}

    public function index($name = '',$age = '') {
        $data = array();
        $result = $this->homemodel->get_top_news('6');
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['newsArray'][] = $row;
            }
        }
        $result1 = $this->homemodel->get_top_most_wanted('4');
        // $this->pr($result1);
        if($result1->num_rows >0 ){
            while($row1 = $result1->fetch_assoc()){
                $data['mostwantedArray'][] = $row1;
            }
        }

        $result2 = $this->homemodel->get_top_missing_person('4');
        
        if($result2->num_rows >0 ){
            while($row2 = $result2->fetch_assoc()){
                $data['missingArray'][] = $row2;
            }
        }
        $this->render_view('home/index','' ,$data);
    }

    public function add_complaint(){
    	if(!isset($_SESSION['user'])){
            header('location:'.$this->base_url.'user');
        }
        
    	
    	if(isset($_POST['add_complaint'])){
            // $this->pr($_POST);
            // die;
    		if (($_FILES["complaint_image"]["type"] == "image/jpeg" || $_FILES["complaint_image"]["type"] == "image/jpg" || $_FILES["complaint_image"]["type"] == "image/png") && $_FILES["complaint_image"]["size"] < 2048000){
                $file_name = time().'_'.$_FILES["complaint_image"]["name"];
                if(move_uploaded_file($_FILES["complaint_image"]["tmp_name"] ,"./uploads/" .$file_name)){
                    
                }
                 else{
                    $this->add_flashdata(array('error'=>'Error in uploading'));
                    header('location:'.$this->base_url.'home/add_complaint');
                    die();
                }
                
            }
    		$result = $this->homemodel->add_complaint($_SESSION['user']['user_id'],$file_name);
    		if($result=='true'){
    			$this->add_flashdata(array('success'=>'Complaint added successfully'));
                header('location:'.$this->base_url.'home/');
                die();	
    		}
    	}
    	$data = array();
    	$this->render_view('home/add_complaint','' ,'');
    }

    public function complaints(){
    	$data = array();
    	$result= $this->homemodel->get_user_complaints($_SESSION['user']['user_id']);

    	if($result->num_rows>0){

            while($row = $result->fetch_assoc()){
                $data['complaintArray'][] = $row;
            }
        }
        
        $this->render_view('home/user_complaints','' ,$data);
    }

    public function edit_complaint($id){
    	if(!isset($_SESSION['user'])){
            header('location:'.$this->base_url.'user');
        }
        $role = $this->user_role();
    	if($role=='admin'){
    		header('location:'.$this->base_url.'home');	
    		die();
    	}
    	$result = $this->homemodel->get_complaint_by_id($id);
    	if($result->num_rows >0 ){
            $data['complaintarray'] = $result->fetch_assoc();
        }else{
            $this->add_flashdata(array('error'=>'Invalid complaint'));
            header('location:'.$this->base_url.'home/complaints');
            die();
        }
        if($data['complaintarray']['complaint_status']=='2'){
            $this->add_flashdata(array('error'=>'You can not perform action'));
            header('location:'.$this->base_url.'home/complaints');
            die();
        }
        
    	if(isset($_POST['edit_complaint'])){
    		
    		$file_name = $data['complaintarray']['complaint_image'];
    		
    		if (($_FILES["complaint_image"]["type"] == "image/jpeg" || $_FILES["complaint_image"]["type"] == "image/jpg" || $_FILES["complaint_image"]["type"] == "image/png") && $_FILES["complaint_image"]["size"] < 2048000){
                $file_name = time().'_'.$_FILES["complaint_image"]["name"];
                if(move_uploaded_file($_FILES["complaint_image"]["tmp_name"] ,"./uploads/" .$file_name)){
                    
                }
                 else{
                    $this->add_flashdata(array('error'=>'Error in uploading'));
                    header('location:'.$this->base_url.'home/add_complaint');
                    die();
                }
                
            }
    		$result1 = $this->homemodel->edit_complaint($id,$file_name);
    		if($result1 =='true'){
    			$this->add_flashdata(array('success'=>'Complaint updated successfully'));
                header('location:'.$this->base_url.'home/complaints');
                die();	
    		}
    	}
    	
    	$this->render_view('home/edit_complaint','' ,$data);
    }

    public function send_feedback(){
    	$data = array();
    	if(isset($_POST['send_feedback'])){
    		$result = $this->homemodel->add_feedback($_SESSION['user']['user_id']);
    		if($result == true){
    			$this->add_flashdata(array('success'=>'Feedback send successfully'));
                header('location:'.$this->base_url.'home/');
                die();
    		}
    	}
    	$this->render_view('home/send_feedback','' ,$data);
    }

    public function ask_question(){
    	$data = array();
    	if(isset($_POST['add_question'])){
    		$result = $this->homemodel->add_question($_SESSION['user']['user_id']);
    		if($result == true){
    			$this->add_flashdata(array('success'=>'Question send successfully'));
                header('location:'.$this->base_url.'home/');
                die();
    		}
    	}
    	$this->render_view('home/ask_question','' ,$data);
    }

    public function add_missing_report(){
    	$data = array();	
        $adminModel = $this->model('AdminModel');
        if(isset($_POST['add_missing'])){
            if (($_FILES["missing_person_image"]["type"] == "image/jpeg" || $_FILES["missing_person_image"]["type"] == "image/jpg" || $_FILES["missing_person_image"]["type"] == "image/png") && $_FILES["missing_person_image"]["size"] < 2048000){
                $file_name = time().'_'.$_FILES["missing_person_image"]["name"];
                if(move_uploaded_file($_FILES["missing_person_image"]["tmp_name"] ,"./uploads/" .$file_name)){
                    $result = $adminModel->add_missing_person($file_name);
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
    	$this->render_view('home/add_missing_person','' ,$data);
    }

    public function hot_news(){
        $data = array();
        $result = $this->homemodel->get_all_news();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['newsArray'][] = $row;
            }
        }
        $this->render_view('home/hot_news','' ,$data);
    }

    public function most_wanted(){
        $data = array();
        $result = $this->homemodel->get_all_wanted_person();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['mostwantedArray'][] = $row;
            }
        }
        $this->render_view('home/most_wanted','' ,$data);
    }

    public function missing_person(){
        $data = array();
        $result = $this->homemodel->get_all_missing_person();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['missingArray'][] = $row;
            }
        }
        // $this->pr($data);
        $this->render_view('home/missing_persons','' ,$data);   
    }

    public function helpline(){
        $this->render_view('home/helpline','' ,'');
    }

    public function safety(){
        $data = array();
        $result = $this->homemodel->get_all_safety_tips();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['safetytipArray'][] = $row;
            }
        }
        // $this->pr($data);
        $this->render_view('home/safety','' ,$data);
    }

    public function faq(){
        $data = array();
        $result = $this->homemodel->get_all_faq();
        if($result->num_rows >0 ){
            while($row = $result->fetch_assoc()){
                $data['faqArray'][] = $row;
            }
        }
        // $this->pr($data);
        $this->render_view('home/faq','' ,$data);
    }

    public function send_message(){
        $data = array();
        $from = $_SESSION['user']['user_id'];
        $user_messages = $this->homemodel->get_user_messages($_SESSION['user']['user_id'],'2');
        if($user_messages->num_rows >0 ){
            while($row = $user_messages->fetch_assoc()){
                $data['usermessages'][] = $row;
            }
        }
        // $this->pr($data);
        if(isset($_POST['send']) && $_POST['send']!=''){
            $result = $this->homemodel->add_message($_SESSION['user']['user_id'],'2');
            $this->add_flashdata(array('success'=>'message sent successfully'));
            header('location:'.$this->base_url.'home/send_message/'.$to);
            die();
        }
        $this->render_view('home/user_message','' ,$data); 
    }

    public function get_complaint_answer(){
        $complaint_id = $_POST['id'];
        $result = $this->homemodel->get_complaint_by_id($complaint_id);
        if($result->num_rows >0 ){
            $data['complaintarray'] = $result->fetch_assoc();
            echo json_encode(array('status'=>'1','msg'=>'Answer get successfully','data' => $data['complaintarray']['complaint_reply']));
            die;
        }
            echo json_encode(array('status'=>'0','msg'=>'Somthing went wrong'));
            die;
    }

}
