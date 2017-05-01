<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->view("template/header");
        $this->load->model('Common_model');        
        $this->load->model('Staff_model');
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
    /**
     * @
     * date:22/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to list the exhibitors
     */
    public function list_exhi()
    {
        $id = $this->session->userdata('user_id');        
        $data['gender'] = $this->Common_model->getGender();        
        $data['records'] = $this->Staff_model->list_exhi($id);
        $this->load->view('staff/list_exhi',$data);
        $this->load->view('template/footer');
    }
    /**
     * @
     * date:22/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to add exhibitors
     */
    public function add_exhibitor()
    {
        $this->form_validation->set_rules('strnameA', 'Name', 'trim|required');
        $this->form_validation->set_rules('strusernameA', 'Username', 'trim|required');
        $this->form_validation->set_rules('strgenderA', 'Gender', 'trim|required');
        $this->form_validation->set_rules('strageA', 'Age', 'trim|required|numeric');
        $this->form_validation->set_rules('strhnameA', 'House Name', 'trim|required');
        $this->form_validation->set_rules('strsnameA', 'Street Name', 'trim|required');
        $this->form_validation->set_rules('strcityA', 'City', 'trim|required');
        $this->form_validation->set_rules('strstateA', 'State', 'trim|required');
        $this->form_validation->set_rules('strpincA', 'Pincode', 'trim|required|numeric');
        $this->form_validation->set_rules('stremailA', 'Email', 'trim|required');
        $this->form_validation->set_rules('strmobileA', 'Mobile', 'trim|required|numeric');
        if ($this->form_validation->run() == TRUE) {
            $data = array('user_name' =>$this->input->post("strusernameA"),'password' =>"ZGVtbw==",'name' =>$this->input->post("strnameA"),'gender' => $this->input->post("strgenderA"),'age' =>$this->input->post("strageA"),'housename' =>$this->input->post("strhnameA"),'streetname' => $this->input->post("strsnameA"),'city' =>$this->input->post("strcityA"),'state' =>$this->input->post("strstateA"),'pincode' => $this->input->post("strpincA"),'email' =>$this->input->post("stremailA"),'mobile' =>$this->input->post("strmobileA"),'type' =>5,'parent_id' =>$this->session->userdata('user_id'),'status' =>3);
            $result = $this->Staff_model->add_exhibitor($data);
            if($result==true){
                $this->session->set_flashdata('success', 'Exhibitor '. $this->input->post("strnameA") . ' successfully added ');
                redirect('Staff/list_exhi', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Exhibitor not added.');
                redirect('Staff/list_exhi', 'refresh');
            }
        }
    }
    /**
     * @
     * date:22/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to update exhibitors
     */ 
    public function update_exhibitor(){
        $this->form_validation->set_rules('strname', 'Name', 'trim|required');
        $this->form_validation->set_rules('strusername', 'Username', 'trim|required');
        $this->form_validation->set_rules('strgender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('strage', 'Age', 'trim|required|numeric');
        $this->form_validation->set_rules('strhname', 'House Name', 'trim|required');
        $this->form_validation->set_rules('strsname', 'Street Name', 'trim|required');
        $this->form_validation->set_rules('strcity', 'City', 'trim|required');
        $this->form_validation->set_rules('strstate', 'State', 'trim|required');
        $this->form_validation->set_rules('strpinc', 'Pincode', 'trim|required|numeric');
        $this->form_validation->set_rules('stremail', 'Email', 'trim|required');
        $this->form_validation->set_rules('strmobile', 'Mobile', 'trim|required|numeric');
        if ($this->form_validation->run() == TRUE) {
            $id= $this->input->post('userId');               
            $data = array('user_name' =>$this->input->post("strusername"),'name' =>$this->input->post("strname"),'gender' => $this->input->post("strgender"),'age' =>$this->input->post("strage"),'housename' =>$this->input->post("strhname"),'streetname' => $this->input->post("strsname"),'city' =>$this->input->post("strcity"),'state' =>$this->input->post("strstate"),'pincode' => $this->input->post("strpinc"),'email' =>$this->input->post("stremail"),'mobile' =>$this->input->post("strmobile"));
            $result = $this->Staff_model->update_exhibitor($id,$data);
            if($result==true){
                $this->session->set_flashdata('success', 'Exhibitor '. $this->input->post("strnameA") . ' successfully updated ');
                redirect('Staff/list_exhi', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Exhibitor Details not updated.');
                redirect('Staff/list_exhi', 'refresh');
            }
        }        
    } 
    /**
     * @
     * date:22/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to delete exhibitors
     */ 
    public function delete_exhibitor()
    {
        $id= $this->input->post('id');
        $result=$this->Staff_model->delete_exhibitor($id);
        if($this->Staff_model->count_exhibitor_id($id)==0){
            $this->session->set_flashdata('success','Exhibitor details successfully deleted ');
        }else{
            $this->session->set_flashdata('error', 'Exhibitor deletion failed.');
        }
    }
    /**
     * @
     * date:22/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to list booths
     */ 
    public function ListStaffBooth()
    {
        $id = $this->session->userdata('user_id');        
        $data['records'] = $this->Staff_model->ListStaffBooth($id);
        $this->load->view('staff/list_staffbooth',$data);
        $this->load->view('template/footer');
    }        
}