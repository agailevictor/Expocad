<?php (defined('BASEPATH')) OR exit('aNo direct script access allowed');

class Exhi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }
}