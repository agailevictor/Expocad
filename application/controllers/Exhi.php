<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exhi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->view("template/header");
        $this->load->model('Common_model');        
        $this->load->model('Exhi_model');
        $user_type = $this->session->userdata('user_type');
        $datamn['menu'] = $this->Common_model->get_menu($user_type);
        $datamn['menu_sub'] = $this->Common_model->get_sub($user_type);
        $this->load->view('template/frame',$datamn);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error" style="color: #D8000C">', '</div>');        
        date_default_timezone_set('Asia/Calcutta'); // to set the time zone
    }

    public function index()
    {
        $this->check_type();
    }
    public function ListBooth(){
        $id = $this->session->userdata('user_id');        
        $data['records'] = $this->Exhi_model->ListBooth($id);
        $this->load->view('Exhi/eBooth',$data);
        $this->load->view('template/footer');        
    }
    public function req_booth(){
        $id= $this->input->post('bId'); 
        $user_id = $this->session->userdata('user_id');        
        $result=$this->Exhi_model->req_booth($id,$user_id);
        if($result == true){
            $this->session->set_flashdata('success','Booth requested successfully ');
            redirect('Exhi/ListBooth', 'refresh');            
        }else{
            $this->session->set_flashdata('error', 'Booth request failed.');
            redirect('Exhi/ListBooth', 'refresh');            
        }
    }
    public function ListProducts(){
      $id = $this->session->userdata('user_id');        
      $data['records'] = $this->Exhi_model->ListProducts($id);
      $this->load->view('Exhi/eProducts',$data);
      $this->load->view('template/footer');      
  }
}