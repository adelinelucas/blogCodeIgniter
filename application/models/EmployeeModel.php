<?php 

class EmployeeModel extends CI_Model {
    public function insertEmployee($data) {
        return $this->db->insert('employee', $data);
    }

    public function getEmployee() {
        $query = $this->db->get('employee');
        return $query->result();
    }

    public function editEmployee($id) {
       $query = $this->db->get_where('employee', ['id'=> $id]);
       return $query->row();
       // si on veut renvoyer les éléments sous forme de table 
       //return $query->row_array(); 
    }

    public function updateEmployee($data, $id) {
        return $this->db->update('employee', $data, ['id'=> $id]); 
    }

    public function deleteEmployee($id) {
        return $this->db->delete('employee', ['id' => $id]);
    }
}