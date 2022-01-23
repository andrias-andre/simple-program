<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
	{
		parent::__construct();

			$this->load->model('model_home');

			$message  = $this->session->flashdata('infoLogin');

			$this->data = array(
				'message'  => $message
			);
	}

    public function index(){

		$data = $this->data;
        $this->load->view('vw_home',$data);

    }


    public function login(){

		if($this->input->method(TRUE) == 'POST'){

			$username      = $this->input->post('username',true);
			$password      = $this->input->post('password',true);

			$passwordDB    = $this->model_home->checkUsername($username);

			if($passwordDB != '' && password_verify($password,$passwordDB)){

                $this->session->set_userdata(['user_logged_program' => $username]);

				redirect('../dashboard');

            }else{

				$this->session->set_flashdata('infoLogin','Username / Password Not Match');
			
				redirect(site_url('../'));
            }


		}else{

			redirect(site_url('../'));
		
		}


	}

	public function logout(){

		$this->session->unset_userdata('user_logged_program');
        redirect(site_url('../'));

	}

}

?>