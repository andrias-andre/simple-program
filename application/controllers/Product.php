<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{

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

            $show  = $this->model_dashboard->getDataProduct();

            echo json_encode($show);

        }

    }


    public function save(){

        if($this->input->method(TRUE) == 'POST'){

            $code    = $this->input->post('code',true);
            $name    = $this->input->post('name',true);
            $buying  = $this->input->post('buying',true);
            $selling = $this->input->post('selling',true);
            $data    = $this->data;
            $csrf    = $this->security->get_csrf_hash();

            $duplicate = $this->model_dashboard->checkDuplicateData('products','code',$code);

            if($duplicate > 0){
                $array = array('info'=>false,'csrf'=>$csrf,'duplicate'=>true);
            }else{
                $save    = $this->model_dashboard->saveDataProduct($code,$name,$buying,$selling,$data['user']);
                $array   = array('info'=>$save,'csrf'=>$csrf,'duplicate'=>false);
            }

            echo json_encode($array);

        }
    }


    public function edit(){

        if($this->input->method(TRUE) == 'POST'){

            $code    = $this->input->post('code',true);
            $name    = $this->input->post('name',true);
            $buying  = $this->input->post('buying',true);
            $selling = $this->input->post('selling',true);
            $original = $this->input->post('original',true);
            $id      = $this->input->post('id',true);
            $data    = $this->data;
            $csrf    = $this->security->get_csrf_hash();

            
            if(trim(strtolower($original)) == trim(strtolower($code))){
                $duplicate = 0;
            }else{
                $duplicate = $this->model_dashboard->checkDuplicateData('products','code',$code);
            }


            if($duplicate > 0){
                $array = array('info'=>false,'csrf'=>$csrf,'duplicate'=>true);
            }else{
                $edit    = $this->model_dashboard->editDataProduct($code,$name,$buying,$selling,$data['user'],$id);
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

            $delete  = $this->model_dashboard->deleteData('products','id_product',$id);
            $array   = array('info'=>$delete,'csrf'=>$csrf);

            echo json_encode($array);

        }

    }


    public function price(){

        if($this->input->method(TRUE) == 'POST'){

            $id      = $this->input->post('id',true);
            $type    = strtolower($this->input->post('type',true));
            $data    = $this->data;
            $csrf    = $this->security->get_csrf_hash();

            $array   = $this->model_dashboard->getPriceProduct($id,$type);
            $result  = array('price'=>$array['price'],'csrf'=>$csrf,'typePrice'=>$array['typePrice']);

            echo json_encode($result);

        }


    }

}

?>