<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// séciruté pour éviter d'arriver directement sur cette page 

class LogoutController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Authentication');
        // on vérifie grace au model authentification si on peut accéder à la page user
    }

    public function logout() {
        // on vide la session 
        $this->session->unset_userdata('authenticated');
        $this->session->unset_userdata('auth_user');

        $this->session->set_flashdata('status', 'You are logged out successfully!');
        redirect(base_url('login'));
    }
}