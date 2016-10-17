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
        $query = "SELECT a.m_id,a.u_type,b.s_menu,b.url,b.sub_id FROM tbl_menu a join tbl_submenu b on a.m_id = b.pid where a.u_type=". $id." ORDER BY a.sequence";
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
        $where ='type = 2';
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
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
     * date: 16/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to populate highcharts
     */
    public function highchart()
    {   
        $query = "select bname,count(mid) as kount from tbl_booth group by bname";
        return $this->db->query($query)->result();
    }                
}