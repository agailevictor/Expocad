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
        $query = "SELECT a.user_id user_id,a.name name,a.user_name user_name,b.type gender,a.age age,a.housename housename,a.streetname streetname,a.city city,a.state state,a.pincode pincode, a.email email, a.mobile mobile FROM tbl_users a join tbl_gender b on a.gender = b.gender_id where a.type = 2";
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
        $query = "SELECT * FROM tbl_booth where is_all = 'N'";
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
        $query = "SELECT a.user_id user_id,a.name name,a.user_name user_name,b.type gender,a.age age,a.housename housename,a.streetname streetname,a.city city,a.state state,a.pincode pincode, a.email email, a.mobile mobile FROM tbl_users a join tbl_gender b on a.gender = b.gender_id where a.type = 5";
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
}