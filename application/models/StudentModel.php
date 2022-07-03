<?php 

class StudentModel extends CI_Model {

    private function student_class(){
        return $stud_class = "Web dev"; 
    }

    public function student_data() {
        $student_name = 'Adeline Asticot';
        $studClass = $this->student_class();
        return $student_name . ' en cursus de ' . $studClass;
    }
    
    public function student_show($id) {
        if($id === '1') {
            return $result = "User 1";
        }elseif($id=== '2') {
            return $result = "User 2";
        }
    }

    public function demo(){
        $title = 'Je suis un titre venant du student Model';
        return $title;
    }
}

?>