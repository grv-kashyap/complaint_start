<?php

class User extends Controller {

    public $usermodel;

    public function __construct(){
        $this->usermodel = $this->model("UserModel");
        return $this->usermodel;
    }

    public function index(){
        // $this->pr($_SESSION);
        if(isset($_SESSION['user']) && count($_SESSION['user'])>0 ){
            if($_SESSION['user']['role_id']=='1'){
                header('location:'.$this->base_url.'admin');   
            }else{
                header('location:'.$this->base_url.'home');   
            }
        }
        $this->login();
    }

    public function login() {
        if(isset($_SESSION['user']) && count($_SESSION['user'])>0 ){
            if($_SESSION['user']['role_id']=='1'){
                header('location:'.$this->base_url.'admin');   
            }else{
                header('location:'.$this->base_url.'home');   
            }
        }
        $this->render_view('user/login','' ,'');
    }

    public function logout() {
        if(isset($_SESSION['user']) && count($_SESSION['user'])>0 ){
            if($_SESSION['user']['role_id']=='1'){
                header('location:'.$this->base_url.'admin');   
            }else{
                header('location:'.$this->base_url.'home');   
            }
        }
        session_destroy();
        header('location:'.$this->base_url.'home');
    }

    public function signup() {
        if(isset($_SESSION['user']) && count($_SESSION['user']) ){
            if($_SESSION['user']['role_id']=='1'){
                header('location:'.$this->base_url.'admin');   
            }else{
                header('location:'.$this->base_url.'home');   
            }
        }
        $this->render_view('user/signup','' ,['name' => 'gaurav','age' => '23']);
    }

    public function chklogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = $this->usermodel->get_user_by_email($email);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            if(md5($password) == $row['user_password']){
               $_SESSION['user'] = $row;
               if($row['role_id'] == '1'){
                    die('1'); 
                }
                if($row['role_id'] == '2'){
                    die('2'); 
                }
            }else{
                die('invalid password');
            }
        }else{
            die('0');
        }
    }

    public function chkuser(){
        $email = $_POST['user_email'];
        $userArray = $this->usermodel->get_user_by_email($email);
        // $this
        if($userArray->num_rows>0){
            echo 'false';
        }else{
            echo 'true';
        }
    }

    public function save(){
        $password = $_POST['password'];
        // $hash_password = password_hash($password,PASSWORD_DEFAULT);
        $hash_password = md5($password);
        $result = $this->usermodel->saveuser($hash_password);
        if($result == 'true'){
            die('1');
        }else{
            die($result);
        }
    }

    public function change_password(){
        if(!isset($_SESSION['user'])){
            header('location:'.$this->base_url.'user');
        }
        if(isset($_SESSION['user'])){
            $role = $this->user_role();
            if($role=='admin'){
                $this->render_view('admin/change_password','admin' ,'');
            }else{
                $this->render_view('user/change_password','' ,'');
            }
        }
    }

    public function chkpassword(){
        $password = $_POST['old_password'];
        if(md5($password)== $_SESSION['user']['user_password']){
             echo 'true'; 
        }else{
            echo 'false';
        }
        
    }

    public function update_password(){
        if(!isset($_SESSION['user'])){
            header('location:'.$this->base_url.'user');
        }

        if(isset($_SESSION['user'])){
            $new_password = md5($_POST['new_password']);
            $result = $this->usermodel->update_password($new_password,$_SESSION['user']['user_id']);
            if($result == 'true'){
                die('1');
            }else{
                die($result);
            }
        }
    }

}
