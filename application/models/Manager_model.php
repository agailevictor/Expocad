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
    public function getStaffs($id)
    {
        $query = "SELECT a.user_id user_id,a.name name,a.user_name user_name,b.type gender,a.age age,a.housename housename,a.streetname streetname,a.city city,a.state state,a.pincode pincode, a.email email, a.mobile mobile FROM tbl_users a join tbl_gender b on a.gender = b.gender_id where a.type = 3 and a.status = 1 and a.parent_id=".$id;
        return $this->db->query($query)->result();
    }

    /**
     * @
     * date: 16/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get booth list
     */
    public function getbooths_under($id)
    {
        $query = "SELECT * FROM tbl_booth where  staffid = 0 and is_all ='Y' and mid =" .$id;
        return $this->db->query($query)->result();
    }

    /**
     * @
     * date: 16/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get booth list
     */
    public function getstaffs_under($id)
    {
        $query = "SELECT * FROM tbl_users where status = 1 and type = 3 and user_id not in (select staffid from tbl_booth where is_all = 'y' and mid= $id) and parent_id =" .$id;
        return $this->db->query($query)->result();
    }

    /**
     * @
     * date: 23/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get approve list
     */
    public function get_approvebooth($id)
    {   
        $query = "SELECT a.bid bid,a.bname bname,a.space space,a.amount amount, b.name name FROM tbl_booth a join tbl_users b on a.exid = b.user_id where a.status = 3 and a.mid =" .$id;
        return $this->db->query($query)->result();
    }

    /**
     * @
     * date: 23/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get approve list
     */
    public function add_staff($data)
    {
        return $this->db->insert('tbl_users', $data);
    }

    /**
     * @
     * date: 23/10/2016
     * Parameter:none
     * Return type:array
     * Description:function to get approve list
     */
    public function update_staff($id,$data)
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
        return $this->db->update('tbl_users');
    }
}