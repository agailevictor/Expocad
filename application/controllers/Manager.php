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
        $id = $this->session->userdata('user_id');
        $data['gender'] = $this->Common_model->getGender();
        $data['records'] = $this->Manager_model->getStaffs($id);
        $this->load->view('manager/list_staff', $data);
        $this->load->view('template/footer');
    }

    /**
     * @
     * date:16/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to load booth list
     */
    public function listbooth()
    {
        $id = $this->session->userdata('user_id');
        $data['records'] = $this->Manager_model->getbooths_under($id);
        $this->load->view('manager/list_booth',$data);
        $this->load->view('template/footer');
    }

    /**
     * @
     * date:23/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to load booth list and allocate staff
     */
    public function allocate_staff()
    {
        $id = $this->session->userdata('user_id');
        $data['staffs'] = $this->Manager_model->getstaffs_under($id);        
        $data['records'] = $this->Manager_model->getbooths_under($id);
        $this->load->view('manager/alloc_booth',$data);
        $this->load->view('template/footer');
    }

    /**
     * @
     * date:23/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to load the request for booth
     */
    public function request()
    {
        $id = $this->session->userdata('user_id');
        $data['records'] = $this->Manager_model->get_approvebooth($id);
        $this->load->view('manager/list_appbooth',$data);
        $this->load->view('template/footer');
    }

    /**
     * @
     * date:23/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to load the request for booth
     */
    public function add_staff()
    {
        $this->form_validation->set_rules('strnameA', 'Staff Name', 'trim|required');
        $this->form_validation->set_rules('strusernameA', 'User Name', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('strgenderA', 'Gender', 'trim|required');
        $this->form_validation->set_rules('strageA', 'Age', 'trim|required|numeric');
        $this->form_validation->set_rules('strhnameA', 'House Name', 'trim|required');
        $this->form_validation->set_rules('strsnameA', 'Street Name', 'trim|required');
        $this->form_validation->set_rules('strcityA', 'City', 'trim|required');
        $this->form_validation->set_rules('strstateA', 'State', 'trim|required');
        $this->form_validation->set_rules('strpincA', 'Pincode', 'trim|required');
        $this->form_validation->set_rules('stremailA', 'Email', 'trim|required');
        $this->form_validation->set_rules('strmobileA', 'Mobile', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $data = array('user_name' =>$this->input->post("strusernameA"),'password' =>"ZGVtbw==",'name' =>$this->input->post("strnameA"),'gender' => $this->input->post("strgenderA"),'age' =>$this->input->post("strageA"),'housename' =>$this->input->post("strhnameA"),'streetname' => $this->input->post("strsnameA"),'city' =>$this->input->post("strcityA"),'state' =>$this->input->post("strstateA"),'pincode' => $this->input->post("strpincA"),'email' =>$this->input->post("stremailA"),'mobile' =>$this->input->post("strmobileA"),'type' =>3,'parent_id' =>$this->session->userdata('user_id'),'status' =>1);
            $result = $this->Manager_model->add_staff($data);
            if($result==true){
                $this->session->set_flashdata('success', 'Staff '. $this->input->post("strnameA") . ' successfully added ');
                redirect('manager/staff', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Staff not added.');
                redirect('manager/staff', 'refresh');
            }
        }
    }

    /**
     * @
     * date:23/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to load the request for booth
     */
    public function update_staff(){
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
            $result = $this->Manager_model->update_staff($id,$data);
            if($result==true){
                $this->session->set_flashdata('success', 'Staff '. $this->input->post("strnameA") . ' successfully updated ');
                redirect('manager/staff', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Staff Details not updated.');
                redirect('manager/staff', 'refresh');
            }
        }
    }

    /**
     * @
     * date:05/01/2017
     * Parameter:none
     * Return type:none
     * Description:function to delete manager
     */
    public function delete_staff(){
        $id= $this->input->post('id');
        if($id) {
            $result = $this->Manager_model->delete_staff($id);
            if ($result == true) {
                $this->session->set_flashdata('success', 'Staff details successfully deleted ');
            } else {
                $this->session->set_flashdata('error', 'Staff deletion failed.');
            }
        }
    }

    /**
     * @
     * date:05/01/2017
     * Parameter:none
     * Return type:none
     * Description:function to delete manager
     */
    public function alloc_booth_staff(){
        $this->form_validation->set_rules('strname', 'Booth name', 'trim|required');
        $this->form_validation->set_rules('strspace', 'Space', 'trim|required');
        $this->form_validation->set_rules('stramount', 'Amount', 'trim|required');
        $this->form_validation->set_rules('strstaff', 'Staff', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $id= $this->input->post('bId');
            $data = array('strstaff_id' =>$this->input->post("strstaff"));
            $result = $this->Manager_model->alloc_booth_staff($id,$data);
            if($result==true){
                $this->session->set_flashdata('success', 'Booth '. $this->input->post("strname") . ' successfully allocated ');
                redirect('manager/allocate_staff', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Booth allocation failed.');
                redirect('manager/allocate_staff', 'refresh');
            }
        }
    }

}