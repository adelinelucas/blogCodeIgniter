<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Model {

    public function __construct(){
        parent::__construct();
        // on check si les infos de connexion sont connectée
        // cf dans la controller de login : $this->session->set_userdata('authenticated', '1');
        if($this->session->has_userdata('authenticated')) {

            if($this->session->userdata('authenticated') === '1'){
                // echo'you are user';
            }
        }else{
            $this->session->set_flashdata('status','Login First');
            redirect(base_url('login'));
        }  
    }

    public function check_isAdmin() {
        if($this->session->has_userdata('authenticated')){

            if($this->session->userdata('authenticated') != '2'){
                $this->session->set_flashdata('status','Access denied ! You are not admin');
                redirect(base_url('403'));
            }
        }else {
            $this->session->set_flashdata('status','Login First');
            redirect(base_url('login'));
        }
    }

    public function check_isUser() {
        if($this->session->has_userdata('authenticated')){

            if($this->session->userdata('authenticated') != '1'){
                $this->session->set_flashdata('status','Access denied ! You are not a user');
                redirect(base_url('403'));
            }
        }else {
            $this->session->set_flashdata('status','Login First');
            redirect(base_url('login'));
        }
    }
}
?>