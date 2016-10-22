<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('common_model');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        date_default_timezone_set('Asia/Calcutta'); // to set the time zone
    }

    /**
     * @agaile
     * date:13/10/2016
     * Parameter:none
     * Return type:
     * Description: This function is for checking user logged in 
     */
    public function index()
    {
        $this->check();
    }
    
	/**
     * @agaile
     * date:13/10/2016
     * Parameter:none
     * Return type:
     * Description:function to check whether the user is logged-in or not
     */
    public function check()
    {
        $logged_in = $this->session->userdata('loggedin');
        if ($logged_in == '1') {
            redirect(base_url('common'), 'refresh');
        } else {
            $this->load->view('login/login');
        }
    }

    /**
     * @agaile
     * date:13/10/2016
     * Parameter:username,password
     * Return type:
     * Description: This function is for login the users
     */
    public function login()
    {
        $this->form_validation->set_rules('username','User name','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        $username = strtolower($this->input->post("username"));
        $password = $this->input->post("password");

        if ($this->form_validation->run() == TRUE)
        {
            $result = $this->common_model->validate_login($username, $password);
            if($result)
            {
                redirect(base_url('common'), 'refresh');
            } else {
                $data['msg'] = '<div class="alert no-bg b-l-danger b-l-3 b-t-gray b-r-gray b-b-gray" role="alert"><strong class="text-white">Oh Snap! </strong><span class="text-gray-lighter">Change a few things up and try submitting again.</span></div>';
                $this->load->view('login/login',$data);
            }
        }else{
            $this->load->view('login/login');
        }
    }

    /**
     * @agaile
     * date:13/10/2016
     * Parameter:none
     * Return type:
     * Description: This function is for logout the users
     */
    public function logout()
    {
      $this->session->sess_destroy();
      redirect(base_url() . 'login', 'refresh');
  }
}