<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->view("template/header");
        $this->load->model('Common_model');
        $user_type = $this->session->userdata('user_type');
        $datamn['menu'] = $this->Common_model->get_menu($user_type);
        $datamn['menu_sub'] = $this->Common_model->get_sub($user_type);
        $this->load->view('template/frame',$datamn);
        /*$this->form_validation->set_error_delimiters('<div class="error">', '</div>');*/
        date_default_timezone_set('Asia/Calcutta'); // to set the time zone
    }

    public function index()
    {
        $this->check_type();
    }

    /**
     * @agaile
     * date:15/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to fill menu based on the usertype
     */
    public function check_type()
    {
        $this->load->view('template/dashboard');
        $this->load->view('template/footer');
    }

    /**
     * @agaile
     * date:15/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to load dashboard
     */
    public function dash()
    {
        $this->load->view('template/dashboard');
        $this->load->view('template/footer'); 
    }

    /**
     * @agaile
     * date:15/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to load dashboard
     */
    public function listmanager()
    {
        $data['records'] = $this->Common_model->getManagers();
        $this->load->view('admin/list_manager',$data);
        $this->load->view('template/footer'); 
    }    
    
}
