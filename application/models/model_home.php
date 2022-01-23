<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_home extends CI_Model {

    function checkusername($username){

        $this->db->select('username, password');
        $this->db->from('users');
        $this->db->where('username',$username);
        $get = $this->db->get();
        

        if($get->num_rows() == 1){
            $array    = $get->row_array();
            $password = $array['password'];
        }else{
            $password = '';
        }

        return $password;

    }


    public function isNotLogin(){
        return $this->session->userdata('user_logged_program') === null;
    }

}

?>