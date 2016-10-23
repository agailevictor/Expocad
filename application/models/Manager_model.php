<?php (defined('BASEPATH')) OR exit('aNo direct script access allowed');

class Manager_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    /**
     * @
     * date: 15/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get manager list
     */
    public function getStaffs()
    {
        $query = "SELECT a.user_id user_id,a.name name,a.user_name user_name,b.type gender,a.age age,a.housename housename,a.streetname streetname,a.city city,a.state state,a.pincode pincode, a.email email, a.mobile mobile FROM tbl_users a join tbl_gender b on a.gender = b.gender_id where a.type = 3 and a.status = 1";
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
}