<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// séciruté pour éviter d'arriver directement sur cette page 

class RegisterController extends CI_Controller {

    public function __construct(){
        // on charge bien le service nous permettant de vérifier nos forms.
        parent::__construct();

        // on vérifie si on a pas déja connecté une session, s'il y a une session, la page login/ register indiquer que l'utilisateur est déjà connecté et le renvoie vers la page userpage
        if($this->session->has_userdata('authenticated')){
            $this->session->set_flashdata('status', 'You are already logged in successfully! ');
            redirect(base_url('userpage'));
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }


    public function index () {
        $this->load->view('template/header.php');
        $this->load->view('auth/register.php');
        $this->load->view('template/footer.php');
    }

    public function register() {
        $this->form_validation->set_rules('first_name', 'First name', 'trim|required|alpha');
        $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

        // on peut ajouter un chiffrement de nos passwords avec md5
        // $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        // $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]|md5');

        if($this->form_validation->run() === FALSE){
            // failed
            $this->index();        
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );

            $register_user = new UserModel;
            $checking = $register_user->registerUser($data);

            // si l'insertion s'est bien passée
            if($checking){
                $this->session->set_flashdata('status', 'Register successfully! Now you can go to login! ');
                redirect(base_url('login'));
            }else {
                $this->session->set_flashdata('status', 'Register failed! Something went wrong!');
                redirect(base_url('register'));
            }
        }

    }
}