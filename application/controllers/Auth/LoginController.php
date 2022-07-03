<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// séciruté pour éviter d'arriver directement sur cette page 

class LoginController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         // on vérifie si on a pas déja connecté une session, s'il y a une session, la page login/ register indiquer que l'utilisateur est déjà connecté et le renvoie vers la page userpage
        if($this->session->has_userdata('authenticated')){
            $this->session->set_flashdata('status', 'You are already logged in successfully! ');
            redirect(base_url('userpage'));
        }
        $this->load->helper('form'); // permet de gérer le message d'erreur sur l'input dans la view
        $this->load->library('form_validation'); // permet de gérer les controles des inputs
        $this->load->model('UserModel');
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('auth/login');
        $this->load->view('template/footer');
    }

    public function login() {
        $this->form_validation->set_rules('email_id', 'Email adress', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if( $this->form_validation->run() === FALSE){
            //failed
            $this->index();
        }else{
            $data = [
                'email'=> $this->input->post('email_id'),
                'password' => $this->input->post('password'),
            ];
            $user = new UserModel;

            $result = $user->loginUser($data);
            if($result != FALSE){

                $auth_userdetails = [
                    'first_name' => $result->first_name ,
                    'last_name' => $result->last_name ,
                    'email' => $result->email ,
                    
                ];
                // 1 -- user // 2 -- admin
                $this->session->set_userdata('authenticated', $result->role_as);
                $this->session->set_userdata('auth_user', $auth_userdetails);
                $this->session->set_flashdata('status', 'You are logged in successfully! ');
                redirect(base_url('userpage'));
            }else {
                $this->session->set_flashdata('status', 'Invalid Email Id or Password');
                redirect(base_url('login'));
            }

        }
    }
}