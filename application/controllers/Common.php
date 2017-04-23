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
     * date:15/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to switch dash based on the usertype
     */
    public function check_type()
    {
        $this->load->view('template/dashboard');
        $this->load->view('template/footer');
    }

    /**
     * @
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
     * @
     * date:16/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to load booth list
     */
    public function listbooth()
    {
        $data['records'] = $this->Common_model->getbooths();
        $this->load->view('admin/list_booth',$data);
        $this->load->view('template/footer'); 
    }    
    /**
     * @
     * date:04/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to update booth
     */
    public function update_booth(){
        $this->form_validation->set_rules('strbname', 'Booth Name', 'trim|required');
        $this->form_validation->set_rules('strspace', 'Space', 'trim|required|numeric');
        $this->form_validation->set_rules('stramount', 'Amount', 'trim|required|numeric');
        if ($this->form_validation->run() == TRUE) {
            $id= $this->input->post('bId'); 
            $data = array('bname' =>$this->input->post("strbname"),'space' =>$this->input->post("strspace"),'amount' => $this->input->post("stramount"));
            $result = $this->Common_model->update_booth($id,$data);
            if($result==true){
                $this->session->set_flashdata('success', 'Booth '. $this->input->post("strbnameA") . ' successfully updated ');
                redirect('common/listbooth', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Booth not updated.');
                redirect('common/listbooth', 'refresh');
            }
        }
    }
    /**
     * @
     * date:02/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to delete booth
     */
    public function delete_booth(){
        $id= $this->input->post('id');
        $result=$this->Common_model->delete_booth($id);
        if($this->Common_model->count_booth_id($id)==0){
            $this->session->set_flashdata('success','Booth details successfully deleted ');
        }else{
            $this->session->set_flashdata('error', 'Booth deletion failed.');
        }
    } 

    /**
     * @
     * date:16/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to allocate booth to managers
     */
    public function allocatebooth()
    {
        $data['manager'] = $this->Common_model->getM_notassigned();        
        $data['record'] = $this->Common_model->allbooth();
        $this->load->view('admin/allocate_booth',$data);
        $this->load->view('template/footer'); 
    } 
    /**
     * @
     * date:20/04/2016
     * Parameter:none
     * Return type:none
     * Description:function to allocate managers of booth
     */
    public function allocate_booths()
    {
        $this->form_validation->set_rules('strmanag', 'Manager Name', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $id= $this->input->post('bId'); 
            $manager = $this->input->post("strmanag");
            $result = $this->Common_model->allocate_booths($id,$manager);
            if($result==true){
                $this->session->set_flashdata('success', 'Booth '. $this->input->post("strbnameA") . ' successfully Allocated ');
                redirect('common/allocatebooth', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Booth not Allocated.');
                redirect('common/allocatebooth', 'refresh');
            }
        }
    }

    /**
     * @
     * date:22/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to get exhibitor list
     */
    public function approveexhibitor()
    {
        $data['records'] = $this->Common_model->getExhi();
        $this->load->view('admin/list_exhibitor',$data);
        $this->load->view('template/footer'); 
    }

    /**
     * @
     * date:22/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to get sponsor list
     */
    public function list_sponsor()
    {
        $data['records'] = $this->Common_model->getspo();
        $this->load->view('admin/list_spo',$data);
        $this->load->view('template/footer'); 
    }  

    /**
     * @
     * date:22/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to add new booth
     */
    public function add_booth()
    {
        $this->form_validation->set_rules('strbnameA', 'Booth Name', 'trim|required|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('strspaceA', 'Space', 'trim|required|numeric');
        $this->form_validation->set_rules('stramountA', 'Amount', 'trim|required|numeric');
        if ($this->form_validation->run() == TRUE) {
            $data = array('bname' =>$this->input->post("strbnameA"),'space' =>$this->input->post("strspaceA"),'amount' => $this->input->post("stramountA"), 'staffid' => 0,'is_all' => 'N');
            $result = $this->Common_model->add_booth($data);
            if($result==true){
                $this->session->set_flashdata('success', 'Booth '. $this->input->post("strbnameA") . ' successfully added ');
                redirect('common/listbooth', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Booth not added.');
                redirect('common/listbooth', 'refresh');
            }
        }
    }

    /**
     * @
     * date:23/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get request list
     */
    public function get_approvebooth()
    {
        $data['records'] = $this->Common_model->get_approvebooth();
        $this->load->view('admin/list_appbooth',$data);
        $this->load->view('template/footer'); 
    } 
    /**
     * @
     * date:20/04/2017
     * Parameter:none
     * Return type:array
     * Description:function to approve the booth request
     */
    public function approvebooth()
    {
        $id= $this->input->post('id');
        $result=$this->Common_model->approvebooth($id);
        if($result==true){
            $this->session->set_flashdata('success', 'Booth request Approved. ');
            redirect('common/get_approvebooth', 'refresh');
        }else{
            $this->session->set_flashdata('error', 'Exception Occured');
            redirect('common/get_approvebooth', 'refresh');
        }
    }

    /**
     * @
     * date:20/04/2017
     * Parameter:none
     * Return type:array
     * Description:function to reject the booth request
     */
    public function rejectbooth()
    {
        $id= $this->input->post('id');
        $result=$this->Common_model->rejectbooth($id);
        if($result==true){
            $this->session->set_flashdata('success', 'Booth request Rejected. ');
            redirect('common/get_approvebooth', 'refresh');
        }else{
            $this->session->set_flashdata('error', 'Exception Occured.');
            redirect('common/get_approvebooth', 'refresh');
        }
    }

    /**
     * @
     * date:15/10/2016
     * Parameter:none
     * Return type:none
     * Description:function to load manager list
     */
    public function listmanager()
    {
        $data['gender'] = $this->Common_model->getGender();
        $data['records'] = $this->Common_model->getManagers();
        $this->load->view('admin/list_manager',$data);
        $this->load->view('template/footer'); 
    }    
    /**
     * @
     * date:02/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to add new manager
     */
    public function add_manager()
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
            $data = array('user_name' =>$this->input->post("strusernameA"),'password' =>"ZGVtbw==",'name' =>$this->input->post("strnameA"),'gender' => $this->input->post("strgenderA"),'age' =>$this->input->post("strageA"),'housename' =>$this->input->post("strhnameA"),'streetname' => $this->input->post("strsnameA"),'city' =>$this->input->post("strcityA"),'state' =>$this->input->post("strstateA"),'pincode' => $this->input->post("strpincA"),'email' =>$this->input->post("stremailA"),'mobile' =>$this->input->post("strmobileA"),'type' =>2,'parent_id' =>1,'status' =>1);
            $result = $this->Common_model->add_manager($data);
            if($result==true){
                $this->session->set_flashdata('success', 'Manager '. $this->input->post("strnameA") . ' successfully added ');
                redirect('common/listmanager', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Manager not added.');
                redirect('common/listmanager', 'refresh');
            }
        }
    }
    /**
     * @
     * date:02/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to update manager
     */
    public function update_manager(){
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
            $result = $this->Common_model->update_manager($id,$data);
            if($result==true){
                $this->session->set_flashdata('success', 'Manager '. $this->input->post("strnameA") . ' successfully updated ');
                redirect('common/listmanager', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Manager Details not updated.');
                redirect('common/listmanager', 'refresh');
            }
        }        
    }    
    /**
     * @
     * date:02/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to delete manager
     */
    public function delete_manager(){
        $id= $this->input->post('id');
        $result=$this->Common_model->delete_manager($id);
        if($this->Common_model->count_manager_id($id)==0){
            $this->session->set_flashdata('success','Manager details successfully deleted ');
        }else{
            $this->session->set_flashdata('error', 'Manager deletion failed.');
        }
    }
    /**
     * @
     * date:04/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to add new sponsor
     */
    public function add_sponsor()
    {
        $this->form_validation->set_rules('strnameA', 'Name', 'trim|required');
        $this->form_validation->set_rules('strageA', 'Age', 'trim|required|numeric');
        $this->form_validation->set_rules('strhnameA', 'House Name', 'trim|required');
        $this->form_validation->set_rules('strsnameA', 'Street Name', 'trim|required');
        $this->form_validation->set_rules('strcityA', 'City', 'trim|required');
        $this->form_validation->set_rules('strstateA', 'State', 'trim|required');
        $this->form_validation->set_rules('strpincA', 'Pincode', 'trim|required|numeric');
        $this->form_validation->set_rules('stremailA', 'Email', 'trim|required');
        $this->form_validation->set_rules('strmobileA', 'Mobile', 'trim|required|numeric');
        if ($this->form_validation->run() == TRUE) {            
            $data = array('sp_name' =>$this->input->post("strnameA"),'sp_age' =>$this->input->post("strageA"),'sp_email' =>$this->input->post("stremailA"),'sp_phone' =>$this->input->post("strmobileA"),'sp_hname' =>$this->input->post("strhnameA"),'sp_street' => $this->input->post("strsnameA"),'sp_city' =>$this->input->post("strcityA"),'sp_state' =>$this->input->post("strstateA"),'sp_pin' => $this->input->post("strpincA"),'sp_status' =>1);
            $result = $this->Common_model->add_sponsor($data);
            if($result==true){
                $this->session->set_flashdata('success', 'Sponsor '. $this->input->post("strnameA") . ' successfully added ');
                redirect('common/list_sponsor', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Sponsor not added.');
                redirect('common/list_sponsor', 'refresh');
            }
        }
    }

    /**
     * @
     * date:04/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to update sponsor
     */
    public function update_sponsor()
    {
        $this->form_validation->set_rules('strname', 'Name', 'trim|required');
        $this->form_validation->set_rules('strage', 'Age', 'trim|required|numeric');
        $this->form_validation->set_rules('strhname', 'House Name', 'trim|required');
        $this->form_validation->set_rules('strsname', 'Street Name', 'trim|required');
        $this->form_validation->set_rules('strcity', 'City', 'trim|required');
        $this->form_validation->set_rules('strstate', 'State', 'trim|required');
        $this->form_validation->set_rules('strpinc', 'Pincode', 'trim|required|numeric');
        $this->form_validation->set_rules('stremail', 'Email', 'trim|required');
        $this->form_validation->set_rules('strmobile', 'Mobile', 'trim|required|numeric');
        if ($this->form_validation->run() == TRUE) {
            $id= $this->input->post('spId');
            $data = array('sp_name' =>$this->input->post("strname"),'sp_age' =>$this->input->post("strage"),'sp_email' =>$this->input->post("stremail"),'sp_phone' =>$this->input->post("strmobile"),'sp_hname' =>$this->input->post("strhname"),'sp_street' => $this->input->post("strsname"),'sp_city' =>$this->input->post("strcity"),'sp_state' =>$this->input->post("strstate"),'sp_pin' => $this->input->post("strpinc"));
            $result = $this->Common_model->update_sponsor($id,$data);
            if($result==true){
                $this->session->set_flashdata('success', 'Sponsor '. $this->input->post("strname") . ' successfully updated ');
                redirect('common/list_sponsor', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Sponsor not updated.');
                redirect('common/list_sponsor', 'refresh');
            }
        }
    }
    /**
     * @
     * date:22/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to reject exhibitor
     */
    public function reject_exhi()
    {
        $id= $this->input->post('id');
        $result=$this->Common_model->reject_exhi($id);
        if($this->Common_model->count_exhi_id($id)==0){
            $this->session->set_flashdata('success','Exhibitor Rejected Successfully ');
        }else{
            $this->session->set_flashdata('error', 'Rejection failed.');
        }    }
    /**
     * @
     * date:22/04/2017
     * Parameter:none
     * Return type:none
     * Description:function to approve exhibitor
     */  
    public function approve_exhi()
    {
        $aid= $this->input->post('id');
        $result=$this->Common_model->approve_exhi($aid);
        if($result == true){
            // implement the email module here
            $this->session->set_flashdata('success','Exhibitor Approved Successfully ');
        }else{
            $this->session->set_flashdata('error', 'Approval failed.');
        }       
    }           
}
