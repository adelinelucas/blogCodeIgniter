<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeController extends CI_Controller {
    
    public function index(){
        $this->load->view('template/header');
        // récupérer les datas
        $this->load->model('EmployeeModel', 'emp');
        // on récupère nos données dans un tableau data[employee]
        $data['employee'] = $this->emp->getEmployee();
        // on passe les datas à la vue que l'on doit appeler
        $this->load->view('FrontEnd/employee',$data);
        $this->load->view('template/footer');


        // autre synthaxe 
        //$employee = $this->emp->getEmployee();
        //$this->load->view('FrontEnd/employee',['employee' =>$employee])
       
    }

    public function create() {
        $this->load->view('template/header');
        $this->load->view('FrontEnd/createEmployee');
        $this->load->view('template/footer');
    }

    public function store() {

        $this->form_validation->set_rules('first_name','first name', 'required');
        $this->form_validation->set_rules('last_name','last name', 'required');
        $this->form_validation->set_rules('phone','phone', 'required');
        $this->form_validation->set_rules('email','email', 'required');

        if($this->form_validation->run()){
            $data = [
                'first_name'=> $this->input->post('first_name'),
                'last_name'=> $this->input->post('last_name'),
                'phone'=> $this->input->post('phone'),
                'email'=> $this->input->post('email')
            ];

            $this->load->model('EmployeeModel', 'emp');
            $this->emp->insertEmployee($data);
            $this->session->set_flashdata('status','Employee data inserted Successfully' );
            redirect(base_url('employee'));
        }else {
            // redireger vers la page souhaitée 2 methode
            $this->create();
            //redirect(base_url('employee/add'));
        }
        // var_dump($data); 
    }

    public function edit($id) {

        $this->load->model('EmployeeModel', 'emp');
        $employee = $this->emp->editEmployee($id);
        $this->load->view('template/header');
        $this->load->view('FrontEnd/editEmployee', ['employee' => $employee]);
        $this->load->view('template/footer');
    }

    public function update($id) {

        $this->form_validation->set_rules('first_name','first name', 'required');
        $this->form_validation->set_rules('last_name','last name', 'required');
        $this->form_validation->set_rules('phone','phone', 'required');
        $this->form_validation->set_rules('email','email', 'required');

        if($this->form_validation->run()) {
        // on récupère la valeur des inputs dans un array data
            $data = [
                'first_name'=> $this->input->post('first_name'),
                'last_name'=> $this->input->post('last_name'),
                'phone'=> $this->input->post('phone'),
                'email'=> $this->input->post('email')
            ];

            $this->load->model('EmployeeModel', 'emp');
            $data = $this->emp->updateEmployee($data, $id);
            $this->session->set_flashdata('status','Employee data updated successfully' );
            redirect(base_url('employee'));
        }else {
            $this->edit($id);
        }
    }

    public function delete($id) {
        $this->load->model('EmployeeModel', 'emp');
        $this->emp->deleteEmployee($id);
        $this->session->set_flashdata('status','Employee data updated successfully' );
        redirect(base_url('employee'));
    }

    public function confirmDelete($id) {
        $this->load->model('EmployeeModel', 'emp');
        $this->emp->deleteEmployee($id);
        redirect(base_url('employee'));
    }
}

?>