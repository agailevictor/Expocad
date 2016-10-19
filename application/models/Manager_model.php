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
        $where ='type = 2';
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}