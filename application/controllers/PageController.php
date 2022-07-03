<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// séciruté pour éviter d'arriver directement sur cette page 

class PageController extends CI_Controller {

    public function accesDenied(){
        $this->load->view('template/header');
        $this->load->view('errors/403');
        $this->load->view('template/footer');
    }

    public function index() {
        echo 'I am index methode at page controller - Home in url'; 
    }

    public function aboutUs(){
        echo 'I am about page';
    }

    public function blog($id = '' ){
        // echo "$id";
        $this->load->view('blogview');
    }
    
    public function blogEdit($param = ''){
        $this->load->view('blogview');
    }

    public function demoPage(){
        // on charge les données qui nous sont envoyées de StudentModel.php

        $this->load->model('StudentModel');
        // puis je stock dans ma data la data renvoyée par fonction demo du model StudentModel
        $data['title'] = $this->StudentModel->demo();
        //$data['title'] = "Hello I'am sutdent in web dev";
        $data['body'] = "first projet in code iginiter";
        $this->load->view('demo', $data);
    }

    public function userPage(){
        $this->load->view('template/header');
        $this->load->view('userPage');
        $this->load->view('template/footer');
    }
}