<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {
    public function index()
    {
        $this->load->model('StudentModel', 'stud'); // on crée un raccroucie rennomant studentModel => stud

        // methode A on appel la classe et la fonction
        // $student = $this->StudentModel->student_data();

        // instanciantion d'un nouvelle object puis on appelle la fonction
        // $student = new StudentModel; 
        // $student = $student->student_data();

        // on a créer le shortcut stud on peut désormais l'utiliser à la place StudentModel
        $student = $this->stud->student_data();
        echo "student name: " . $student;
    
    }

    public function show($id){
        $this->load->model('StudentModel', 'stud');
        $select_stud = $this->stud->student_show($id);
        echo $select_stud;
    }
}