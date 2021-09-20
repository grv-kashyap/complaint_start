<?php
class Controller {
    
    public $base_url = 'http://localhost/complaint/';
    
    protected function model($model) {

        if (file_exists('app/models/' . $model . '.php')) {
            require_once 'app/models/' . $model . '.php';
            return new $model;
        }

        return exit("Model doesn't exist");
    }

    
    public function view($view, $data = []) {
        if (file_exists('app/views/' . $view . '.php')) {

            require_once 'app/views/' . $view . '.php';
        }else{
            return exit("view doesn't exist");
        }
    }

    public function render_view($view,$template,$data){
        if($template==''){
            $this->view('templates/common/header',$data);
            $this->view($view,$data);
            $this->view('templates/common/footer',$data);
        }
        if($template=='admin'){
            $this->view('templates/admin/header',$data);
            $this->view('templates/admin/sidebar',$data);
            $this->view($view,$data);
            $this->view('templates/admin/footer',$data);
        }
    }

    public function pr($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }

    public function user_role(){
        if($_SESSION['user']['role_id']=='1'){
            $role = 'admin';
        }elseif($_SESSION['user']['role_id']=='2'){
            $role ='user';
        }else{
            $role ='guest';
        }
        return $role;
    }

    
    public function add_flashdata($message) {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = array();
        }
        $_SESSION['messages'] = $message;
    }
}
