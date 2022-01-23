<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{

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

            $show  = $this->model_dashboard->getDataTransaction();

            echo json_encode($show);

        }

    }

    public function getLastDocNo(){

        if($this->input->method(TRUE) == 'POST'){

            $docno  = $this->model_dashboard->getLastDocumentNoTransaction();
            $csrf    = $this->security->get_csrf_hash();

            $result = array("docno"=>$docno,"csrf"=>$csrf);
            echo json_encode($result);

        }

    }


    public function save(){

        if($this->input->method(TRUE) == 'POST'){

            $docno     = $this->input->post('docno',true);
            $company   = $this->input->post('company',true);
            $type      = $this->input->post('type',true);
            $product   = $this->input->post('product',true);
            $qty       = $this->input->post('qty',true);
            $rate      = $this->input->post('rate',true);
            $gross     = $this->input->post('gross',true);
            $date      = $this->input->post('date',true);
            $data      = $this->data;
            $csrf      = $this->security->get_csrf_hash();

            $save    = $this->model_dashboard->saveDataTransaction($docno,$company,$type,$product,$qty,$rate,$gross,$date,$data['user']);
            $array   = array('info'=>$save,'csrf'=>$csrf,'duplicate'=>false);
            

            echo json_encode($array);

        }
    }


    public function edit(){

        if($this->input->method(TRUE) == 'POST'){

            $docno     = $this->input->post('docno',true);
            $company   = $this->input->post('company',true);
            $type      = $this->input->post('type',true);
            $product   = $this->input->post('product',true);
            $qty       = $this->input->post('qty',true);
            $rate      = $this->input->post('rate',true);
            $gross     = $this->input->post('gross',true);
            $date      = $this->input->post('date',true);
            $id        = $this->input->post('id',true);
            $data      = $this->data;
            $csrf      = $this->security->get_csrf_hash();

            $save    = $this->model_dashboard->editDataTransaction($docno,$company,$type,$product,$qty,$rate,$gross,$date,$data['user'],$id);
            $array   = array('info'=>$save,'csrf'=>$csrf,'duplicate'=>false);
            

            echo json_encode($array);

        }
    }


    public function delete(){

        if($this->input->method(TRUE) == 'POST'){

            $id      = $this->input->post('id',true);
            $data    = $this->data;
            $csrf    = $this->security->get_csrf_hash();

            $delete  = $this->model_dashboard->deleteData('transactions','id_transaction',$id);
            $array   = array('info'=>$delete,'csrf'=>$csrf);

            echo json_encode($array);

        }

    }



    public function day(){

        if($this->input->method(TRUE) == 'POST'){
            $csrf    = $this->security->get_csrf_hash();
            $data = $this->model_dashboard->totalTransactionDay($csrf);
            echo json_encode($data);

        }

    }

}

?>