<?php (defined('BASEPATH')) OR exit('aNo direct script access allowed');

class Common_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    /**
     * @
     * date:15/10/2016
     * Parameter:username,password
     * Return type:boolean
     * Description:function to validate user
     */
    public function validate_login($username, $password)
    {
        $this->db->where('status', 1);
        $this->db->where('user_name', $username);
        $this->db->where('PASSWORD', base64_encode($password));	
        $query = $this->db->get('tbl_users');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('user_type', $row->type);
            $this->session->set_userdata('user_id', $row->user_id);
            $this->session->set_userdata('user_name', $row->user_name);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('logged_in', '1');

            return TRUE;
        } else {

            return FALSE;
        }
    }

    /**
     * @
     * date: 15/10/2016
     * Parameter:user type id
     * Return type:array
     * Description:function to get menu list
     */

    public function get_menu($id)
    {
        $query = "SELECT * from tbl_menu  where u_type=" . $id . " ORDER BY sequence";
        return $this->db->query($query)->result();
    } 

    /**
     * @
     * date: 15/10/2016
     * Parameter:user type id
     * Return type:array
     * Description:function to get sub menu list
     */

    public function get_sub($id)
    {
        $query = "SELECT a.m_id,a.u_type,b.s_menu,b.url,b.sub_id FROM tbl_menu a join tbl_submenu b on a.m_id = b.pid where a.u_type=". $id." ORDER BY a.sequence, b.s_menu";
        return $this->db->query($query)->result();
    } 

    /**
     * @
     * date: 16/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get gender
     */
    public function getGender()
    {
        $query = "SELECT * FROM tbl_gender order by type";
        return $this->db->query($query)->result();
    }

    /**
     * @
     * date: 15/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get manager list
     */
    public function getManagers()
    {
        $query = "SELECT a.user_id user_id,a.name name,a.user_name user_name,b.type gender,a.age age,a.housename housename,a.streetname streetname,a.city city,a.state state,a.pincode pincode, a.email email, a.mobile mobile FROM tbl_users a join tbl_gender b on a.gender = b.gender_id where a.type = 2 and a.status = 1";
        return $this->db->query($query)->result();
    }   

    /**
     * @
     * date: 16/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get booth list
     */
    public function getbooths()
    {
        $query = "SELECT * FROM tbl_booth ";
        return $this->db->query($query)->result();
    }

    /**
     * @
     * date: 16/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get booth list not allocated
     */
    public function allbooth()
    {   
        $query = "SELECT * FROM tbl_booth where is_all = 'N'";
        return $this->db->query($query)->result();
    }

    /**
     * @
     * date: 16/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get Manager list not assigned
     */
    public function getM_notassigned()
    {   
        $query = "SELECT * FROM tbl_users where type = 2 and user_id not in ( select mid from tbl_booth where is_all = 'y')";
        return $this->db->query($query)->result();
    } 

    /**
     * @
     * date: 22/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get exhibitor list
     */
    public function getExhi()
    {
        $query = "SELECT a.user_id user_id,a.name name,a.user_name user_name,b.type gender,a.age age,a.housename housename,a.streetname streetname,a.city city,a.state state,a.pincode pincode, a.email email, a.mobile mobile FROM tbl_users a join tbl_gender b on a.gender = b.gender_id where a.type = 5 and a.status = 2";
        return $this->db->query($query)->result();
    }

    /**
     * @
     * date: 22/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get sponsor list
     */
    public function getspo()
    {
        $query = "SELECT * from tbl_sponsor where sp_status = 1";
        return $this->db->query($query)->result();
    } 

    /**
     * @
     * date: 22/10/2016
     * Parameter:none
     * Return type:boolean
     * Description:function to add new booth
     */
    public function add_booth($data)
    {
        $this->db->insert('tbl_booth', $data);
        return true;
    } 

    /**
     * @
     * date: 23/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get approve list
     */
    public function get_approvebooth()
    {   
        $query = "SELECT a.bid bid,a.bname bname,a.space space,a.amount amount, b.name name FROM tbl_booth a join tbl_users b on a.exid = b.user_id where a.status = 2";
        return $this->db->query($query)->result();
    }
    /**
     * @
     * date: 02/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to add new manager
     */
    public function add_manager($data)
    {
        $this->db->insert('tbl_users', $data);
        return true;
    }
    /**
     * @
     * date: 03/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to update manager
     */
    public function update_manager($id,$data)
    {
        $this->db->where('user_id',$id);
        $this->db->set('user_name',$data['user_name']);
        $this->db->set('name',$data['name']);
        $this->db->set('gender',$data['gender']);
        $this->db->set('age',$data['age']);
        $this->db->set('housename',$data['housename']);
        $this->db->set('streetname',$data['streetname']);
        $this->db->set('city',$data['city']);
        $this->db->set('state',$data['state']);
        $this->db->set('pincode',$data['pincode']);
        $this->db->set('email',$data['email']);
        $this->db->set('mobile',$data['mobile']);                
        $this->db->update('tbl_users');
        return true;
    }
    /**
     * @
     * date: 02/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to delete manager
     */
    public function delete_manager($id)      
    {
     $this->db->where('user_id', $id);
     $this->db->delete('tbl_users');       
 }
    /**
     * @
     * date: 02/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to check the manager deletion success or not
     */
    public function count_manager_id($id){
        $this->db->from('tbl_users');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;        
    }
    /**
     * @
     * date: 02/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to delete booth
     */
    public function delete_booth($id)      
    {
     $this->db->where('bid', $id);
     $this->db->delete('tbl_booth');       
    }
    /**
     * @
     * date: 02/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to check the booth deletion success or not
     */
    public function count_booth_id($id){
        $this->db->from('tbl_booth');
        $this->db->where('bid', $id);
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;        
    }
    /**
     * @
     * date: 04/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to update booth
     */
    public function update_booth($id,$data)
    {
        $this->db->where('bid',$id);
        $this->db->set('bname',$data['bname']);
        $this->db->set('space',$data['space']);
        $this->db->set('amount',$data['amount']);               
        $this->db->update('tbl_booth');
        return true;
    } 
    /**
     * @
     * date: 04/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to add new sponsor
     */
    public function add_sponsor($data)
    {
        $this->db->insert('tbl_sponsor', $data);
        return true;
    }
    /**
     * @
     * date: 04/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to update sponsor
     */
    public function update_sponsor($id,$data)
    {
        $this->db->where('sp_id',$id);
        $this->db->set('sp_name',$data['sp_name']);
        $this->db->set('sp_age',$data['sp_age']);
        $this->db->set('sp_email',$data['sp_email']);
        $this->db->set('sp_phone',$data['sp_phone']);
        $this->db->set('sp_hname',$data['sp_hname']);
        $this->db->set('sp_street',$data['sp_street']);
        $this->db->set('sp_city',$data['sp_city']);
        $this->db->set('sp_state',$data['sp_state']);
        $this->db->set('sp_pin',$data['sp_pin']);               
        $this->db->update('tbl_sponsor');
        return true;
    } 
    /**
     * @
     * date: 20/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to allocate booth
     */
    public function allocate_booths($id,$manager)
    {
        $this->db->where('bid',$id);
        $this->db->set('mid',$manager);
        $this->db->set('is_all','Y');                        
        $this->db->update('tbl_booth');
        return true;
    }

    /**
     * @
     * date: 20/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to approve booth
     */
    public function approvebooth($id)
    {
        $this->db->where('bid',$id);
        $this->db->set('status',1);                        
        $this->db->update('tbl_booth');
        return true;
    } 

    /**
     * @
     * date: 20/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to reject booth
     */
    public function rejectbooth($id)
    {
        $this->db->where('bid',$id);
        $this->db->set('exid',null);          
        $this->db->set('status',0);                        
        $this->db->update('tbl_booth');
        return true;
    }
    /**
     * @
     * date: 24/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to approve exhibitor
     */
    public function approve_exhi($id)
    {
        $this->db->where('user_id',$id);         
        $this->db->set('status',1);                        
        $this->db->update('tbl_users');
        return true;
    }

    /**
     * @
     * date: 24/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to reject exhibitor
     */
    public function reject_exhi($id)
    {
     $this->db->where('user_id', $id);
     $this->db->delete('tbl_users'); 
    }
    /**
     * @
     * date: 24/04/2017
     * Parameter:none
     * Return type:boolean
     * Description:function to check reject success or fail
     */
    public function count_exhi_id($id)
    {
        $this->db->from('tbl_users');
     $this->db->where('user_id', $id);
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;        
    }                                               
}