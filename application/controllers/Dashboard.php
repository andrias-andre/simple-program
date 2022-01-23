<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

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

    public function index(){

        $data = $this->data;
        $data['view']     = 'vw_dashboard';
        $this->load->view('vw_content',$data);

    }

    public function product(){

        $data = $this->data;
        $data['view']     = 'vw_product';
        $this->load->view('vw_content',$data);

    }

    public function company(){

        $data = $this->data;
        $data['view']     = 'vw_company';
        $this->load->view('vw_content',$data);

    }

    public function transaction(){

        $data = $this->data;
        $data['view']     = 'vw_transaction';
        $data['company']  = $this->model_dashboard->getListCompany();
        $data['product']  = $this->model_dashboard->getListProduct();
        $this->load->view('vw_content',$data);

    }

    public function reportproduct(){

        $data = $this->data;
        $data['view']     = 'vw_reportproduct';
        $this->load->view('vw_content',$data);

    }


    public function reportcompany(){

        $data = $this->data;
        $data['view']     = 'vw_reportcompany';
        $this->load->view('vw_content',$data);

    }


    public function reporttransaction(){

        $data = $this->data;
        $data['view']     = 'vw_reporttransaction';
        $this->load->view('vw_content',$data);

    }

}

?>