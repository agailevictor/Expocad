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
            $data = array('bname' =>$this->input->post("strbnameA"),'space' =>$this->input->post("strspaceA"),'amount' => $this->input->post("stramountA"),'is_all' => 'N');
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
}
