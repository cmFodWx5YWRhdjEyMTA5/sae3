<?php 
class Login_model extends CI_model{

    public function __construct(){
        parent::__construct();
    }

    public function login($data){
        $query = $this->db->get_where('usuarios', array('codigo' => $data['codigo']));
        if($query->num_rows() == 1){
            $row=$query->row();
            if(base64_encode($data['password']) == $row->password){
                $key = $row->id;
            }
        }
        return $key = $key ?? 0;
    }

    public function login_data($id){
        return $this->db->get_where('usuarios', array('id' => $id));   
    }

    public function recovery_verifica($codigo){
        $query = $this->db->get_where('usuarios', array('codigo' => $codigo));
        if($query->num_rows() == 1){
            $row=$query->row();
            $key = $row->id;
        }
        return $key = $key ?? 0;
    }   

}