<?php

class UserModel extends Model {

	public $conn;

	public function __construct(){
		$this->conn = parent::__construct();

	}

    public function get_user_by_email($email){
    	$result = $this->conn ->query("select * from users where user_email = '".$email."'");
        if($result == true){
        	return $result;
        }else{
        	return $this->conn->error;
        }
    }

    public function saveuser($hash_password){
        $time_now = date('Y-m-d H:i:s');
        $result = $this->conn->query("insert into users set user_name = '$_POST[user_name]', user_email = '$_POST[user_email]', user_password = '$hash_password',user_status = '1', user_cretaed = '$time_now', user_profile_image = '',role_id= '2' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }

    public function update_password($password,$id){
        $time_now = date('Y-m-d H:i:s');
        $result = $this->conn->query("update users set user_password = '$password', user_updated = '$time_now' where user_id='$id' ");
        if($result == true){
            return $result;
        }else{
            return $this->conn->error;
        }
    }



}
