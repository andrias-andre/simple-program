<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller{

    function __construct(){

        parent::__construct();

        $this->load->model('model_dashboard');
        $this->load->model('model_home');

        $user     = $this->session->userdata('user_logged_program');
        $message  = $this->session->flashdata('infoMessage');

        $this->data = array(
            'user'    => $user,
            'message' => $message
        );

        if($this->model_home->isNotLogin()) redirect(site_url('../'));

    }


    public function show(){

        if($this->input->method(TRUE) == 'GET'){

            $show  = $this->model_dashboard->getDataCompany();

            echo json_encode($show);

        }

    }


    public function save(){

        if($this->input->method(TRUE) == 'POST'){

            $code    = $this->input->post('code',true);
            $name    = $this->input->post('name',true);
            $telp    = $this->input->post('telp',true);
            $mobile  = $this->input->post('mobile',true);
            $address = $this->input->post('address',true);
            $email   = $this->input->post('email',true);
            $contact = $this->input->post('contact',true);
            $data    = $this->data;
            $csrf    = $this->security->get_csrf_hash();


            $duplicate = $this->model_dashboard->checkDuplicateData('companys','code',$code);

            if($duplicate > 0){
                $array = array('info'=>false,'csrf'=>$csrf,'duplicate'=>true);
            }else{
                $save    = $this->model_dashboard->saveDataCompany($code,$name,$telp,$mobile,$address,$email,$contact,$data['user']);
                $array   = array('info'=>$save,'csrf'=>$csrf,'duplicate'=>false);
            }

            echo json_encode($array);

        }
    }


    public function edit(){

        if($this->input->method(TRUE) == 'POST'){

            $code    = $this->input->post('code',true);
            $name    = $this->input->post('name',true);
            $telp  = $this->input->post('telp',true);
            $mobile  = $this->input->post('mobile',true);
            $email   = $this->input->post('email',true);
            $contact = $this->input->post('contact',true);
            $address = $this->input->post('address',true);
            $id      = $this->input->post('id',true);
            $original = $this->input->post('original',true);
            $data    = $this->data;
            $csrf    = $this->security->get_csrf_hash();


            if(trim(strtolower($original)) == trim(strtolower($code))){
                $duplicate = 0;
            }else{
                $duplicate = $this->model_dashboard->checkDuplicateData('companys','code',$code);
            }

            if($duplicate > 0){
                $array = array('info'=>false,'csrf'=>$csrf,'duplicate'=>true);
            }else{
                $edit    = $this->model_dashboard->editDataCompany($code,$name,$telp, $mobile, $email, $contact, $address,$data['user'],$id);
                $array   = array('info'=>$edit,'csrf'=>$csrf,'duplicate'=>false);
            }

            echo json_encode($array);

        }
    }

    public function delete(){

        if($this->input->method(TRUE) == 'POST'){

            $id      = $this->input->post('id',true);
            $data    = $this->data;
            $csrf    = $this->security->get_csrf_hash();

            $delete  = $this->model_dashboard->deleteData('companys','id_company',$id);
            $array   = array('info'=>$delete,'csrf'=>$csrf);

            echo json_encode($array);

        }

    }

}

?>