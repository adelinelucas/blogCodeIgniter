<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// séciruté pour éviter d'arriver directement sur cette page 

class AdminController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Authentication');
        // on vérifie grace au model authentification si on peut accéder à la page admin

        // on appelle la méthode check_isAdmin du Authentication controller
        $this->Authentication->check_isAdmin();
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('AdminPage');
        $this->load->view('template/footer');
    }
}