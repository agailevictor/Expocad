<?php (defined('BASEPATH')) OR exit('aNo direct script access allowed');

class Staff_model extends CI_Model
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
     * Description:function to get the exhibitors
     */
    public function list_exhi($id)
    {
        $query = "SELECT a.user_id user_id,a.name name,a.user_name user_name,b.type gender,a.age age,a.housename housename,a.streetname streetname,a.city city,a.state state,a.pincode pincode, a.email email, a.mobile mobile FROM tbl_users a join tbl_gender b on a.gender = b.gender_id where a.type = 5 and a.parent_id=".$id;
        return $this->db->query($query)->result();
    }
    /**
     * @
     * date: 22/04/2016
     * Parameter:none
     * Return type:array
     * Description:function to add exhibitor
     */
    public function add_exhibitor($data)
    {
        return $this->db->insert('tbl_users', $data);
    }
    /**
     * @
     * date: 22/04/2016
     * Parameter:none
     * Return type:array
     * Description:function to update exhibitor
     */
    public function update_exhibitor($id,$data)
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
    /**
     * @
     * date: 22/04/2016
     * Parameter:none
     * Return type:array
     * Description:function to delete exhibitor
     */
    public function delete_exhibitor($id)
    {
     $this->db->where('user_id', $id);
     $this->db->delete('tbl_users');        
    } 
    /**
     * @
     * date: 22/04/2016
     * Parameter:none
     * Return type:array
     * Description:function to check delete success or fail
     */  
    public function count_exhibitor_id($id){
        $this->db->from('tbl_users');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;        
    } 
    /**
     * @
     * date: 22/04/2016
     * Parameter:none
     * Return type:array
     * Description:function to list staff booth
     */  
    public function ListStaffBooth($id)
    {
        $query = "SELECT * FROM tbl_booth where is_all ='Y' and staffid =" .$id;
        return $this->db->query($query)->result();
    }                 
}