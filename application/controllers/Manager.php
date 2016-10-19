<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->view("template/header");
        $this->load->model('Common_model');
        $this->load->model('Manager_model');
        $user_type = $this->session->userdata('user_type');
        $datamn['menu'] = $this->Common_model->get_menu($user_type);
        $datamn['menu_sub'] = $this->Common_model->get_sub($user_type);
        $this->load->view('template/frame', $datamn);
        date_default_timezone_set('Asia/Calcutta'); // to set the time zone
    }

    /**
     * @
     * date:15/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to switch dash based on the usertype
     */
    public function staff()
    {
        $data['records'] = $this->Manager_model->getStaffs();
        $this->load->view('manager/list_staff', $data);
        $this->load->view('template/footer');
    }

}