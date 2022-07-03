<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// séciruté pour éviter d'arriver directement sur cette page 

class UserController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Authentication');
        // on vérifie grace au model authentification si on peut accéder à la page user
        $this->Authentication->check_isUser();
    }
    
    public function index() {
        $this->load->view('template/header');
        $this->load->view('userPage');
        $this->load->view('template/footer');
    }
}