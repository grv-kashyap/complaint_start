<?php

class Page extends Controller{

    public function index($name = '',$age = '') {

        $user = $this->model('User');
        $user->name = $name;
        $user->age = $age;
        
        $this->view('page/index', ['name' => $user->name,'age' => $user->age]);
    }

}
