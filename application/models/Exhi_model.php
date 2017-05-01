<?php (defined('BASEPATH')) OR exit('aNo direct script access allowed');

class Exhi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }
    public function ListBooth($id)
    {
        $query = "SELECT * FROM tbl_booth where is_all ='Y' and status = 0 and staffid = (select parent_id from tbl_users where user_id =" .$id .")";
        return $this->db->query($query)->result();
    }
    public function req_booth($id,$user_id)
    {
        $this->db->where('bid',$id);
        $this->db->set('exid',$user_id);         
        $this->db->set('status',3);                       
        $this->db->update('tbl_booth');
        return true;       
    }
    public function ListProducts($id)
    {
         $query = "SELECT * FROM tbl_products where exid =" .$id;
        return $this->db->query($query)->result();       
    }     
}